<?php 
include "auth/session_check.php";

include "auth/lang_config.php";
include "_partials/header.php";
include "_partials/sidebar.php";

if(!empty($_GET['pesan'])){
	if($_GET['pesan']=="simpan"){
		$no_kereta = $_POST['no_kereta'];
		$nama_kereta = $_POST['nama_kereta'];
		
		
		if($no_kereta=="" || $nama_kereta==""){
			header("location:train_add.php?pesan=gagal");
			//Menghentikan proses kebawah
			exit;
		}
		
		if(strlen($no_kereta)>3){
			header("location:train_add.php?pesan=jml_karakter");
			//Menghentikan proses kebawah
			die;
		}
		
		$data = mysqli_query($mysqli,"select * from kereta where no_kereta='$no_kereta'");
		$cek = mysqli_num_rows($data);

		//Jika no_kereta sudah terdaftar makan kembali ke form pendaftaran
		if($cek > 0){
			header("location:train_add.php?pesan=no_kereta");
			//Menghentikan proses kebawah
			die;
		}
		
		$data2 = mysqli_query($mysqli,"select * from kereta where nama_kereta='$nama_kereta'");
		$cek2 = mysqli_num_rows($data2);

		//Jika nama_kereta sudah terdaftar makan kembali ke form pendaftaran
		if($cek2 > 0){
			header("location:train_add.php?pesan=nama");
			//Menghentikan proses kebawah
			die;
		}
		
		//$mysqli berasal dari file dbconfig
		$result = mysqli_query($mysqli, "INSERT INTO kereta(no_kereta,nama_kereta) VALUES
		('$no_kereta','$nama_kereta')");
		
		if ($result) {
			//Jika berhasil
			header("location:train_list.php?pesan=sukses");
			//Menghentikan proses kebawah
			exit;
		} else {
			echo "Error: "  . "<br>" .  mysqli_error($mysqli);
		}
		
	}
}
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?php echo "$txt_add $txt_train"; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?php echo "$txt_add $txt_train"; ?></li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
				<?php
                if (!empty($_GET["pesan"])) {
					$pesan = "";
				     if($_GET["pesan"]=="gagal"){
						$pesan = $txt_alert_empty_form;
					 }else if($_GET["pesan"]=="no_kereta"){
						$pesan = $txt_alert_registered_no_train;
					 }else if($_GET["pesan"]=="nama"){
						$pesan = $txt_alert_registered_name_train;
					 }else if($_GET["pesan"]=="jml_karakter"){
						$pesan = $txt_alert_number_character;
					 }
				?>
				<div class="alert alert-danger">
                    <?php echo $pesan; ?>
                </div>
				<?php } ?>
              <div class="row">
                <div class="col-md-1">
				</div>
                <div class="col-md-11">
				<form name="form_add" action="train_add.php?pesan=simpan" method="post">
                  <dl class="dl-horizontal">     
					<dt>No <?php echo $txt_train; ?></dt>
                    <dd><input type="text" name="no_kereta" placeholder="M01" /></dd> 
					<dt><?php echo $txt_train_name; ?></dt>
                    <dd><input type="text" name="nama_kereta" /></dd> 
                    
                  </dl>
                </div>
              </div>
            </div>
            <div class="card-footer">
                <a href="train_list.php" class="btn btn-outline-info"><?php echo $txt_back; ?></a>
                <button type="submit" class="btn btn-primary float-right" name="simpan"><?php echo $txt_save; ?></button>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include "_partials/footer.php"; ?>