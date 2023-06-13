    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?= media();?>/images/avatar.png" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?= $_SESSION['userData']['nombres']; ?></p>
          <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['nombrerol']; ?></p>
        </div>
      </div>
      <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>" target="_blank">
                <i class="app-menu__icon fa fas fa-globe" aria-hidden="true"></i>
                <span class="app-menu__label">Ver sitio web</span>
            </a>
        </li>
        <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/dashboard">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][2]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-users" aria-hidden="true"></i>
                <span class="app-menu__label">Usuarios</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>/persona"><i class="icon fa fa-circle-o"></i> Usuarios</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/roles"><i class="icon fa fa-circle-o"></i> Roles</a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][3]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/paginas">
                <i class="app-menu__icon fas fa-file-alt" aria-hidden="true"></i>
                <span class="app-menu__label">Páginas</span>
            </a>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][4]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-newspaper-o" aria-hidden="true"></i>
                <span class="app-menu__label">Comunicaciones</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>/slider"><i class="icon fa fa-circle-o"></i> Slider</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/bloque"><i class="icon fa fa-circle-o"></i> Bloques</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/conteo"><i class="icon fa fa-circle-o"></i> Conteo</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/banco"><i class="icon fa fa-circle-o"></i> Banco Multimedia</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/prensa"><i class="icon fa fa-circle-o"></i> Sala de Prensa</a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-briefcase" aria-hidden="true"></i>
                <span class="app-menu__label">Comercial</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>/tarifa"><i class="icon fa fa-circle-o"></i> Tarifa</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-archive" aria-hidden="true"></i>
                <span class="app-menu__label">Directorio Comercial</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>/directorio"><i class="icon fa fa-circle-o"></i> Categorías</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/empresas"><i class="icon fa fa-circle-o"></i> Empresas</a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][6]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-file-archive-o" aria-hidden="true"></i>
                <span class="app-menu__label">Tramip</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>/pqrsd"><i class="icon fa fa-circle-o"></i> PQRSD</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/tramip"><i class="icon fa fa-circle-o"></i> Tramites en Linea</a></li>
            </ul>
        </li>
         <?php } ?>
         <?php if(!empty($_SESSION['permisos'][7]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-briefcase" aria-hidden="true"></i>
                <span class="app-menu__label">Administrativo</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>/proveedor"><i class="icon fa fa-circle-o"></i> Proveedores</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/hojas"><i class="icon fa fa-circle-o"></i> Hojas de Vida</a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if(!empty($_SESSION['permisos'][8]['r'])){ ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fa fa-archive" aria-hidden="true"></i>
                <span class="app-menu__label">Transparencia</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="<?= base_url(); ?>/archivo"><i class="icon fa fa-circle-o"></i> Archivos</a></li>
                <?php if(!empty($_SESSION['permisos'][8]['d'])){ ?>
                <li><a class="treeview-item" href="<?= base_url(); ?>/categoria"><i class="icon fa fa-circle-o"></i> Categorías</a></li>
                <li><a class="treeview-item" href="<?= base_url(); ?>/sub"><i class="icon fa fa-circle-o"></i> Sub-Categorías</a></li>
                <?php } ?>
            </ul>
        </li>
        <?php } ?>
        <li>
            <a class="app-menu__item" href="<?= base_url(); ?>/logout">
                <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
                <span class="app-menu__label">Logout</span>
            </a>
        </li>
      </ul>
    </aside>