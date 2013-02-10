<?php
class Peacock {
  protected $rules;

  public function __construct($config = []) {
    foreach ($config as $language => $rules) {
      $this->with($language, $rules);
    }
  }

  public function with($language, $rules) {
    foreach ($rules as $key => $regexp) {
      $this->rules[$language][$regexp] =
        str_replace(
          '$class',
          rtrim($key, 's'),
          '<span class="$class">$1</span>'
        );
    }
  }

  public function highlight($lang, $code) {
    $tokens = array();

    foreach ($this->rules[$lang] as $regexp => $markup) {
      $code = preg_replace_callback(
        $regexp,
        function($matches) use (&$tokens, $markup) {
          // prefix with middle dot
          $id = uniqid(chr(183));

          // replace nested tokens
          $match = str_replace(
            array_keys($tokens),
            array_values($tokens),
            $matches[0]
          );

          $tokens[$id] = str_replace('$1', $match, $markup);
          return $id;
        },
        $code
      );
    }

    // close tags of multi-line tokens
    $tokens = preg_replace(
      '/(^<span class=".*?">)(.*)\n/',
      "$1$2</span>\n$1",
      $tokens
    );

    // replace all tokens
    $code = str_replace(
      array_keys($tokens),
      array_values($tokens),
      $code
    );

    // wrap the code into an ordered list
    return $this->wrap($code);
  }

  protected function wrap($code) {
    $code = explode("\n", $code);

    foreach($code as &$line) {
      $line = "<li><pre>$line</pre></li>\n";
    }

    return "<ol class=\"peacock\">\n".implode($code)."</ol>\n";
  }
}