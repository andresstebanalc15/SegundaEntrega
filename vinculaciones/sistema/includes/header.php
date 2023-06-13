<?php

if(empty($_SESSION['active']))
{
	header('location: ../');
}
?>
<header>
		<div class="header">
			<a href="#" class="btnMenu"> <i class="icon-menu"></i> </a>
			<h1>SoftService.net</h1>
			<div class="optionsBar">
				<p><?php echo fechaC(); ?></p>
				<span>|</span>
				<span class="user"> <?php echo $_SESSION['nombre'];?></span>
			</div>
		</div>
		<?php include "nav.php"; ?>
	</header>
	<div class="modal">
		<div class="bodyModal"></div>		
	</div>