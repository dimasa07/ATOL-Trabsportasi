<?php
include "auth/session_check.php";

include "auth/lang_config.php";
include "_partials/header.php";
include "_partials/sidebar.php";
?>
<div class="content-wrapper">
	<div class="content-header">
        <div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1 class="m-0 text-dark"><?php echo $txt_dashboard; ?></h1>
				</div>
				<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active"><?php echo $txt_dashboard; ?></li>
				</ol>
				</div>
			</div>
        </div>
    </div>
 
    <div class="content">
        <div class="container-fluid">
		
			<?php 
			if($_SESSION['status']=="admin"){ 
				$query_kereta = mysqli_query($mysqli,"SELECT * FROM kereta");
				$query_jadwal = mysqli_query($mysqli,"SELECT * FROM jadwal");
				$query_tiket_dibeli = mysqli_query($mysqli,"SELECT * FROM tiket_dibeli");
				$row_kereta= mysqli_num_rows($query_kereta);
				$row_jadwal= mysqli_num_rows($query_jadwal);
				$row_tiket_dibeli= mysqli_num_rows($query_tiket_dibeli);
			?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0"><?php echo $txt_trains_number; ?></h5>
                        </div>
                        <div class="card-body">
                            <p><?php echo "$row_kereta $txt_train"; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0"><?php echo $txt_schedules_number; ?></h5>
                        </div>
                        <div class="card-body">
                            <p><?php echo "$row_jadwal $txt_schedules"; ?></p>
                        </div>
                    </div>
                </div>
            </div>		
			<div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0"><?php echo $txt_buyers_number; ?></h5>
                        </div>
                        <div class="card-body">
                            <p><?php echo "$row_tiket_dibeli $txt_transactions"; ?></p>
                        </div>
                    </div>
                </div>
            </div>
			<?php } ?>
			
			<?php
			if($_SESSION['status']=="user"){ 
				$query_tiket = mysqli_query($mysqli,"SELECT * FROM tiket_dibeli WHERE tiket_dibeli.username='".$_SESSION['username']."'");
				$row = mysqli_num_rows($query_tiket);
			?>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="m-0"><?php echo $txt_order_history; ?></h5>
                        </div>
                        <div class="card-body">
                            <p><?php echo "$row $txt_tickets"; ?> </p>
                        </div>
                    </div>
                </div>
             </div>
			<?php } ?>
			
        </div>
    </div>
</div>
	
<?php
include "_partials/footer.php";
?>