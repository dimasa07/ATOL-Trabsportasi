<?php
if(!isset($_SESSION['lang'])){
	$_SESSION['lang'] = "indonesia";
}
// Koneksi
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_transportasi";

$mysqli = new mysqli($host, $user, $pass, $db);
if ($mysqli->connect_errno) {
  echo "Koneksi Gagal !". $mysqli->connect_errno;
} else {
  // echo "Berhasil Konek !";
}
?>
