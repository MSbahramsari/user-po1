<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $my_input = $_POST["my_input"];
    echo $my_input;
}
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="post" action="test.php">
    <input type="text" name="my_input" value="<?php echo $my_input?>">
    <input type="submit" value="Submit">
</form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $my_input = $_POST["my_input"];
    echo $my_input;
}
?>