<!DOCTYPE html>
<html>

<head>
     <?= $this->Html->charset() ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>
        <?= $this->fetch('title') ?>
    </title>
    
     <?= $this->Html->meta('icon') ?>
    
    <!-- Bootstrap CSS CDN -->
    <?= $this->Html->css('bootstrap.min.css') ?>
    <!-- Our Custom CSS -->
    <?= $this->Html->css('sidebar.css') ?>

    <!-- Font Awesome JS -->
    <?= $this->Html->script('solid.js') ?>
    <?= $this->Html->script('fontawesome.min.js') ?>
    
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Bienvenido</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Panel de Administración</p>
                <li>
                    <a href="#">Encuestas</a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Areas</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Cafe</a>
                        </li>
                        <li>
                            <a href="#">Vigilancia</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Empleados</a>
                </li>
                <li>
                    <a href="#">Notificaciones</a>
                </li>
                <li>
                    <a href="#">Resultados</a>
                </li>
                <li>
                    <a href="#">Configuración</a>
                </li>
            </ul>

           
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="btn btn-info" href="#">Crear</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Page</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container clearfix">
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <?= $this->Html->script('jquery.min.js') ?>
    <!-- Popper.JS -->
    <?= $this->Html->script('popper.min.js') ?>
    <!-- Bootstrap JS -->
    <?= $this->Html->script('bootstrap.min.js') ?>
    
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
</body>

</html>
