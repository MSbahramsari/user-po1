<?php
extract($_REQUEST , EXTR_PREFIX_SAME , "dup");
//id
if (intval($id)) {
        echo $id;
}
else {
        echo 'invalid id';
}
echo '<br>';
//age
if ($age >= 18) {
        echo $age ;
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
    echo $firstname;
}
else {
    echo 'invalid';
}
echo '<br>';
//last name
if (strlen($lastname) <= 40) {
    echo $lastname;
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
var_dump($gender);
$servername = "localhost";
$username = "bahram";
$password = "123";
$dbname = "mekeen";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO users (firstname, lastname, age , phone_number , password , gender)
  VALUES ('$firstname', '$lastname', '$age' ,'$phone' , '$password' , '$gender')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

//put in database
$user = array('gender' => $gender,'password' => $password,'age' => $age,'phone' => $phone,'firstname' => $firstname,'id' => $id,'lastname' =>$lastname) ;

$data = json_decode(file_get_contents('task.txt'),true);
$data []= $user;
file_put_contents('task.txt',json_encode($data)) ;