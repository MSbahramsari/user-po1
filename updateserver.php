<?php
extract($_REQUEST , EXTR_PREFIX_SAME , "dup");
echo '<br>';
//age
if ($age >= 18) {
    echo $age ;
    var_dump($age);
}
else {
    echo 'invalid age';

}
echo '<br>';
//phone number
if (strlen($phone) <= 11) {
    echo $phone;
}
else {
    echo 'invalid';
}
echo '<br>';
// first name
if (strlen($firstname) <= 40) {
    echo $firstname;}
else {
    echo 'invalid';
}
echo '<br>';
//last name
if (strlen($lastname) <= 40) {
    echo $lastname ;
}


else {
    echo 'invalid';
}
echo '<br>';
//password
$str = $pwd ;
$password = md5($str);
echo $password ;
echo '<br>';
try {
    $servername = "localhost";
    $username = "root";
    $dbname = "mekeen";
    $password = "" ;
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("UPDATE users 
    set firstname = ?,
        lastname = ?,
    age = ?,
    phone_number = ?,
    password = ?,
    gender = ?
    WHERE firstname = ? 
    ");

    $sql->bindParam(1, $firstname);
    $sql->bindParam(2, $lastname);
    $sql->bindParam(3, $age);
    $sql->bindParam(4, $phone);
    $sql->bindParam(5, $pwd);
    $sql->bindParam(6, $gender);
    $sql->bindParam(7, $firstnamev);
    $sql->execute();
    echo "New record created successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;








