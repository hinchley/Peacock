<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Peacock: A Syntax Highlighter</title>
  <link rel="stylesheet" href="../peacock.css">
</head>
<body>
<div id="container">
<?php
// include the peacock source file
require '../peacock.php';

// create an instance of peacock
$peacock = new Peacock();

// load the syntax highlighting rules
$peacock->with('php', require '../rules/php.php');
$peacock->with('sql', require '../rules/sql.php');

// get the sample code to be highlighted
$php = file_get_contents('php.txt');
$sql = file_get_contents('sql.txt');

// highlight the sample code
echo "<h3>PHP Example</h3>\n";
echo $peacock->highlight('php', $php);

echo "<h3>SQL Example</h3>\n";
echo $peacock->highlight('sql', $sql);
?>
</div>
</body>
</html>