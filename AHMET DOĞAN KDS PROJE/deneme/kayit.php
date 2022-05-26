<?php 
include("db_conn.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
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

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Veritabanı İşlemleri</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="col-md-6">
<form action="" method="post">
    <table class="table">

   

        <tr>
            <td>Tc :</td>
            <td><input type="text" name="h_id" class="form-control" ></td>
        </tr>

        <tr>
            <td>Ad :</td>
            <td><input type="text" name="h_ad" class="form-control" ></td>
        </tr>

        <tr>
            <td>Soyad :</td>
            <td><input name="h_soyad" class="form-control" ></textarea></td>
        </tr>

        <tr>
            <td>Telefon :</td>
            <td><input name="h_tel" class="form-control" ></textarea></td>
        </tr>

        <tr> 
            <td>

             Kan Grubu : 
            </td>
            <td>
            <select id="cmbMake" name="kan_id"     
                onchange="document.getElementById('selected_kangrubu').value=this.options[this.selectedIndex].text">
                <option value="0">Lütfen Kan Grubu Seçiniz</option>
                <option value="1">0+</option>
                <option value="2">0-</option>
                <option value="3">AB+</option>
                <option value="4">AB-</option>
                <option value="5">A+</option>
                <option value="6">A-</option>
                <option value="7">B+</option>
                <option value="8">B-</option>
                
            </select>
            <input type="hidden" name="selected_kangrubu" id="selected_kangrubu" value="" />
            </td></tr>

            <tr> 
            <td>

             Cinsiyet  : 
            </td>
            <td>
            <select id="cmbMake" name="c_id"     
                onchange="document.getElementById('selected_cinsiyet').value=this.options[this.selectedIndex].text">
                <option value="0">Lütfen Cinsiyet Seçiniz</option>
                <option value="1">Kadın</option>
                <option value="2">Erkek</option>
                
            </select>
            <input type="hidden" name="selected_cinsiyet" id="selected_cinsiyet" value="" />
            </td></tr>

            <tr>
            <td></td>
            <td><input class="btn btn-primary"  type="submit" value="Ekle"></td>
        </tr>

    </table>
</form>

<!-- Öncelikle HTML düzenimizi oluşturuyoruz. Daha sonra girdiğimiz verileri veritabanına eklemesi için PHP kodlarına geçiyoruz. -->

<?php 

if ($_POST) { // Sayfada post olup olmadığını kontrol ediyoruz.

    // Sayfa yenilendikten sonra post edilen değerleri değişkenlere atıyoruz
    $h_id = $_POST['h_id'];
    $h_ad = $_POST['h_ad']; 
    $h_soyad = $_POST['h_soyad'];
    $h_tel = $_POST['h_tel'];
//yeni
        $maker = $_POST['selected_kangrubu']; // get the selected text
        $egeiki = $conn->query("SELECT * FROM kangrubu WHERE kan_ad='$maker'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $h_kan_id = $ege['kan_id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }
        //yeni
        $maker = $_POST['selected_cinsiyet']; // get the selected text
        $egeiki = $conn->query("SELECT * FROM cinsiyet WHERE c_ad='$maker'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $h_c_id = $ege['c_id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }

    if ($h_ad<>"" && $h_soyad<>"") { 
    // Veri alanlarının boş olmadığını kontrol ettiriyoruz. Başka kontrollerde yapabilirsiniz.
        
         // Veri ekleme sorgumuzu yazıyoruz.
        if ($conn->query("INSERT INTO hasta (h_id,h_ad,h_soyad,h_tel,kan_id,c_id) VALUES ('$h_id','$h_ad','$h_soyad','$h_tel','$h_kan_id','$h_c_id')")) 
        {
            echo "Veri Eklendi"; // Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
        }
        else
        {
            echo "Hata oluştu";
        }

    }

}

?>
</div>
<!-- ############################################################## -->

<!-- Veritabanına eklenmiş verileri sıralamak için önce üst kısmı hazırlayalım. -->
<div class="col-md-7">
<table class="table">
    
    <tr>
        <th>TC</th>
        <th>Ad</th>
        <th>Soyad</th>
        <th>Telefon</th>
        <th>Kan Grubu</th>
        <th>Cinsiyet</th>
        <th></th>
        <th></th>
    </tr>

<!-- Şimdi ise verileri sıralayarak çekmek için PHP kodlamamıza geçiyoruz. -->

<?php 



$sorgu = $conn->query("SELECT * FROM hasta"); // Makale tablosundaki tüm verileri çekiyoruz.

while ($sonuc = $sorgu->fetch_assoc()) { 

$h_id = $sonuc['h_id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
$h_ad = $sonuc['h_ad'];
$h_soyad = $sonuc['h_soyad'];
$h_tel = $sonuc['h_tel'];
//yeni
$h_kan_id = $sonuc ["kan_id"];

        $egeiki = $conn->query("SELECT * FROM kangrubu WHERE kan_id='$h_kan_id'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $h_kan_ad = $ege['kan_ad']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }
        //yeni

 $h_c_id = $sonuc ["c_id"];

        $egeiki = $conn->query("SELECT * FROM cinsiyet WHERE c_id='$h_c_id'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $h_c_ad = $ege['c_ad']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }

        
// While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz. 
?>
    
    <tr>
        <td><?php echo $h_id; // Yukarıda tanıttığımız gibi alanları dolduruyoruz. ?></td>
        <td><?php echo $h_ad; ?></td>
        <td><?php echo $h_soyad; ?></td>
        <td><?php echo $h_tel; ?></td>
        <td><?php echo $h_kan_ad; ?></td>
        <td><?php echo $h_c_ad; ?></td>

        <td><a href="duzenle.php?h_id=<?php echo $h_id;?>&h_kan_ad=<?php echo $h_kan_ad;?>&h_c_ad=<?php echo $h_c_ad;?>" class="btn btn-primary">Düzenle</a></td>
        <td><a href="sil.php?h_id=<?php echo $h_id; ?>" class="btn btn-danger">Sil</a></td>
    </tr>

<?php 
} 
// Tekrarlanacak kısım bittikten sonra PHP tagının içinde while döngüsünü süslü parantezi kapatarak sonlandırıyoruz. 
?>

</table>
</div>
</div>
</body>
</html>