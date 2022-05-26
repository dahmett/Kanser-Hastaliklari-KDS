
<?php 
session_start(); 
include "db_conn.php";
if (isset($_POST['uname']) && isset($_POST['password'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);
    if (empty($uname)) {
        header("Location: index.php?error=Kullanıcı Adı Gerekli");
        exit();
    }else if(empty($pass)){
        header("Location: index.php?error=Parola Gerekli");
        exit();
    }else{
        $sql = "SELECT * FROM yonetici WHERE ad='$uname' AND sifre='$pass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['ad'] === $uname && $row['sifre'] === $pass) {
                echo "Logged in!";
                $_SESSION['ad'] = $row['ad'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
                header("Location: home.php");
                exit();
            }else{
                header("Location: index.php?error=Kullanıcı Adı veya Şifre Hatalı");
                exit();
            }
        }else{
            header("Location: index.php?error=Kullanıcı Adı veya Şifre Hatalı");
            exit();
        }
    }
}else{
    header("Location: index.php");
    exit();
}
