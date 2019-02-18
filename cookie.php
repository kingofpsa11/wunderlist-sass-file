<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <input type="text" name="username">
        <input type="text" name='password'>
        <input type="submit" value="Submit" name="submit">
    </form>
    <?php    
    if (isset($_POST['submit'])) {        
        setcookie('username', $_POST['username'], time() + 3600);
        var_dump(isset($_COOKIE['username']));
        
        // setcookie('username','',time()-3600);
    }
    
    ?>
    <script>
        console.log(document.cookie)
    </script>
</body>
</html>