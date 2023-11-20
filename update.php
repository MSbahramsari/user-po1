<?php
try {
    $servername = "localhost";
    $username = "root";
    $dbname = "mekeen";
    $password = "" ;
    $firstnamev = $_REQUEST["firstnamev"];
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,$password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare($sql = "SELECT id , firstname, lastname, age , phone_number , password , gender FROM users  WHERE firstname=?");

    $stmt->bindParam(1, $firstnamev);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $user = $result[0];
    $id = $user['id'];
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
<div class="container">
        <div class="container">
            <form action="update.php" method="post">
                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">firs name</label>
                    <input type="text" class="form-control" name="firstnamev">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <form action="updateserver.php" method="post">
                <div class="mb-3 mt-3">
                    <input type="hidden" class="form-control" name="id" value="<?php echo $id?>">
                </div>
                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">firstname</label>
                    <input type="text" class="form-control"  name="firstname" placeholder="<?php echo $firstname?>" >
                </div>
                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">last name</label>
                    <input type="text" class="form-control"  name="lastname" placeholder="<?php echo $lastname?>" >
                </div>
                <div class="mb-3 mt-3">
                    <label for="text" class="form-label">phone number</label>
                    <input type="number" class="form-control" name="phone" placeholder="<?php echo $phone_number?>" >
                </div>
                <div class="mb-3 mt-3">
                    <label for="number" class="form-label">age</label>
                    <input type="number" class="form-control" name="age" placeholder="<?php echo $age?>" >
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" name="pwd" placeholder="<?php echo $password?>" >
                </div>
                <div><select class="form-select form-select" name="gender">
                        <option><?php echo $gender?></option>
                        <option>male</option>
                        <option>female</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">update</button>
                <br>
            </form>

</div>


</body>
</html>




//update user




