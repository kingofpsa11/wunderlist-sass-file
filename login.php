<?php session_start();?>
<?php
setcookie("test_cookie", "test", time() + 3600, '/');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sign In: Wunderlist</title>
  <link rel="stylesheet" href="assets/css/login.css">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato" />
</head>
<body>
  <div class="container">
    <header>
      <div class="cookie">        
        This site uses cookies for analytics, personalized content and ads. By continuing to browse this site, you agree to this use. 
        <a href="#" target="" rel="noopener noreferrer">Learn more</a>        
      </div>
    </header>
    <main>
      <div class="logo"></div>
      <div>
        <form action="">
          <input type="text" name="email" id="email">
          <input type="password" name="password" id="password">
          <input type="submit" value="Sign In">
          <div>
            <a href="">Forgot your password?</a>
          </div>
        </form>
      </div>
      <a href=""><img src="" alt=""></a>
      <a href=""><img src="" alt=""></a>
      <a href=""><img src="" alt=""></a>
    </main>
    <?php
    
if(count($_COOKIE) > 0) {
    echo "Cookies are enabled.";
    echo '<pre>';
    var_dump($_COOKIE);
    // var_dump(isset($_COOKIE['test_cookie']));
} else {
    echo "Cookies are disabled.";
}
?>

  </div>
</body>
</html>