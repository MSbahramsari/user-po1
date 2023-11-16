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
        <label for="number" class="form-label">id</label>
        <input type="number" class="form-control" name="id">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

</body>
</html>
<?php
$data = json_decode(file_get_contents('task.txt'),true);
$id = $_REQUEST["id"];
$data = array_filter($data, function ($user) use ($id) {
    if ($user["id"] != $id){
    return $user["id"] ;
    }
});
file_put_contents("task.txt", json_encode($data));

?>