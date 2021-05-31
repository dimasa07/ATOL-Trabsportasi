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
                    <h1 class="m-0 text-dark"><b><?php echo $txt_train_list; ?></b></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $txt_train_list; ?></li>
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
                        <div class="card-header">
                            <?php echo $txt_train_list; ?>
                            <a href="train_add.php" class="btn btn-primary float-right"><?php echo $txt_add; ?></a>
                        </div>
                        <div class="card-body">
							<?php
							if (!empty($_GET["id_hapus"])) { 
								$query = "DELETE FROM kereta WHERE no_kereta ='".$_GET['id_hapus']."'";
								$result = mysqli_query($mysqli,$query);
							?>
                            <div class="alert alert-warning">
                                <?php echo "$txt_success_delete $txt_train !"; ?>
                            </div>
                            <?php }
							if(!empty($_GET["pesan"])){
								if($_GET["pesan"]=="sukses"){
							?>
							<div class="alert alert-success">
                                <?php echo $txt_success_add_train; ?>
                            </div>
							<?php }} ?>
 
                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                            <th width="10px" class="text-center">No</th>
                                            <th>No <?php echo $txt_train; ?></th>
                                            <th><?php echo $txt_train_name; ?></th>
                                            <th class="text-center"><?php echo $txt_action; ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
											$query_kereta = mysqli_query($mysqli,"SELECT * FROM kereta");
											$row = mysqli_num_rows($query_kereta);
											
											if($row > 0){
												$n=1;
												while ($res = mysqli_fetch_assoc($query_kereta))
												{
													echo "<tr><td>$n
														<td>".$res['No_Kereta']."
														<td>".$res['Nama_Kereta']."
														<td class='text-center'>
																<a onclick=\"javascript: return confirm('$txt_sure_delete');\" href='?id_hapus=".$res['No_Kereta']."' class='btn btn-sm btn-danger'>
																	<i class='fa fa-trash-alt'></i>
																</a>";
															
													$n=$n+1;
												}
											}else {
													echo "<tr><td colspan=7> <center>$txt_no_data";
												}


										?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
 
        </div>
    </div>
</div>
<?php include "_partials/footer.php"; ?>