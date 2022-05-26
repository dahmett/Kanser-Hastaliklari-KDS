
<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet"  href="index.css">

    
</head>
<body  >
 
<form class="box" action="login.php" method="post">
     <h1>Giris </h1>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <input type="text" name="uname" placeholder="Kullanici Adi">
        <input type="password" name="password" placeholder="Sifre">
        <input type="submit" name="" placeholder="Giris">
     </form>
     
</body>
</html>