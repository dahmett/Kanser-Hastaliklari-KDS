<?php 
include("db_conn.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz. 
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Düzenle</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>

<?php 

$sorgu = $conn->query("SELECT * FROM doktor WHERE d_id =".(int)$_GET['d_id']); 
//id değeri ile düzenlenecek verileri veritabanından alacak sorgu
$sonuc = $sorgu->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor

//$hastane_id = $_GET['d_hastane_id'];

$sorgu2 = $conn->query("SELECT * FROM hastane WHERE hastane_id =".(int)$_GET['d_hastane_id']); 
//id değeri ile düzenlenecek verileri veritabanından alacak sorgu
$sonuc2 = $sorgu2->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor
//$unvan_id = $_GET['d_unvan_id'];
$default_hastane = $sonuc2['hastane_ad'];
$sorgu3 = $conn->query("SELECT * FROM unvan WHERE unvan_id =".(int)$_GET['d_unvan_id']); 
//id değeri ile düzenlenecek verileri veritabanından alacak sorgu
$sonuc3 = $sorgu3->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor
$default_unvan = $sonuc3['unvan_ad'];

//$uzman_id = $_GET['d_uzman_id'];
$sorgu4 = $conn->query("SELECT * FROM uzman WHERE uzman_id =".(int)$_GET['d_uzman_id']); 
//id değeri ile düzenlenecek verileri veritabanından alacak sorgu
$sonuc4 = $sorgu4->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor
$default_uzman = $sonuc4['uzman_ad'];

//$c_id = $_GET['d_c_id'];
$sorgu5 = $conn->query("SELECT * FROM cinsiyet WHERE c_id =".(int)$_GET['d_c_id']); 
//id değeri ile düzenlenecek verileri veritabanından alacak sorgu
$sonuc5 = $sorgu5->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor
?>


<div class="container">
<div class="col-md-6">

<form action="" method="post">
    
    <table class="table">

        

        <tr>
            <td>TC</td>
            <td><input type="text" name="d_id" class="form-control" value="<?php echo $sonuc['d_id']; 
                 // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
            </td>
        </tr>
        
        <tr>
            <td>Ad</td>
            <td><input type="text" name="d_ad" class="form-control" value="<?php echo $sonuc['d_ad']; 
                 // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
            </td>
        </tr>

        <tr>
            <td>Soyad</td>
            <td><input type="text" name="d_soyad" class="form-control" value="<?php echo $sonuc['d_soyad']; 
                 // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
            </td>
        </tr>

        <tr>
            <td>Telefon</td>
            <td><input type="text" name="d_tel" class="form-control" value="<?php echo $sonuc['d_tel']; 
                 // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
            </td>
        </tr>

        <tr>
            <td>Hastane</td>
            <td>
            <select id="cmbMake" name="hastane_id"     
                onchange="document.getElementById('selected_hastane').value=this.options[this.selectedIndex].text">
                <option value="0"><?php echo $sonuc2['hastane_ad']; ?></option>
                <option value="1">Medical Park Hastanesi</option>
                <option value="2">Acıbadem Hastanesi</option>
                <option value="3">Medipol Hastanesi</option>
            </select>
            <input type="hidden" name="selected_hastane" id="selected_hastane" value=<?php echo "'$default_hastane'"; ?>/>
            </td>
        </tr>

        <tr>
            <td>Unvan</td>
            <td>
            <select id="cmbMake" name="unvan_id"     
                onchange="document.getElementById('selected_unvan').value=this.options[this.selectedIndex].text">
                <option value="0"><?php echo $sonuc3['unvan_ad']; ?></option>
                <option value="1">Doktor</option>
                <option value="2">Uzman Doktor</option>
                <option value="3">Yardımcı Doçent Doktor</option>
                <option value="4">Doçent Doktor</option>
                <option value="5">Profesör Doktor</option>
            </select>
            <input type="hidden" name="selected_unvan" id="selected_unvan" value=<?php echo "'$default_unvan'"; ?> />
            </td>
        </tr>

        <tr>
            <td>Uzman</td>
            <td>
            <select id="cmbMake" name="uzman_id"     
                onchange="document.getElementById('selected_uzman').value=this.options[this.selectedIndex].text">
                <option value="0"><?php echo $sonuc4['uzman_ad']; ?></option>
                <option value="1">Jinekolojik Onkoloji</option>
                <option value="2">Radyolojik Onkoloji</option>
                <option value="3">Cerrahi Onkoloji</option>
                <option value="4">Medikal Onkoloji</option>
                <option value="5">Pediatrik Onkoloji</option>
            </select>
            <input type="hidden" name="selected_uzman" id="selected_uzman" value=<?php echo "'$default_uzman'"; ?> />
            </td>
        </tr>

        <tr>
            <td>Cinsiyet</td>
            <td>
            <select id="cmbMake" name="c_id"     
                onchange="document.getElementById('selected_cinsiyet').value=this.options[this.selectedIndex].text">
                <option value="0"><?php echo $sonuc5['c_ad']; ?></option>
                <option value="1">Kadın</option>
                <option value="2">Erkek</option>
            </select>
            <input type="hidden" name="selected_cinsiyet" id="selected_cinsiyet" value=<?php echo $sonuc5['c_ad']; ?> />
            </td>
        </tr>



        <tr>
            <td></td>
            <td><input type="submit" class="btn btn-primary" value="Kaydet"></td>
        </tr>

    </table>

</form>
</div>
<div>
<?php 

if ($_POST) { // Post olup olmadığını kontrol ediyoruz.
    
    $d_id = $_POST['d_id'];
    $d_ad = $_POST['d_ad']; // Post edilen değerleri değişkenlere aktarıyoruz
    $d_soyad = $_POST['d_soyad'];
    $d_tel = $_POST['d_tel'];
    $d_hastane_ad = $_POST['selected_hastane'];
    $sorgu2 = $conn->query("SELECT * FROM hastane WHERE hastane_ad ='$d_hastane_ad'"); 
    $sonuc2 = $sorgu2->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor
    $new_hastane_id = $sonuc2['hastane_id'];

    
    $d_unvan_ad = $_POST['selected_unvan'];
    
    $sorgu3 = $conn->query("SELECT * FROM unvan WHERE unvan_ad ='$d_unvan_ad'"); 
    $sonuc3 = $sorgu3->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor
    $new_unvan_id = $sonuc3['unvan_id'];
    
    
    $d_uzman_ad = $_POST['selected_uzman'];
    $sorgu4 = $conn->query("SELECT * FROM uzman WHERE uzman_ad ='$d_uzman_ad'"); 
    $sonuc4 = $sorgu4->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor
    $new_uzman_id = $sonuc4['uzman_id'];

    
    $d_c_ad = $_POST['selected_cinsiyet'];
    $sorgu5 = $conn->query("SELECT * FROM cinsiyet WHERE c_ad ='$d_c_ad'"); 
    $sonuc5 = $sorgu5->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor
    $new_c_id = $sonuc5['c_id'];

    
    if ($d_ad<>"" && $d_soyad<>"") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
        
        // Veri güncelleme sorgumuzu yazıyoruz.
        if ($conn->query("UPDATE doktor SET d_id = '$d_id', d_ad = '$d_ad', d_soyad = '$d_soyad', d_tel = '$d_tel', hastane_id = '$new_hastane_id' , unvan_id = '$new_unvan_id', uzman_id = '$new_uzman_id', c_id = '$new_c_id' WHERE d_id =".$_GET['d_id'])) 
        {
            header("location:doktor.php"); 
            // Eğer güncelleme sorgusu çalıştıysa ekle.php sayfasına yönlendiriyoruz.
        }
        else
        {

            echo "Hata oluştu"; // id bulunamadıysa veya sorguda hata varsa hata yazdırıyoruz.
        }
    }
}
?>
</body>
</html>