<?php

if(isset($_POST['submit'])) {
    if (!empty($_POST['email'])) {
        if ($_POST['email'] == 'phammanhha305@gmail.com' && $_POST['password'] == 123456) {
            header("Location: ./index.php");
        } else {
            echo 'sai'.'<br>';
            echo $_POST['email'] . '<br>';
            echo $_POST['password'];
        }
    }
}
?>