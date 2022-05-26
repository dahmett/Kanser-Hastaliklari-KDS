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
            <td><input type="text" name="d_id" class="form-control" ></td>
        </tr>

        <tr>
            <td>Ad :</td>
            <td><input type="text" name="d_ad" class="form-control" ></td>
        </tr>

        <tr>
            <td>Soyad :</td>
            <td><input name="d_soyad" class="form-control" ></textarea></td>
        </tr>

        <tr>
            <td>Telefon :</td>
            <td><input name="d_tel" class="form-control" ></textarea></td>
        </tr>

            <tr> 
            <td>

             Hastane : 
            </td>
            <td>
            <select id="cmbMake" name="hastane_id"     
                onchange="document.getElementById('selected_hastane').value=this.options[this.selectedIndex].text">
                <option value="0">Hastane </option>
                <option value="1">Medical Park Hastanesi</option>
                <option value="2">Acıbadem Hastanesi</option>
                <option value="3">Medipol Hastanesi</option>
            </select>
            <input type="hidden" name="selected_hastane" id="selected_hastane" value="" />
            </td></tr>

            <tr> 
            <td>

             Unvan : 
            </td>
            <td>
            <select id="cmbMake" name="unvan_id"     
                onchange="document.getElementById('selected_unvan').value=this.options[this.selectedIndex].text">
                <option value="0">Unvan</option>
                <option value="1">Doktor</option>
                <option value="2">Uzman Doktor</option>
                <option value="3">Yardımcı Doçent Doktor</option>
                <option value="4">Doçent Doktor</option>
                <option value="5">Profesör Doktor</option>
            </select>
            <input type="hidden" name="selected_unvan" id="selected_unvan" value="" />
            </td></tr>

            <tr> 
            <td>

             Uzman : 
            </td>
            <td>
            <select id="cmbMake" name="uzman_id"     
                onchange="document.getElementById('selected_uzman').value=this.options[this.selectedIndex].text">
                <option value="0">Uzmanlık</option>
                <option value="1">Jinekolojik Onkoloji</option>
                <option value="2">Radyolojik Onkoloji</option>
                <option value="3">Cerrahi Onkoloji</option>
                <option value="4">Medikal Onkoloji</option>
                <option value="5">Pediatrik Onkoloji</option>
            </select>
            <input type="hidden" name="selected_uzman" id="selected_uzman" value="" />
            </td></tr>

            <tr> 
            <td>

             Cinsiyet  : 
            </td>
            <td>
            <select id="cmbMake" name="c_id"     
                onchange="document.getElementById('selected_cinsiyet').value=this.options[this.selectedIndex].text">
                <option value="0">Cinsiyet</option>
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
    $d_id = $_POST['d_id'];
    $d_ad = $_POST['d_ad']; 
    $d_soyad = $_POST['d_soyad'];
    $d_tel = $_POST['d_tel'];
//yeni
        $maker = $_POST['selected_hastane']; // get the selected text
        $egeiki = $conn->query("SELECT * FROM hastane WHERE hastane_ad='$maker'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $d_hastane_id = $ege['hastane_id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }
        //yeni

        $maker = $_POST['selected_unvan']; // get the selected text
        $egeiki = $conn->query("SELECT * FROM unvan WHERE unvan_ad='$maker'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $d_unvan_id = $ege['unvan_id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }

        $maker = $_POST['selected_uzman']; // get the selected text
        $egeiki = $conn->query("SELECT * FROM uzman WHERE uzman_ad='$maker'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $d_uzman_id = $ege['uzman_id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }

        $maker = $_POST['selected_cinsiyet']; // get the selected text
        $egeiki = $conn->query("SELECT * FROM cinsiyet WHERE c_ad='$maker'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $d_c_id = $ege['c_id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }

    if ($d_ad<>"" && $d_soyad<>"") { 
    // Veri alanlarının boş olmadığını kontrol ettiriyoruz. Başka kontrollerde yapabilirsiniz.
        
         // Veri ekleme sorgumuzu yazıyoruz.
        if ($conn->query("INSERT INTO doktor (d_id,d_ad,d_soyad,d_tel,hastane_id,unvan_id,uzman_id,c_id) VALUES ('$d_id','$d_ad','$d_soyad','$d_tel','$d_hastane_id','$d_unvan_id','$d_uzman_id','$d_c_id')")) 
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
        <th>Hastane</th>
        <th>Unvan</th>
        <th>Uzman</th>
        <th>Cinsiyet</th>
        <th></th>
        <th></th>
    </tr>

<!-- Şimdi ise verileri sıralayarak çekmek için PHP kodlamamıza geçiyoruz. -->

<?php 



$sorgu = $conn->query("SELECT * FROM doktor"); // Makale tablosundaki tüm verileri çekiyoruz.

while ($sonuc = $sorgu->fetch_assoc()) { 

$d_id = $sonuc['d_id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
$d_ad = $sonuc['d_ad'];
$d_soyad = $sonuc['d_soyad'];
$d_tel = $sonuc['d_tel'];
//yeni
$d_hastane_id = $sonuc ["hastane_id"];

        $egeiki = $conn->query("SELECT * FROM hastane WHERE hastane_id='$d_hastane_id'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $d_hastane_ad = $ege['hastane_ad']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }
        //yeni

$d_unvan_id = $sonuc ["unvan_id"];

        $egeiki = $conn->query("SELECT * FROM unvan WHERE unvan_id='$d_unvan_id'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $d_unvan_ad = $ege['unvan_ad']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }

$d_uzman_id = $sonuc ["uzman_id"];

        $egeiki = $conn->query("SELECT * FROM uzman WHERE uzman_id='$d_uzman_id'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $d_uzman_ad = $ege['uzman_ad']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }

 $d_c_id = $sonuc ["c_id"];

        $egeiki = $conn->query("SELECT * FROM cinsiyet WHERE c_id='$d_c_id'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $d_c_ad = $ege['c_ad']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }

        
// While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz. 
?>
    
    <tr>
        <td><?php echo $d_id; // Yukarıda tanıttığımız gibi alanları dolduruyoruz. ?></td>
        <td><?php echo $d_ad; ?></td>
        <td><?php echo $d_soyad; ?></td>
        <td><?php echo $d_tel; ?></td>
        <td><?php echo $d_hastane_ad; ?></td>
        <td><?php echo $d_unvan_ad; ?></td>
        <td><?php echo $d_uzman_ad; ?></td>
        <td><?php echo $d_c_ad; ?></td>

        <td><a href="dduzenle.php?d_id=<?php echo $d_id;?>&d_hastane_id=<?php echo $d_hastane_id;?>&d_unvan_id=<?php echo $d_unvan_id;?>&d_uzman_id=<?php echo $d_uzman_id;?>&d_c_id=<?php echo $d_c_id;?>" class="btn btn-primary">Düzenle</a></td>
        <td><a href="dsil.php?d_id=<?php echo $d_id; ?>" class="btn btn-danger">Sil</a></td>
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