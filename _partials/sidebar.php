<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="#" class="brand-link">
		<i class="nav-icon fas">TK - </i>
		<span class="brand-text font-weight-light">Transportasi Kereta</span>
	</a>
	
	<div class="sidebar">
		<div class="user-panel mt-3 pb-4 mb-3 d-flex">
			<div class="image">
				<img src="themes/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block"><?php echo $_SESSION['name']; ?></a>
			</div>
		</div>
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item">
					<a href="index.php" class="nav-link">
						<i class="nav-icon fas fa-th"></i>
						<p><?php echo $txt_dashboard; ?></p>
					</a>
				</li>
				
				
				<?php
				if($_SESSION['status']=="user"){
				?>
				<li class="nav-item">
					<a href="order_ticket.php" class="nav-link">
						<i class="nav-icon fas">-</i>
						<p><?php echo $txt_order_ticket; ?></p>
					</a>
				</li>
				<li class="nav-item">
					<a href="history.php" class="nav-link">
						<i class="nav-icon fas">-</i>
						<p><?php echo $txt_order_history; ?></p>
					</a>
				</li>
				<li class="nav-header"><?php echo $txt_account; ?></li>
				<li class="nav-item">
					<a href="auth/proses_login.php?status=admin" class="nav-link">
						<i class="nav-icon far ">A</i>
						<p class="text"><?php echo $txt_login_admin; ?></p>
					</a>
				</li>
				<?php } ?>
				<?php
				if($_SESSION['status']=="admin"){
				?>
				<li class="nav-item">
					<a href="train_list.php" class="nav-link">
						<i class="nav-icon fas">-</i>
						<p><?php echo $txt_train_list; ?></p>
					</a>
				</li>
				<li class="nav-item">
					<a href="schedule.php" class="nav-link">
						<i class="nav-icon fas">-</i>
						<p><?php echo $txt_train_scheduling; ?></p>
					</a>
				</li>
				<li class="nav-item">
					<a href="list_transaction.php" class="nav-link">
						<i class="nav-icon fas">-</i>
						<p><?php echo $txt_transaction_list; ?></p>
					</a>
				</li>
				<li class="nav-header"><?php echo $txt_account; ?></li>
				<li class="nav-item">
					<a href="auth/session_logout.php" class="nav-link">
						<i class="nav-icon far ">U</i>
						<p class="text"><?php echo $txt_login_user; ?></p>
					</a>
				</li>
				<?php } ?>
				<li class="nav-item">
					<a href="auth/session_logout.php" class="nav-link">
						<i class="nav-icon far fa-circle text-danger"></i>
						<p class="text"><?php echo $txt_logout; ?></p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>