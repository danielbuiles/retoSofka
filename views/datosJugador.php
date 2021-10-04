<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styleIndex.css">
    <title>Document</title>
</head>
<body>
    <form action="../controllers/controller.php" method="POST">
        <h1>escriba un Nick</h1>
        <input type="text" name="nombre">
        <button name="btnJugar">jugar!</button>
    </form>
</body>
</html>

<style>
    form h1{
        font-size:3em;
    }
    form input{
        padding:6px;
    }
    form button{
        width:100px;
        padding:6px;
        color: blue;
        background: #99EBB3;
        cursor:pointer;
    }
</style>