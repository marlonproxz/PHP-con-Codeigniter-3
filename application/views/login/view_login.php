<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">
        <title><?php echo $titulo; ?></title>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>dist/bootstrap/css/dashboard.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>dist/css/login.css" rel="stylesheet">

    </head>
    <body>
        
    <div class="container">
        <?= $this->session->flashdata('error_login'); ?>
        <form action="" class="form-signin" method="POST">
            <h2 class="form-signin-heading">Datos de acceso</h2>
            <label for="inputEmail" class="sr-only">E-mail</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="E-mail" autofocus>
            <label for="inputPassword" class="sr-only">Contraseña</label>
            <input type="password" id="inputPassword" name="contraseña" class="form-control" placeholder="Contraseña">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Logear</button>
        </form>

    </div> <!-- /container -->
        <!-- Bootstrap core JavaScript -->
	    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	    <script src="<?php echo base_url(); ?>dist/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>