<?php
session_start();
error_reporting(0);
include("dbconnection.php");
$dt = date("Y-m-d");
$tim = date("H:i:s");
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>HMS - Admin</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="assets/plugins/morrisjs/morris.css" rel="stylesheet" />
    
    <!-- Custom Css -->
    <link href="assets/css/main.css" rel="stylesheet">
    <!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="assets/css/themes/all-themes.css" rel="stylesheet" />
    <!-- Bootstrap Material Datetime Picker Css -->

</head>

<body class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-cyan">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Morphing Search  -->

    <!-- Top Bar -->
    <nav class="navbar clearHeader">
        <div class="col-12">
            <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand"
                    href="#">AgileMed</a> </div>
            <ul class="nav navbar-nav navbar-right">
                <!-- Notifications -->
                <li>
                    <a data-placement="bottom" title="Full Screen" href="logout.php"><i
                            class="zmdi zmdi-sign-in"></i></a>
                </li>               

            </ul>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <?php
                if(isset($_SESSION[adminid]))
                {
            ?>
            <!--Admin Menu -->
            <div class="menu">
                <ul class="list" style="overflow: hidden; width: auto; height: calc(-184px + 100vh);">
                    <li class="header">MENU NAVEGACION</li>
                    <li class="active open"><a href="adminaccount.php"><i
                                class="zmdi zmdi-home"></i><span>Tablero</span></a></li>


                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-calendar-check"></i><span>Perfil</span> </a>
                        <ul class="ml-menu">
                            <li><a href="adminprofile.php">Admin Perfil</a></li>
                            <li><a href="adminchangepassword.php">Cambiar Password</a></li>
                            <li><a href="admin.php">Añadir Admin</a></li>
                            <li><a href="viewadmin.php">Ver Admin</a></li>
                        </ul>
                    </li>

                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-calendar-check"></i><span>Citas</span> </a>
                        <ul class="ml-menu">
                            <li><a href="appointment.php">Nueva Cita</a></li>
                            <li><a href="viewappointmentpending.php">Ver citas Pendientes</a>
                            </li>
                            <li><a href="viewappointmentapproved.php">Ver Citas Aprovadas</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-account-add"></i><span>Doctores</span> </a>
                        <ul class="ml-menu">
                            <li><a href="doctor.php">Añadir Doctor</a>
                            </li>
                            <li><a href="viewdoctor.php">Ver Doctor</a></li>
                            
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-account-o"></i><span>Pacientes</span> </a>
                        <ul class="ml-menu">
                            <li><a href="patient.php">Añadir Pacientes</a></li>
                            <li><a href="viewpatient.php">Ver Registro Pacientes</a></li>
                        </ul>
                    </li>


                    <li> <a href="javascript:void(0);" class="menu-toggle toggled waves-effect waves-block"><i
                                class="zmdi zmdi-copy"></i><span>Servicio</span> </a>
                        <ul class="ml-menu" style="display: block;">
                            <li><a href="department.php" class=" waves-effect waves-block">Añadir Departamento</a></li>
                            <li><a href="viewdepartment.php" class=" waves-effect waves-block">Ver Departamento</a></li>
                            <li><a href="treatment.php" class=" waves-effect waves-block">Añadir tipo de Tratamiento</a></li>
                            <li><a href="viewtreatment.php" class=" waves-effect waves-block">Ver tipo de Tratamientos</a></li>
                            <li><a href="medicine.php" class=" waves-effect waves-block">Añadir Medicina</a></li>
                            <li><a href="viewmedicine.php" class=" waves-effect waves-block">Ver Medicina</a></li>
                        </ul>
                    </li>

                    
                </li>

                </ul>
            </div>
            <!-- Admin Menu -->
            <?php }?>


            <!-- doctor Menu -->
            <?php
            if(isset($_SESSION[doctorid]))
            {
            ?>
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU NAVEGACION</li>
                    <li class="active open"><a href="doctoraccount.php"><i
                                class="zmdi zmdi-home"></i><span>Tablero</span></a></li>


                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-calendar-check"></i><span>Perfil</span> </a>
                        <ul class="ml-menu">
                            <li><a href="doctorprofile.php">Perfil</a></li>
                            <li><a href="doctorchangepassword.php">Cambiar Password</a></li>
                        </ul>
                    </li>

                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-calendar-check"></i><span>Citas</span> </a>
                        <ul class="ml-menu">
                            <li><a href="viewappointmentpending.php" style="width:250px;">Ver Citas Pendientes</a>
                            </li>
                            <li><a href="viewappointmentapproved.php" style="width:250px;">Ver Citas Aprovadas</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-account-add"></i><span>Doctores</span> </a>
                        <ul class="ml-menu">
                            
                            <li><a href="doctortimings.php">Agregar hora de visita</a></li>
                            <li><a href="viewdoctortimings.php">Ver hora de visita</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-account-o"></i><span>Pacientes</span> </a>
                        <ul class="ml-menu">
                            <li><a href="viewpatient.php">Ver Pacientes</a>
                            </li>
                        </ul>
                    </li>

                    <li> <a href="viewdoctorconsultancycharge.php"><i class="zmdi zmdi-copy"></i><span>Ingreso Reporte</span> </a></li>


                    <li> <a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-copy"></i><span>Servicio</span> </a>
                        <ul class="ml-menu">
                            <li><a href="viewtreatmentrecord.php">Ver Registro de Tratamiento</a></li>
                            <li><a href="viewtreatment.php">Ver Tratamiento</a></li>
                        </ul>
                    </li>

                </ul>
            </div>

            <?php }; ?>
            <!-- doctor Menu -->




            <!-- patient Menu -->
            <?php
            if(isset($_SESSION[patientid]))
            {
            ?>
            <div class="menu">
                <ul class="list">
                    <li class="header">MENU NAVEGACION</li>
                    <li class="active open"><a href="patientaccount.php"><i
                                class="zmdi zmdi-home"></i><span>Tablero</span></a></li>


                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-calendar-check"></i><span>Perfil</span> </a>
                        <ul class="ml-menu">
                            <li><a href="patientprofile.php">Ver Perfil</a></li>
                            <li><a href="patientchangepassword.php">Cambiar Password</a></li>
                        </ul>
                    </li>

                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-calendar-check"></i><span>Citas</span> </a>
                        <ul class="ml-menu">
                            <li><a href="patientappointment.php" >Añadir Citas</a></li>
                            <li><a href="viewappointment.php" >Ver Citas</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-account-add"></i><span>Receta</span> </a>
                        <ul class="ml-menu">
                            <li><a  href="patviewprescription.php">Ver Registro de Recetas</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="menu-toggle"><i
                                class="zmdi zmdi-account-o"></i><span>Tratamiento</span> </a>
                        <ul class="ml-menu">
                            <li><a href="viewtreatmentrecord.php">Ver Registro de Tratamiento</a></li>
                    </li>
                </ul>
                </li>


                </ul>
            </div>

            <?php }; ?>
            <!-- patient Menu -->
        </aside>
        <!-- #END# Left Sidebar -->
     
    </section>
     <section class="content home">
