<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title?></title>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.min.css" />
        <style>
            /* Move down content because we have a fixed navbar that is 50px tall */
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
    </head>
    <body>
    <!-- navbar-inverse -->
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url() ?>">SEVG</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="<?php echo site_url('mision')?>">Quienes somos</a></li>
                        <?php if( $this->session->userdata('Email') !== FALSE ):?>
                            <li><a href="<?php echo site_url('evento')?>">Eventos</a></li>
                        <?php endif;?>

                    </ul>
                    <?php if( $this->session->userdata('Email') === FALSE ): ?>
                        <form class="navbar-form navbar-right" role="form" action="<?php echo site_url('user/login')?>" method="post">
                            <div class="form-group <?php echo isset($error_status) ? $error_status : NULL ?>">
                                <input type="text" placeholder="Correo Electrónico" name="email" class="form-control">
                            </div>
                            <div class="form-group <?php echo isset($error_status) ? $error_status : NULL ?>">
                                <input type="password" placeholder="Contraseña" name="password" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success">Ingresar</button>
                        </form>
                    <?php else:?>
                        <ul class="nav navbar-nav navbar-right">
                            <li id="fat-menu" class="dropdown">
                                <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-cog">
                                        <?php echo $this->session->userdata('Email');?>
                                    </span> <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="<?php echo site_url('user/profile')?>">Perfil</a>
                                    </li>
                                    <li role="presentation" class="divider"></li>
                                    <li role="presentation">
                                        <a role="menuitem" tabindex="-1" href="<?php echo base_url('user/logout')?>"> <span class="glyphicon glyphicon-off"></span> Salir</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    <?php endif;?>
                </div>
            </div>
        </div>