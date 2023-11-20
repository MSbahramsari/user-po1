<?php
session_start();

try {
    $servername = "localhost";
    $username = "root";
    $dbname = "mekeen";
    $password = "" ;
    $id = $_REQUEST["id"];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql = "SELECT id , firstname, lastname, age , phone_number , password , gender FROM users  WHERE id=?");

    $stmt->bindParam(1, $id);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $user = $result[0];
    $userid = $user['id'];
    $firstname = $user['firstname'];
    $lastname = $user['lastname'];
    $age = $user['age'];
    $phone_number = $user['phone_number'];
    $password = $user['password'];
    $gender = $user['gender'];
    $_SESSION['userid'] = $id;
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
        <div class="container mt-3">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>age</th>
                    <th>phone number</th>
                    <th>password</th>
                    <th>gender</th>
                    <th>update</th>
                    <th>delete</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php echo $userid?></td>
                    <td><?php echo $firstname?></td>
                    <td><?php echo $lastname?></td>
                    <td><?php echo $age?></td>
                    <td><?php echo $phone_number?></td>
                    <td><?php echo $password?></td>
                    <td><?php echo $gender?></td>
                    <td><form action="update.php" method="post"><a href="update.php" class="btn btn-info" role="button">update</a></a></form></td>
                    <td><form action="delet.php" method="post"><button type="submit" class="btn btn-danger" name="delete">delete</button></form></td>
                </tr>

                </tbody>
            </table>
        </div>
</form>

</body>
</html>
