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
    <?php

$result = $conn->query("SELECT * FROM hasta");


$doktor = $conn->query("SELECT * FROM doktor");


$tedavi = $conn->query("SELECT * FROM tedavi");


$evre = $conn->query("SELECT * FROM evre");


$kanser = $conn->query("SELECT * FROM kanserturu");



?>
<div class="container">
<div class="col-md-6">
<form action="" method="post">
    <table class="table">

    

        <tr>
            <td>Muayene Sıra No :</td>
            <td><input type="text" name="m_id" class="form-control" ></td>
        </tr>

        <tr>
            <td>Doktor :</td>
            <td>
            <select id="cmbMake" name="d_ad"  onchange="document.getElementById('selected_d_ad').value=this.options[this.selectedIndex].text">
            
            <?php while ($ege = $doktor->fetch_assoc()){ ?> 

            <option value="<?php echo $ege['d_ad'];echo ' ';echo $ege['d_soyad'];?>"> <?php echo $ege['d_ad'];echo ' ';echo $ege['d_soyad'];?>

            </option>   <?php } ?>
        </select>
        <input type="hidden" name="selected_d_ad" id="selected_d_ad" value="FİDAN ATUĞ" />     
        
        </td>
        </tr>

        <tr> 
            <td>
             Hasta Adı: 
            </td>
        <td>
        <select id="cmbMake" name="h_ad"  onchange="document.getElementById('selected_h_ad').value=this.options[this.selectedIndex].text">
            
            <?php while ($ege = $result->fetch_assoc()){ ?> 

            <option value="<?php echo $ege['h_ad'];?>"> <?php echo $ege['h_ad'];?>

            </option>   <?php } ?>
        </select>
        <input type="hidden" name="selected_h_ad" id="selected_h_ad" value="EGE" />
        </td></tr>

        <tr>
            <td>Tedavi :</td>
            <td>
            <select id="cmbMake" name="ted_ad"  onchange="document.getElementById('selected_ted_ad').value=this.options[this.selectedIndex].text">
            
            <?php while ($ege = $tedavi->fetch_assoc()){ ?> 

            <option value="<?php echo $ege['ted_ad'];?>"> <?php echo $ege['ted_ad'];?>

            </option>   <?php } ?>
        </select>
        <input type="hidden" name="selected_ted_ad" id="selected_ted_ad" value="Cerrahi Tedavi" />     
        
        </td>

        </tr>

        <tr> 
            <td>

             Evre :
            </td>
            <td>
            <select id="cmbMake" name="evre_id"  onchange="document.getElementById('selected_evre_id').value=this.options[this.selectedIndex].text">
            
            <?php while ($ege = $evre->fetch_assoc()){ ?> 

            <option value="<?php echo $ege['evre_id'];?>"> <?php echo $ege['evre_id'];?>

            </option>   <?php } ?>
        </select>
        <input type="hidden" name="selected_evre_id" id="selected_evre_id" value=1 />     
        
            </td>
        </tr>

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

            <tr>
            <td>Muayene Tarihi :</td>
            <td><input type="date" name="m_tarih" class="form-control" ></td>
            </tr>

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
    $m_id = $_POST['m_id'];
 
