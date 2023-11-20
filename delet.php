<?php
session_start();
try {
    $servername = "localhost";
    $username = "root";
    $dbname = "mekeen";
    $password = "" ;
    $id = $_SESSION['userid'];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare($sql =    "DELETE 
                                    FROM users 
                                    WHERE id=?");

    $sql->bindParam(1, $id);
    $sql->execute();
    echo "user deleted";
} catch(PDOException $e) {
    echo " user not deleted " . "<br>" . $e->getMessage();
}






//$data = json_decode(file_get_contents('task.txt'),true);
//$name = $_REQUEST["firstname"];
//$data = array_filter($data, function ($user) use ($id) {
//    if ($user["id"] != $id){
//    return $user["id"] ;
//    }
//});
//file_put_contents("task.txt", json_encode($data));

?>