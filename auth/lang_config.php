<?php
require "db_config.php";

if(isset($_GET['lang'])) {
	$_SESSION['lang'] = $_GET['lang'];
}

$txt_sign_caption = getTxt("sign_caption");
$txt_register_caption = getTxt("register_caption");
$txt_register = getTxt("register");
$txt_sign = getTxt("sign");
$txt_have_account = getTxt("have_account?");
$txt_fullname = getTxt("fullname");
$txt_confirm = getTxt("confirm");
$txt_lang = getTxt("lang");
$txt_success_register = getTxt("success_register");
$txt_alert_failed_login = getTxt("alert_failed_login"); 
$txt_alert_empty = getTxt("alert_empty"); 
$txt_logout = getTxt("logout"); 
$txt_account = getTxt("account");
$txt_order_history = getTxt("order_history"); 
$txt_train_list = getTxt("train_list");
$txt_order_ticket = getTxt("order_ticket");   

function getTxt($nama_teks){
	global $mysqli;
	$q = mysqli_query($mysqli,"SELECT * FROM bahasa WHERE text='$nama_teks'");
	$res = mysqli_fetch_assoc($q);
	$teks = $res[$_SESSION['lang']];
	
	return $teks;
}
?>