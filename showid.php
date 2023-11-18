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
    $stmt = $conn->prepare($sql = "SELECT firstname, lastname, age , phone_number , password , gender FROM users  WHERE id=?");

    $stmt->bindParam(1, $id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $user = $result[0];
    $firstname = $user['firstname'];
    $lastname = $user['lastname'];
    $age = $user['age'];
    $phone_number = $user['phone_number'];
    $password = $user['password'];
    $gender = $user['gender'];
} catch(PDOException $e) {
    echo "echo not find " . $e->getMessage();
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
            <label for="text" class="form-label">firstname</label>
            <input type="text" class="form-control"  name="firstname" value="<?php echo $firstname?>" readonly>
        </div>
        <div class="mb-3 mt-3">
            <label for="text" class="form-label">last name</label>
            <input type="text" class="form-control"  name="lastname" value="<?php echo $lastname?>" readonly>
        </div>
        <div class="mb-3 mt-3">
            <label for="text" class="form-label">phone number</label>
            <input type="number" class="form-control" name="phone" value="<?php echo $phone_number?>" readonly>
        </div>
        <div class="mb-3 mt-3">
            <label for="number" class="form-label">age</label>
            <input type="number" class="form-control" name="age" value="<?php echo $age?>" readonly>
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Password:</label>
            <input type="password" class="form-control" name="pwd" value="<?php echo $password?>" readonly>
        </div>
        <div class="mb-3 mt-3">
            <label for="text" class="form-label">gender</label>
            <input type="text" class="form-control"  name="gender" value="<?php echo $gender?>" readonly>
        </div>
</form>

</body>
</html>
