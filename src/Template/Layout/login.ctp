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

        <!-- CSS -->
        <?= $this->Html->css('custom') ?>
        <?= $this->Html->css('font-awesome.min.css') ?>
        <?= $this->Html->css('vendor/animate/animate.css') ?>
        <?= $this->Html->css('vendor/css-hamburgers/hamburgers.min.css') ?>
        <?= $this->Html->css('vendor/select2/select2.min.css') ?>
        <?= $this->Html->css('login/util.css') ?>
        <?= $this->Html->css('login/main.css') ?>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
              crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

    </head>

    <body>


        <?= $this->fetch('content') ?>
        <!-- jQuery CDN - Slim version (=without AJAX) -->

        <?= $this->Html->script('jquery.min.js') ?>
        <!-- Popper.JS -->
        <?= $this->Html->script('popper.min.js') ?>
        <!-- Bootstrap JS -->
        <?= $this->Html->script('bootstrap.min.js') ?>
        <?= $this->Html->script('tilt.jquery.min.js') ?>
        <script>
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>
        <?= $this->Html->script('login/main.js') ?>

    </body>

</html>

