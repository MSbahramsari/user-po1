<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Document</title>
</head>
<body>
<form action="delet.php">
    <div class="mb-3 mt-3">
        <label for="text" class="form-label">name</label>
        <input type="input" class="form-control" name="firstname">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>
<?php
try {
    $servername = "localhost";
    $username = "root";
    $dbname = "mekeen";
    $password = "" ;
    $name = $_REQUEST["firstname"];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare($sql =    "DELETE 
                                    FROM users 
                                    WHERE firstname=?");

    $sql->bindParam(1, $name);
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