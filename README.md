# Peacock
Peacock is a general purpose code syntax highlighter written in PHP. It includes rules for highlighting source code written in PHP and SQL, but can be easily extended to work with other programming languages.

## Why?
#### Fast
Most syntax highlighters run client-side. Even the leanest require you to download a good chunk of JavaScript. Not so with Peacock. No annoying flash of un-styled code while you wait for client-side scripts to execute. Just pre-styled goodness delivered straight to your browser.

#### Robust
Are your site visitors stuck using a corporate browser with active scripting disabled? Are they using a tool like NoScript to keep them safe? Not a problem for Peacock. What about responsive or liquid layouts? You'll be excited to learn that Peacock will automatically soft-wrap line-numbered code. Heck, it even works a treat in IE6.

#### Simple
Peacock is *way* small. Less than 60 lines of code. The default style sheet is tiny. Easy to understand. Easy to use. Written with a minimalist mindset, it does what's required and keeps out of you way.

#### Flexible
Syntax rules are defined entirely with standard regular expressions. No intermediate layers of abstraction get in your way. You want nested highlighting? Line tagging? Peacock makes it possible.

#### Compliant
No nasty tables. No CSS hacks. Peacock generates valid and semantic markup.

#### Free
Peacock is released under The Do What The Fuck You Want To Public License (WTFPL). Copy it. Hack it. Do whatever you want with it.    

## Usage
To see Peacock in action, and learn how it can be used, take a look at the code in the 'example' folder. However, for a more detailed explanation, keep reading.

#### Styles
The layout and colours applied to your highlighted code (the theme) are defined in the stylesheet named 'peacock.css'. You must reference this file within your HTML markup. Like this:

    <link rel="stylesheet" href="peacock.css">

Experiment with different fonts, colours, etc, by changing the code in this stylesheet.

#### Markup
Peacock will take a block of un-styled source code, wrap each line within pre tags, then within list item tags, and then wrap the entire block within an ordered list. Then, using the configured ruleset, Peacock will nestle matched sections of code between span tags, each of which is assigned the class name of the matched rule. For example, the following PHP code:

    $foo = 'bar';
    echo $foo;

Will be rendered:

    <ol class="php">
    <li><pre><span class="variable">$foo</span> = <span class="squote">'bar'</span>;</pre></li>
    <li><pre><span class="keyword">echo</span> <span class="variable">$foo</span>;</pre></li>
    </ol>

Also, notice that the ordered list is assigned a class equal to the name of the ruleset that was used to process the code (in this case, the PHP ruleset).

#### Rule Definitions
The syntax highlighting rules for a programming language are defined using an array of key-value pairs. The array keys are pluralized descriptors of the code elements to be styled, and the values are regular expressions that will match the associated code elements.

For example, the following rule will highlight code comments that begin with a double forward slash:

    $rule = [
      'comments' =>   '/\/\/[^\n]*$
    ];

Using this rule, if Peacock detects a comment like this:

    // this is a comment

It will render it like this:

    <span class="comment">// this is a comment</span>

Notice how the class name is the non-pluralized form of the matched key from the ruleset. The comment will be displayed using the colour associated with this class in 'peacock.css'.

Peacock comes with two predefined sets of rules - one for PHP, and another for SQL. Take a look at these rulesets to get a feel for how you can create your own for other programming languages.

#### Rule Processing Order
When Peacock applies a style to a section of code, it prevents further pattern matching within that section. For this reason, the order in which rules are defined is critical. For example, if you were styling PHP code, and you defined a rule for matching single line comments, and then you defined a rule for matching double quotes, you may be surprised by the results. This code:

    $url = "http://google.com/";

Would get marked up like this:

    <span class="variable">$url</span> = <span class="dquote">"http:<span class="comment">//google.com/";</span></span>

Uggh. But if you were to switch the order, and define the 'double quotes' rule before the 'comment' rule, you'd get just what you wanted:

    <span class="variable">$url</span> = <span class="dquote">"http://google.com/"</span>;

But what if you had a comment that included text in double quotes? Something like this:

    // this is a "cool" comment.

This will be marked up as:

    <span class="comment">// this is a <span class="dquote">"cool"</span> comment.</span>

Now, even though this markup is semantically correct, you probably don't want the double quoted term to be styled separately from the rest of the comment. Fortunately, this can be easily addressed by including style overrides in 'peacock.css' that set the colour of a double quoted term within a comment to be the same colour as the rest of the comment:

    .peacock .comment {
      color:#969896;
    }
    .peacock .comment .dquote {
	  color:#969896; 
    }

This approach, which at first glance may seem somewhat odd, is actually quite powerful, as it opens up opportunities like being able to selectively style interpreted variables within a double quoted string (a frequent occurrence in PHP). For example:

    $greeting = "Hello, $name.";

Is marked up as:

    <span class="variable">$greeting</span> = <span class="dquote">"Hello, <span class="variable">$name</span>."</span>;

Perfect.

#### Invoking Peacock
So how do you actually invoke Peacock? Well, firstly you must include 'peacock.php' within your source code, and create an instance of the Peacock class:

    include 'peacock.php';
    $peacock = new Peacock();

The next step is to import the required rulesets. This is achieved using the `with` method; the first parameter is a label for the language, and the second is an array of rules. For example, assuming 'sql.php' returns an array containing the syntax highlighting rules for the SQL programming language, we'd call the `with` method like this:

    $peacock->with('sql', include 'sql.php');

Finally, we use the `highlight` method to generate the highlighted code block. The first parameter names the ruleset that should be used to process the code (i.e. corresponds to the label used when importing rules using the `with` method), and the second parameter is the code to be processed. For example, if the SQL source code is stored in a file named 'sql.txt', and the highlighted code is to be stored in a variable named $code, we would invoke Peacock like this:

    $code = $peacock->highlight('sql', include 'sql.txt');

Finally, you need to output the styled code within the HTML page that references 'peacock.css'. You might do something like this:

    <?php echo $code; ?>

That's it.

#### Multiple Rulesets
There are two options for loading multiple rulesets. The first is to call the `with` method for each ruleset:

    $peacock->with('php', include 'php.php');
    $peacock->with('sql', include 'sql.php');

The second is to instantiate Peacock with a two-dimensional array of language identifiers and associated rulesets. Something like this:

    $rulesets = [
      'php' => ['variables' => '..', 'keywords' => '..'], 
      'sql' => ['variables' => '..', 'keywords' => '..']
    ];

    $peacock = new Peacock($rulesets);

## Requirements
Peacock requires PHP 5.4 or later.