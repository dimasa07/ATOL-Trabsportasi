<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="location" class="brand-link">
		<img src="themes/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="order_ticket.php" class="nav-link">
						<i class="nav-icon fas fa-tags"></i>
						<p><?php echo $txt_order_ticket; ?></p>
					</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link">
						<i class="nav-icon fas fa-cart-plus"></i>
						<p><?php echo $txt_train_list; ?></p>
					</a>
				</li>
				<li class="nav-item">
					<a href="" class="nav-link">
						<i class="nav-icon fas fa-dollar-sign"></i>
						<p><?php echo $txt_order_history; ?></p>
					</a>
				</li>
				<li class="nav-header"><?php echo $txt_account; ?></li>
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