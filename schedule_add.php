<?php 
include "auth/session_check.php";

include "auth/lang_config.php";
include "_partials/header.php";
include "_partials/sidebar.php";

if(!empty($_GET['pesan'])){
	if($_GET['pesan']=="simpan"){
		$kereta = $_POST['kereta'];
		$berangkat = $_POST['berangkat'];
		$tujuan = $_POST['tujuan'];
		$waktu_berangkat = $_POST['waktu_berangkat'];
		$tiba = $_POST['tiba'];
		$harga = $_POST['harga'];
		
		
		if($kereta=="" || $berangkat=="" || $tujuan=="" || $waktu_berangkat=="" || $tiba=="" || $harga==""){
			header("location:schedule_add.php?pesan=gagal");
			//Menghentikan proses kebawah
			exit;
		}
		$date_waktu_berangkat = date("Y-m-d H:i:s",strtotime($waktu_berangkat));
		$date_tiba = date("Y-m-d H:i:s",strtotime($tiba));
		
		//$mysqli berasal dari file dbconfig
		$result = mysqli_query($mysqli, "INSERT INTO jadwal(no_kereta,`Berangkat`,waktu_berangkat,tujuan,perkiraan_tiba,harga) VALUES
		('$kereta','$berangkat','$date_waktu_berangkat','$tujuan','$date_tiba',$harga)");
		
		if ($result) {
			//Jika berhasil
			header("location:schedule.php?pesan=sukses");
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
          <h1 class="m-0 text-dark"><?php echo $txt_add_schedule; ?></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $txt_add_schedule; ?></li>
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
				     if($_GET["pesan"]=="gagal"){
				?>
				<div class="alert alert-danger">
                    <?php echo $txt_alert_empty_form; ?>
                </div>
				<?php }} ?>
              <div class="row">
                <div class="col-md-1">
				</div>
                <div class="col-md-11">
				<form name="form_add" action="schedule_add.php?pesan=simpan" method="post">
                  <dl class="dl-horizontal">
                    <dt><?php echo $txt_train; ?></dt>
                    <dd><select name="kereta">
						<option selected disabled><?php echo $txt_select_train; ?></option>
						<?php
						$query_kereta = mysqli_query($mysqli,"SELECT * FROM kereta");
							$row = mysqli_num_rows($query_kereta);
							
							if($row > 0){
								while ($res = mysqli_fetch_assoc($query_kereta))
								{
									echo "<option value='".$res['No_Kereta']."'>".$res['Nama_Kereta']."</option>";
								}
							}
						?>
					</select></dd>      
					<dt><?php echo $txt_from; ?></dt>
                    <dd><input type="text" name="berangkat" /></dd> 
					<dt><?php echo $txt_to; ?></dt>
                    <dd><input type="text" name="tujuan" /></dd> 
                    <dt><?php echo $txt_departure_time; ?></dt>
                    <dd><input type="datetime-local" name="waktu_berangkat" /></dd>       
                    <dt><?php echo $txt_arrives_time; ?></dt>
                    <dd><input type="datetime-local" name="tiba" /></dd>
					<dt><?php echo $txt_price; ?></dt>
                    <dd>Rp. <input type="number" name="harga" /></dd> 
                  </dl>
                </div>
              </div>
            </div>
            <div class="card-footer">
                <a href="schedule.php" class="btn btn-outline-info"><?php echo $txt_back; ?></a>
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