<?php
try {
    $servername = "localhost";
    $username = "root";
    $dbname = "mekeen";
    $password = "" ;
    $id = $_REQUEST["id"];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare($sql =    "SELECT firstname, lastname, age , phone_number , password , gender FROM users  WHERE id=?");

    $sql->bindParam(1, $id);
    $sql->execute();
    echo "user showed";
} catch(PDOException $e) {
    echo " user not find " . "<br>" . $e->getMessage();
}
?>


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
<form action="showid.php">
    <div class="mb-3 mt-3">
        <label for="number" class="form-label">id</label>
        <input type="number" class="form-control" name="id">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <form action="server.php" method="post">
        <div class="mb-3 mt-3">
            <label for="text" class="form-label">first name</label>
            <input type="text" class="form-control" name="firstname">
        </div>
        <div class="mb-3 mt-3">
            <label for="text" class="form-label">last name</label>
            <input type="text" class="form-control"  name="lastname">
        </div>
        <div class="mb-3 mt-3">
            <label for="text" class="form-label">phone number</label>
            <input type="number" class="form-control" name="phone">
        </div>
        <div class="mb-3 mt-3">
            <label for="number" class="form-label">age</label>
            <input type="number" class="form-control" name="age">
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Password:</label>
            <input type="password" class="form-control" name="pwd">
        </div>
        <div class="mb-3 mt-3">
            <label for="text" class="form-label">gender</label>
            <input type="text" class="form-control"  name="gender">
        </div>
</form>

</body>
</html>
