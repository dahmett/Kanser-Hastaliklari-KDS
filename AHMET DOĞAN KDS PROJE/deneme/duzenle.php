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

$sorgu = $conn->query("SELECT * FROM hasta WHERE h_id =".(int)$_GET['h_id']); 
//id değeri ile düzenlenecek verileri veritabanından alacak sorgu
$sonuc = $sorgu->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor

$kan_ad = $_GET['h_kan_ad'];
$sorgu2 = $conn->query("SELECT * FROM kangrubu WHERE kan_ad ='$kan_ad'"); 
//id değeri ile düzenlenecek verileri veritabanından alacak sorgu
$sonuc2 = $sorgu2->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor

$c_ad = $_GET['h_c_ad'];
$sorgu3 = $conn->query("SELECT * FROM cinsiyet WHERE c_ad ='$c_ad'"); 
//id değeri ile düzenlenecek verileri veritabanından alacak sorgu
$sonuc3 = $sorgu3->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor

?>


<div class="container">
<div class="col-md-6">

<form action="" method="post">
    
    <table class="table">

        

        <tr>
            <td>TC</td>
            <td><input type="text" name="h_id" class="form-control" value="<?php echo $sonuc['h_id']; 
                 // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
            </td>
        </tr>
        
        <tr>
            <td>Ad</td>
            <td><input type="text" name="h_ad" class="form-control" value="<?php echo $sonuc['h_ad']; 
                 // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
            </td>
        </tr>

        <tr>
            <td>Soyad</td>
            <td><input type="text" name="h_soyad" class="form-control" value="<?php echo $sonuc['h_soyad']; 
                 // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
            </td>
        </tr>

        <tr>
            <td>Telefon</td>
            <td><input type="text" name="h_tel" class="form-control" value="<?php echo $sonuc['h_tel']; 
                 // Veritabanından verileri çekip inputların içine yazdırıyoruz. ?>">
            </td>
        </tr>

        <tr>
            <td>Kan Grubu</td>
            <td>
            <select id="cmbMake" name="kan_id"     
                onchange="document.getElementById('selected_kangrubu').value=this.options[this.selectedIndex].text">
                <option value="0"><?php echo $sonuc2['kan_ad']; ?></option>
                <option value="1">0+</option>
                <option value="2">0-</option>
                <option value="3">AB+</option>
                <option value="4">AB-</option>
                <option value="5">A+</option>
                <option value="6">A-</option>
                <option value="7">B+</option>
                <option value="8">B-</option>
            </select>
            <input type="hidden" name="selected_kangrubu" id="selected_kangrubu" value=<?php echo $sonuc2['kan_ad']; ?> />
            </td>
        </tr>

        <tr>
            <td>Cinsiyet</td>
            <td>
            <select id="cmbMake" name="c_id"     
                onchange="document.getElementById('selected_cinsiyet').value=this.options[this.selectedIndex].text">
                <option value="0"><?php echo $sonuc3['c_ad']; ?></option>
                <option value="1">Kadın</option>
                <option value="2">Erkek</option>
            </select>
            <input type="hidden" name="selected_cinsiyet" id="selected_cinsiyet" value=<?php echo $sonuc3['c_ad']; ?> />
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
    
    $h_id = $_POST['h_id'];
    $h_ad = $_POST['h_ad']; // Post edilen değerleri değişkenlere aktarıyoruz
    $h_soyad = $_POST['h_soyad'];
    $h_tel = $_POST['h_tel'];

    $h_kan_ad = $_POST['selected_kangrubu'];
    $sorgu2 = $conn->query("SELECT * FROM kangrubu WHERE kan_ad ='$h_kan_ad'"); 
    $sonuc2 = $sorgu2->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor
    $new_kan_id = $sonuc2['kan_id'];

    $h_c_ad = $_POST['selected_cinsiyet'];
    $sorgu3 = $conn->query("SELECT * FROM cinsiyet WHERE c_ad ='$h_c_ad'"); 
    $sonuc3 = $sorgu3->fetch_assoc(); //sorgu çalıştırılıp veriler alınıyor
    $new_c_id = $sonuc3['c_id'];

    if ($h_ad<>"" && $h_soyad<>"") { // Veri alanlarının boş olmadığını kontrol ettiriyoruz.
        
        // Veri güncelleme sorgumuzu yazıyoruz.
        if ($conn->query("UPDATE hasta SET h_id = '$h_id', h_ad = '$h_ad', h_soyad = '$h_soyad', h_tel = '$h_tel', kan_id = '$new_kan_id' , c_id = '$new_c_id' WHERE h_id =".$_GET['h_id'])) 
        {
            header("location:kayit.php"); 
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