//yeni
        $maker = $_POST['selected_d_ad']; // get the selected text
        $maker = (explode(" ",$maker))[0];
        $egeiki = $conn->query("SELECT * FROM doktor WHERE d_ad='$maker'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $m_d_id = $ege['d_id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }
        //yeni
        $maker = $_POST['selected_h_ad']; // get the selected text
        $egeiki = $conn->query("SELECT * FROM hasta WHERE h_ad='$maker'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $m_h_id = $ege['h_id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }

        $maker = $_POST['selected_ted_ad']; // get the selected text
        $egeiki = $conn->query("SELECT * FROM tedavi WHERE ted_ad='$maker'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $m_ted_id = $ege['ted_id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }

        $maker = $_POST['selected_evre_id']; // get the selected text
        $egeiki = $conn->query("SELECT * FROM evre WHERE evre_id='$maker'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $m_evre_id = $ege['evre_id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }

        $maker = $_POST['selected_ktur_ad']; // get the selected text
        $egeiki = $conn->query("SELECT * FROM kanserturu WHERE ktur_ad='$maker'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $m_ktur_id = $ege['ktur_id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }

        $m_tarih = $_POST['m_tarih'];

    //if ($h_ad<>"" && $h_soyad<>"") { 
    // Veri alanlarının boş olmadığını kontrol ettiriyoruz. Başka kontrollerde yapabilirsiniz.
        
         // Veri ekleme sorgumuzu yazıyoruz.
        if ($conn->query("INSERT INTO muayene (m_id,d_id,h_id,ted_id,evre_id,ktur_id,m_tarih) VALUES ('$m_id','$m_d_id','$m_h_id','$m_ted_id','$m_evre_id','$m_ktur_id','$m_tarih')")) 
        {
            echo "Veri Eklendi"; // Eğer veri eklendiyse eklendi yazmasını sağlıyoruz.
        }
        else
        {
            echo "Hata oluştu";
        }

    //}

}

?>
</div>
<!-- ############################################################## -->

<!-- Veritabanına eklenmiş verileri sıralamak için önce üst kısmı hazırlayalım. -->
<div class="col-md-7">
<table class="table">
    
    <tr>
        <th>Muayene Sıra No</th>
        <th>Doktor</th>
        <th>Hasta</th>
        <th>Tedavi</th>
        <th>Evre</th>
        <th>Kanser Türü</th>
        <th>Muayene Tarihi</th>
        <th></th>
        <th></th>
    </tr>

<!-- Şimdi ise verileri sıralayarak çekmek için PHP kodlamamıza geçiyoruz. -->

<?php 

$sorgu = $conn->query("SELECT * FROM muayene"); // Makale tablosundaki tüm verileri çekiyoruz.

while ($sonuc = $sorgu->fetch_assoc()) { 

$m_id = $sonuc['m_id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.

//yeni
$m_d_id = $sonuc ["d_id"];

        $egeiki = $conn->query("SELECT * FROM doktor WHERE d_id='$m_d_id'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $m_d_ad = $ege['d_ad'];
        // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }
        //yeni

$m_h_id = $sonuc ["h_id"];

        $egeiki = $conn->query("SELECT * FROM hasta WHERE h_id='$m_h_id'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $m_h_ad = $ege['h_ad']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }

$m_ted_id = $sonuc ["ted_id"];

        $egeiki = $conn->query("SELECT * FROM tedavi WHERE ted_id='$m_ted_id'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $m_ted_ad = $ege['ted_ad']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }

$m_evre_id = $sonuc ["evre_id"];

        $egeiki = $conn->query("SELECT * FROM evre WHERE evre_id='$m_evre_id'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $m_evre_id = $ege['evre_id']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }

 $m_ktur_id = $sonuc ["ktur_id"];

        $egeiki = $conn->query("SELECT * FROM kanserturu WHERE ktur_id='$m_ktur_id'"); // Makale tablosundaki tüm verileri çekiyoruz.
        while ($ege = $egeiki->fetch_assoc()) 
        { 
        $m_ktur_ad = $ege['ktur_ad']; // Veritabanından çektiğimiz id satırını $id olarak tanımlıyoruz.
        }

        $m_tarih = $sonuc['m_tarih'];
// While döngüsü ile verileri sıralayacağız. Burada PHP tagını kapatarak tırnaklarla uğraşmadan tekrarlatabiliriz. 
?>
    
    <tr>
        <td><?php echo $m_id; // Yukarıda tanıttığımız gibi alanları dolduruyoruz. ?></td>
        <td><?php echo $m_d_ad; ?></td>
        <td><?php echo $m_h_ad; ?></td>
        <td><?php echo $m_ted_ad; ?></td>
        <td><?php echo $m_evre_id; ?></td>
        <td><?php echo $m_ktur_ad; ?></td>
        <td><?php echo $m_tarih; ?></td>

        
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