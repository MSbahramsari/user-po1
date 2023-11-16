<html>
<body>
<form action="update.php" method="POST">
    <p>id : <input type="number" name="id" required></p>
    <p>firstname : <input type="text" name="firstname" required></p>
    <p>lastname : <input type="text" name="lastname" required></p>
    <p>phone_number : <input type="number" name="number" required></p>
    <p>age : <input type="number" name="age" required></p>
    <p>gender : male<input type="radio" name="gender" value="male" required> female <input type="radio" name="gender" value="female" required></p>    <p>password : <input type="password" name="password" required></p>
    <p>submit : <input type="submit"></p>
</form>
</body>
</html>

<?php
$servername = "localhost";
$username = "username";
$password = "";
$dbname = "myDB";

$conn = new mysqli($servername,$username,$password,$dbname);

if ($conn->connect_error) {
    die('Connection failed:' . $conn->connect_error);
}

$id = $_POST["id"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$number = $_POST["number"];
$age = $_POST["age"];
$gender = $_POST["gender"];
$password = $_POST["password"];

if (is_numeric($id)) {
    echo '<br>';
    echo 'id = ' . $id;
} else {
    echo 'invalid' . '<br>';
}

if (filter_var($number, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 99999999999)))) {
    echo '<br>';
    echo $number;
} else {
    echo 'invalid number';
}

if (strlen($firstname) <= 40) {
    echo '<br>';
    echo $firstname;
} else {
    echo 'higher firstname';
}

$password = password_hash($password, PASSWORD_DEFAULT);

echo '<br>';
if ($gender == "male") {
    echo "male";
} elseif ($gender == "female") {
    echo "female";
} else {
    echo "unknown";
}
$conn->close();

$data = fopen("text.txt", "r+");
$content = fread($data, filesize("text.txt"));

echo "information was updated";
echo nl2br($content);

$new_data =$_POST["new_data"];

$content = str_replace($content, $new_data, $content);

ftruncate($data,0);

fwrite($data,$content);

echo nl2br($content);
fclose($data);