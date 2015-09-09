<!doctype>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="calvin">
        <title><?php if (isset($this->tittle)) echo $this->tittle ?></title>
        <link type="text/css" rel="stylesheet" href="<?php echo BASE_URL ?>public/css/bootstrap.min.css" >
		<link rel="stylesheet" href="<?php echo BASE_URL.'public/css/main.css' ?>"/>
        <style>
            /* Move down content because we have a fixed navbar that is 50px tall */
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }

            .new_width{
                text-align: center;
                width: 50%;
            }

            .padding{
                padding: 32px;
            }

            .margen{
                margin-top: 24px;
            }
            .ancho{
                width: 74.7%;
            }
            .anchopequeño{
                width: 20%;
            }

        </style>
    </head>
    <body style="">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse">

                    <ul class="nav navbar-nav">                       

                        <li><a href="<?php echo BASE_URL ?>evento"><strong>Eventos</strong></a></li>
                        <li><a href="<?php echo BASE_URL ?>usuario"><strong>Usuarios</strong></a></li>
                        <li><a href="<?php echo BASE_URL ?>persona"><strong>Personas</strong></a></li>  
                        <li><a href="<?php echo BASE_URL ?>medicamento"><strong>Medica/Utensi</strong></a></li>
                        <li><a href="<?php echo BASE_URL ?>herramienta"><strong>Herramientas</strong></a></li>
                        <li><a href="<?php echo BASE_URL ?>mantenimiento"><strong>Mantenimientos</strong></a></li>                       
                        <li><a href="<?php echo BASE_URL ?>informe"><strong>Informes</strong></a></li>
                        <li><a href="<?php echo BASE_URL ?>configuracion"><strong>Configuraciones</strong></a></li>

                        <li class="dropdown">
                            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                                <span><?php echo $_SESSION['Email'] ?></span> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo BASE_URL.'usuario/profile'?>">Perfil</a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown-header"></li>
                                <li><a href="<?php echo BASE_URL.'usuario/logout'?>"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.navbar-collapse -->
            </div>
        </div>
