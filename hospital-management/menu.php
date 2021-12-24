<?php
session_start();
?>
<style>
#mmenu, #mmenu ul {
margin: 0;
padding: 0;
list-style: none;
}
#mmenu {
width: 100%;
/*margin: 60px auto;*/
border: 1px solid #222;
background-color: #111;
background-image: -moz-linear-gradient(#444, #111); 
background-image: -webkit-gradient(linear, left top, left bottom, from(#444), to(#111)); 
background-image: -webkit-linear-gradient(#444, #111); 
background-image: -o-linear-gradient(#444, #111);
background-image: -ms-linear-gradient(#444, #111);
background-image: linear-gradient(#444, #111);
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
border-radius: 6px;
-moz-box-shadow: 0 1px 1px #777, 0 1px 0 #666 inset;
-webkit-box-shadow: 0 1px 1px #777, 0 1px 0 #666 inset;
box-shadow: 0 1px 1px #777, 0 1px 0 #666 inset;
}
#mmenu:before,
#mmenu:after {
content: "";
display: table;
}
#mmenu:after {
clear: both;
}
#mmenu {
zoom:1;
}
#mmenu li {
float: left;
border-right: 1px solid #222;
-moz-box-shadow: 1px 0 0 #444;
-webkit-box-shadow: 1px 0 0 #444;
box-shadow: 1px 0 0 #444;
position: relative;
}
#mmenu a {
float: left;
padding: 12px 30px;
color: #999;
text-transform: uppercase;
font: bold 12px Arial, Helvetica;
text-decoration: none;
text-shadow: 0 1px 0 #000;
}
#mmenu li:hover > a {
color: #fafafa;
}
*html #mmenu li a:hover { /* IE6 only */
color: #fafafa;
}
#mmenu ul {
margin: 20px 0 0 0;
_margin: 0; /*IE6 only*/
opacity: 0;
visibility: hidden;
position: absolute;
top: 38px;
left: 0;
z-index: 9999; 
background: #444; 
background: -moz-linear-gradient(#444, #111);
background-image: -webkit-gradient(linear, left top, left bottom, from(#444), to(#111));
background: -webkit-linear-gradient(#444, #111); 
background: -o-linear-gradient(#444, #111); 
background: -ms-linear-gradient(#444, #111); 
background: linear-gradient(#444, #111);
-moz-box-shadow: 0 -1px rgba(255,255,255,.3);
-webkit-box-shadow: 0 -1px 0 rgba(255,255,255,.3);
box-shadow: 0 -1px 0 rgba(255,255,255,.3); 
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
border-radius: 3px;
-webkit-transition: all .2s ease-in-out;
-moz-transition: all .2s ease-in-out;
-ms-transition: all .2s ease-in-out;
-o-transition: all .2s ease-in-out;
transition: all .2s ease-in-out; 
} 
#mmenu li:hover > ul {
opacity: 1;
visibility: visible;
margin: 0;
}
#mmenu ul ul {
top: 0;
left: 150px;
margin: 0 0 0 20px;
_margin: 0; /*IE6 only*/
-moz-box-shadow: -1px 0 0 rgba(255,255,255,.3);
-webkit-box-shadow: -1px 0 0 rgba(255,255,255,.3);
box-shadow: -1px 0 0 rgba(255,255,255,.3); 
}
#mmenu ul li {
float: none;
display: block;
border: 0;
_line-height: 0; /*IE6 only*/
-moz-box-shadow: 0 1px 0 #111, 0 2px 0 #666;
-webkit-box-shadow: 0 1px 0 #111, 0 2px 0 #666;
box-shadow: 0 1px 0 #111, 0 2px 0 #666;
}
#mmenu ul li:last-child { 
-moz-box-shadow: none;
-webkit-box-shadow: none;
box-shadow: none; 
}
#mmenu ul a { 
padding: 10px;
width: 130px;
_height: 10px; /*IE6 only*/
display: block;
white-space: nowrap;
float: none;
text-transform: none;
}
#mmenu ul a:hover {
background-color: #0186ba;
background-image: -moz-linear-gradient(#04acec, #0186ba); 
background-image: -webkit-gradient(linear, left top, left bottom, from(#04acec), to(#0186ba));
background-image: -webkit-linear-gradient(#04acec, #0186ba);
background-image: -o-linear-gradient(#04acec, #0186ba);
background-image: -ms-linear-gradient(#04acec, #0186ba);
background-image: linear-gradient(#04acec, #0186ba);
}
#mmenu ul li:first-child > a {
-moz-border-radius: 3px 3px 0 0;
-webkit-border-radius: 3px 3px 0 0;
border-radius: 3px 3px 0 0;
}
#mmenu ul li:first-child > a:after {
content: '';
position: absolute;
left: 40px;
top: -6px;
border-left: 6px solid transparent;
border-right: 6px solid transparent;
border-bottom: 6px solid #444;
}
#mmenu ul ul li:first-child a:after {
left: -6px;
top: 50%;
margin-top: -6px;
border-left: 0; 
border-bottom: 6px solid transparent;
border-top: 6px solid transparent;
border-right: 6px solid #3b3b3b;
}
#mmenu ul li:first-child a:hover:after {
border-bottom-color: #04acec; 
}
#mmenu ul ul li:first-child a:hover:after {
border-right-color: #0299d3; 
border-bottom-color: transparent; 
}
#mmenu ul li:last-child > a {
-moz-border-radius: 0 0 3px 3px;
-webkit-border-radius: 0 0 3px 3px;
border-radius: 0 0 3px 3px;
}
</style>
<?php
if(isset($_SESSION[adminid]))
{
?>
<div id="mmenu">
<li><a href="adminaccount.php">Cuenta</a></li>
<li>
<a href=" ######### ">Perfil</a>
    <ul>
    <li><a href="adminprofile.php">Perfil Admin</a></li>
    <li><a href="adminchangepassword.php">Cambiar COntraseña</a></li>
        <li><a href="admin.php" style="width:150px;">Añadir Admin</a></li>    	
    </ul>
</li>
<li><a href=" ######### ">Paciente</a>
    <ul>
   <li><a href="patient.php">Añadir Paciente</a></li>
        <li><a href="viewpatient.php">Ver Registro Pacientes</a></li>
    </ul>
</li>
<li>
<a href=" ######### ">Citas</a>
    <ul>
    <li><a href="appointment.php" style="width:200px;">New Appointment</a></li>
    <li><a href="viewappointmentpending.php" style="width:200px;">Ver Citas Pendientes</a></li>
    <li><a href="viewappointmentapproved.php" style="width:200px;">Ver Citas aprovadas</a></li>
    </ul>
</li>
<li><a href="viewtreatmentrecord.php">Tratamientos</a></li>
<li>
<a href=" ######### ">Doctor</a>
    <ul>
    <li><a href="doctor.php">Añadir Doctor</a></li>
    <li><a href="Viewdoctor.php">Ver Doctor</a></li>
     <li><a href="doctortimings.php">Añadir Horario del Doctor</a></li>
    <li><a href="viewdoctortimings.php">Ver Horario delDoctor</a></li>
 </ul>
</li>
    
<li>
<a href=" ######### ">Ajustes</a>
    <ul>
  		
      
       	<li><a href="department.php" style="width:150px;">Añadir Departamento</a></li>
    	<li><a href="Viewdepartment.php" style="width:150px;">Ver Departamento/a></li>
        <li><a href="treatment.php" style="width:150px;">Añadir tipo de Tratamiento</a></li>
        <li><a href="viewtreatment.php" style="width:150px;">Ver tipos de Tratamiento</a></li>
       	<li><a href="medicine.php" style="width:150px;">Añadir Medicina</a></li>
    	<li><a href="Viewmedicine.php" style="width:150px;">Ver Medicina</a></li>
      </ul>
</li>
<li><a href="logout.php">Salir</a></li>
</div>
<?php
}
?>
<?php
if(isset($_SESSION[doctorid]))
{
?>
<div id="mmenu">
    <li><a href="doctoraccount.php">Cuenta</a></li>
    <li>
    <a href=" ######### ">Ajustes</a>
        <ul>
       <li><a href="doctorprofile.php">Perfil</a></li>
            <li><a href="doctorchangepassword.php">ambiar Contraseña</a></li>
          </ul>
    </li>
    <li>
    <a href=" ######### ">Citas</a>
        <ul>
    <li><a href="viewappointmentpending.php" style="width:250px;">Ver Citas Pendientes</a></li>
    <li><a href="viewappointmentapproved.php" style="width:250px;">Ver Citas Aprovadas</a></li>
        </ul>
    </li>
    <li><a href=" ######### ">Paciente</a>
        <ul>
       <li><a href="viewpatient.php">Ver Pacientet</a></li>
        </ul>
    </li>
       <li><a href=" ######### ">Horario Doctor</a>
        <ul>
       <li><a href="doctortimings.php">Añadir Horario</a></li>
       <li><a href="viewdoctortimings.php">Ver Horarios</a></li>
        </ul>
    </li>
    <li>
    <a href=" ######### ">Tratamientos</a>
        <ul>
           <li><a href="viewtreatmentrecord.php">Ver registros de tratamiento</a></li>
            <li><a href="viewtreatment.php">Ver tratamientos</a></li>
        </ul>
    </li>    
    
    <li>
 
    <li><a href="viewdoctorconsultancycharge.php">Informe de ingresos</a></li>
        
		</ul>
  
    <li><a href="logout.php">Salir</a></li>       
 </div>
<?php
}
?>
<?php
if(isset($_SESSION[patientid]))
{
?>
<div id="mmenu">
<li><a href="patientaccount.php">Cuenta</a></li>
<li>
<a href=" ######### ">Citas</a>
    <ul>
    <li><a href="patientappointment.php" style="width:200px;">Añadir cita</a></li>
    <li><a href="viewappointment.php" style="width:200px;">Ver Citas</a></li>
    </ul>
</li>
<li>
<a href=" ######### ">Profile</a>
    <ul>
    <li><a href="patientprofile.php">Ver Perfil</a></li>
    <li><a href="patientchangepassword.php">Cambiar Contraseña</a></li>
    </ul>
</li>

<li>
<a href=" ######### ">Recetas</a>
    <ul >
       <li><a style="width:200px;" href="patviewprescription.php">Ver registros de recetas</a></li>
    </ul>
</li>
<li>
<a href=" ######### ">Tratamientos</a>
    <ul>
       <li><a href="viewtreatmentrecord.php">Ver registros de tratamiento</a></li>
    </ul>
</li>



<li><a href="logout.php">Salir</a></li>
</div>
<?php
}
?>