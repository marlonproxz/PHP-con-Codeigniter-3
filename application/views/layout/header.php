<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="">
	<title><?php echo $titulo_sitio; ?></title>
	<link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>dist/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>dist/bootstrap/css/dashboard.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>

    <style>
    	.m-header{
    		margin-bottom: 20px;
    	}
    </style>
</head>
<body>
	<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">Cursos Ismweb</a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <!--<a class="nav-link" href="#">link 1</a>-->
            <?php echo anchor('libros', 'Listar libros', array('title' => 'Listar libros', 'class' => 'nav-link' )) ?>
          </li>
          <li class="nav-item">
            <!--<a class="nav-link" href="#">link 1</a>-->
            <?php echo anchor('usuarios', 'Listar usuarios', array('title' => 'Listar usuarios', 'class' => 'nav-link' )) ?>
          </li>
          <li class="nav-item">
            <!--<a class="nav-link" href="#">link 1</a>-->
            <?php echo anchor('login/salir', 'Salir', array('title' => 'Salir', 'class' => 'nav-link' )) ?>
          </li>
          
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Buscar">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
        </form>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-3 col-md-2 hidden-xs-down bg-faded sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <!--<a class="nav-link" href="<?php echo base_url('index.php/site/libros');?>">Link 1</a>-->
              <?php echo anchor('libros', 'Listar libros', array('title' => 'Listar libros', 'class' => 'nav-link' )) ?>
            </li>
            <li class="nav-item">
              <?php echo anchor('usuarios', 'Listar usuarios', array('title' => 'Listar usuarios', 'class' => 'nav-link' )) ?>
            </li>
            <li class="nav-item">
              <?php echo anchor('login/salir', 'Salir', array('title' => 'Salir', 'class' => 'nav-link' )) ?>
            </li>
          </ul>
        </nav>

			