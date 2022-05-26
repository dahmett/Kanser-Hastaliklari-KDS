<?php
include("db_conn.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
$kanser = $conn->query("SELECT * FROM kanserturu");
$kanser_turu = $conn->query("SELECT * FROM muayene");

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
 color: white;
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
<html>
<body>

<div class="container">
<div class="col-md-6">
<form action="" method="post">
      <table class="table">
    <tr> 
            <td>

            Kanser Türü :
            </td>
            <td>
            <select id="cmbMake" name="ktur_ad"  onchange="document.getElementById('selected_ktur_ad').value=this.options[this.selectedIndex].text">
            
            <?php while ($ege = $kanser->fetch_assoc()){ ?> 

            <option value="<?php echo $ege['ktur_ad'];?>"> <?php echo $ege['ktur_ad'];?>

            </option>   <?php } ?>
        </select>
        <input type="hidden" name="selected_ktur_ad" id="selected_ktur_ad" value="Rahim Ağzı Kanseri" />     
        
        </td>
        </tr>
        <td><input class="btn btn-primary"  type="submit" value="Getir"></td>
        
        </form>
    
</body>

</table>
</form>

<?php 
$sayılar = array();
    $sayılar[] = 0; $sayılar[] = 0; $sayılar[] = 0;$sayılar[] = 0;$sayılar[] = 0; $sayılar[] = 0; $sayılar[] = 0;$sayılar[] = 0;$sayılar[] = 0; $sayılar[] = 0; $sayılar[] = 0;$sayılar[] = 0;
    
if ($_POST) {
    $maker = $_POST['selected_ktur_ad'];
    $egeiki = $conn->query("SELECT * FROM kanserturu WHERE ktur_ad='$maker'"); // Makale tablosundaki tüm verileri çekiyoruz.
    while ($ege = $egeiki->fetch_assoc()) 
    { 
    $m_ktur_id = $ege['ktur_id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
    }

    $kanser_sayi = $conn->query("SELECT * FROM muayene WHERE ktur_id='$m_ktur_id'");

    $sayılar = array();
    $sayılar[] = 0; $sayılar[] = 0; $sayılar[] = 0;$sayılar[] = 0;$sayılar[] = 0; $sayılar[] = 0; $sayılar[] = 0;$sayılar[] = 0;$sayılar[] = 0; $sayılar[] = 0; $sayılar[] = 0;$sayılar[] = 0;
    $count = 0;
    $maxCount = 3;
    while ($ege = $kanser_sayi->fetch_assoc()) 
    { 
      $maker = (explode("-", $ege["m_tarih"]))[1];
      $ay  = $maker % 12;
      $sayılar[$ay] = $sayılar[$ay] + 1;
      //$dataPoints[] = array("y" => $row["m_tarih"],"label"=>$row['m_tarih']);
      
      if ($sayılar[$ay] >= $maxCount)
      {
          echo "Senenin ";
          echo $ay+1;
          echo ". ayı riskli, doktor sayısını kontrol et"; 
          echo "\n";
      }
    
    }

    
     
}
$dataPoints = array(
    array("label" => "Ocak","y"=>$sayılar[0]),
    array("label" => "Şubat","y"=>$sayılar[1]),
    array("label" => "Mart","y"=>$sayılar[2]),
    array("label" => "Nisan","y"=>$sayılar[3]),
    array("label" => "Mayıs","y"=>$sayılar[4]),
    array("label" => "Haziran","y"=>$sayılar[5]),
    array("label" => "Temmuz","y"=>$sayılar[6]),
    array("label" => "Ağustos","y"=>$sayılar[7]),
    array("label" => "Eylül","y"=>$sayılar[8]),
    array("label" => "Ekim","y"=>$sayılar[9]),
    array("label" => "Kasım","y"=>$sayılar[10]),
    array("label" => "Aralık","y"=>$sayılar[11]),
  );
      
  

    
?>
</div>
</html>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
 var chart = new CanvasJS.Chart("chartContainer", {
   title: {
     text: "Kanser Türlerinin Aylara Göre Dağılımı"
   },
   axisY: {
     title: "Hasta Sayısı"
   },
   data: [{
     type: "line",
     dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
   }]
 });
 chart.render();
  
 }
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>    





