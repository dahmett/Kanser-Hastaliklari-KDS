<?php
include("db_conn.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
$tedavi = $conn->query("SELECT * FROM tedavi");
$tedavi_turu = $conn->query("SELECT * FROM muayene");

?>
<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['ad'])) {
 ?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

body {
  font-family: "Lato", sans-serif;
  background-color: #CBB5E3;
  transition: background-color .5s;
  background-image: url('beyaz.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #5e42a6;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #EADEDC;
  display: block;
  transition: 0.3s;
}

.sidenav h1 {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #EADEDC;
  display: block;
  transition: 0.3s;
}

.sidenav h2 {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.redtext {
 color: black;
}

.whitetext {
 color: black;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">

  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <h1>Merhaba : <?php echo ucfirst($_SESSION['ad']) ?></h1>
  <a href="home.php">Ana Sayfa</a>
  <a href="kayit.php">Hasta</a>
  <a href="muayene.php">Muayene</a>
  <a href="doktor.php">Doktor</a>
  <a href="grafikbir.php">Kanser Türü Dağılım Oranları</a>
  <a href="grafikiki.php">Tedavi Dağılım Oranları</a>
  <a href="grafikuc.php">Evre Dağılım Oranları</a>
  <a href="logout.php">Çıkış</a>
</div>

<div id="main">
  
  <h2 class="whitetext">Menü</h2>
  <span class="whitetext"style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
  <p class="redtext">Kanser Hastalıkları Karar Destek Sistemi </p>
  
</div>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "#CBB5E3";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "#CBB5E3";
}
</script>
   
</body>
</html> 

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>

