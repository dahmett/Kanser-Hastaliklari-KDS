<?php 

if ($_GET) 
{

include("db_conn.php"); // veritabanı bağlantımızı sayfamıza ekliyoruz.

// id'si seçilen veriyi silme sorgumuzu yazıyoruz.
if ($conn->query("DELETE FROM hasta WHERE h_id =".(int)$_GET['h_id'])) 
{
    header("location:kayit.php"); // Eğer sorgu çalışırsa ekle.php sayfasına gönderiyoruz.
} 
}

?>