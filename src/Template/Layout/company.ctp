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
    <?= $this->Html->css('custom') ?>
    <!-- Our Custom CSS -->
    <?= $this->Html->css('sidebar.css') ?>

    <!-- Font Awesome JS -->
    <?= $this->Html->script('solid.js') ?>
    <?= $this->Html->script('fontawesome.min.js') ?>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <?= $this->Html->script('jquery.min.js') ?>
    <!-- Popper.JS -->
    <?= $this->Html->script('popper.min.js') ?>
    <!-- Bootstrap JS -->
    <?= $this->Html->script('bootstrap.min.js') ?>
    
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Bienvenido</h3>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <?= $this->Html->link(('Panel de Administración'), ['controller'=>'Companies','action' => 'home']) ?>
                </li>
                <li>
                    <?= $this->Html->link(('Encuestas'), ['controller'=>'Polls','action' => 'index']) ?>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Areas</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <?= $this->Html->link(('Nueva Area'), ['controller'=>'Areas','action' => 'add']) ?>
                        </li>
                        <?php foreach ($areas as $key => $value): ?>
                            <li>
                                
                                <?= $this->Html->link("$value", ['controller'=>'Areas','action' => 'view', $key]) ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li>
                    <?= $this->Html->link(('Empleados'), ['controller'=>'Employees','action' => 'index']) ?>
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
                <li>
                    <?= $this->Html->link(('Cerrar sesión'), ['controller'=>'Companies','action' => 'logout']) ?>
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
                            <li class="nav-item text-left">
                                <a class="nav-link" href="<?= $this->request->referer();?>">Atras</a>
                            <li>
                            <?php  if($this->request->getParam('action') == "index" 
                                    || $this->request->getParam('action') == "view"
                                    || $this->request->getParam('action') == "edit"):
                            ?>
                                <li class="nav-item">
                                    <?= $this->Html->link(__('Crear'), ['action' => 'add'], ['class' => 'btn btn-info', 'id' => 'create']) ?> 
                                </li>
                            <?php endif; ?>
                            <?php  if($this->request->getParam('action') == "view"): ?>
                                <li class="nav-item">
                                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $this->request->getParam('pass')[0]], ['class' => 'nav-link']) ?>
                                </li>
                                <li class="nav-item">
                                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $this->request->getParam('pass')[0]], ['class' => 'nav-link', 'confirm' => __('¿Estas seguro de querer eliminar?', $this->request->getParam('pass')[0])]) ?>
                                </li>
                            <?php endif; ?>
                            
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container clearfix">
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>
    <?php echo $this->fetch('modal');  ?>

    
    
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
