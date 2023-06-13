<nav>
	<ul>
			<?php
			if($_SESSION['rol']==10 || $_SESSION['rol']==12 || $_SESSION['rol']== 2){
			?>
			<li class="principal">
				<a href="#"> Ejecutivos <span class="arrow"> <i class="icon-chevron-down"></i> </span></a>
				<ul>
					<li><a href="registro_vinculaciones.php"> Vinculaciones</a></li>
					<li><a href="internos.php"> Lista Vinculaciones</a></li>
				</ul>
			</li>
			<?php
			}
			?>
			<li class="principal">
				<a href="#"> Herramientas <span class="arrow"> <i class="icon-chevron-down"></i> </span></a>
				<ul>
					<li><a href="salir.php">Cerrar Sesión</a></li>
				</ul>
			</li>
	</ul>			
</nav>