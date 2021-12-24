<?php

include("header.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	if(isset($_SESSION[patientid]))
	{
		$lastinsid =$_SESSION[patientid];
	}
	else
	{
		$dt = date("Y-m-d");
		$tim = date("H:i:s");
		$sql ="INSERT INTO patient(patientname,admissiondate,admissiontime,address,city,mobileno,loginid,password,gender,dob,status) values('$_POST[patiente]','$dt','$tim','$_POST[textarea]','$_POST[city]','$_POST[mobileno]','$_POST[loginid]','$_POST[password]','$_POST[select6]','$_POST[dob]','Active')";
		if($qsql = mysqli_query($con,$sql))
		{
			/* echo "<script>alert('patient record inserted successfully...');</script>"; */
		}
		else
		{
			echo mysqli_error($con);
		}
		$lastinsid = mysqli_insert_id($con);
	}
	
	$sqlappointment="SELECT * FROM appointment WHERE appointmentdate='$_POST[appointmentdate]' AND appointmenttime='$_POST[appointmenttime]' AND doctorid='$_POST[doct]' AND status='Approved'";
	$qsqlappointment = mysqli_query($con,$sqlappointment);
	if(mysqli_num_rows($qsqlappointment) >= 1)
	{
		echo "<script>alert('Cita ya programada para esta hora..');</script>";
	}
	else
	{
		$sql ="INSERT INTO appointment(appointmenttype,patientid,appointmentdate,appointmenttime,app_reason,status,departmentid,doctorid) values('ONLINE','$lastinsid','$_POST[appointmentdate]','$_POST[appointmenttime]','$_POST[app_reason]','Pending','$_POST[department]','$_POST[doct]')";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('Registro de cita insertado correctamente...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_GET[editid]))
{
	$sql="SELECT * FROM appointment WHERE appointmentid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
if(isset($_SESSION[patientid]))
{
    $sqlpatient = "SELECT * FROM patient WHERE patientid='$_SESSION[patientid]' ";
    $qsqlpatient = mysqli_query($con,$sqlpatient);
    $rspatient = mysqli_fetch_array($qsqlpatient);
    $readonly = " readonly";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="wrapper col4">
    <div id="container">

        <?php
        if(isset($_POST[submit]))
        {
           if(mysqli_num_rows($qsqlappointment) >= 1)
           {		
             echo "<h2>Cita ya programada para ". date("d-M-Y", strtotime($_POST[appointmentdate])) . " " . date("H:i A", strtotime($_POST[appointmenttime])) . " .. </h2>";
         }
         else
         {
          if(isset($_SESSION[patientid]))
          {
             echo "<h2 class='text-center'>Cita tomada con éxito.. </h2>";
             echo "<p class='text-center'>El registro de la cita está en trámite pendiente. Por favor, compruebe el estado de la cita.. </p>";
             echo "<p class='text-center'> <a href='viewappointment.php'>Ver registro de citas</a>. </p>";			
         }
         else
         {
             echo "<h2 class='text-center'>Cita tomada con éxito.. </h2>";
             echo "<p class='text-center'>El registro de la cita está en trámite pendiente. Espere el mensaje de confirmación.. </p>";
             echo "<p class='text-center'> <a href='patientlogin.php'>Haga clic aquí para ingresar</a>. </p>";	
         }
     }
 }
 else
 {
   ?>
        <!-- Content -->
        <div id="content">



            <!-- Make an Appointment -->
            <section class="main-oppoiment ">
                <div class="container">
                    <div class="row">

                        <!-- Make an Appointment -->
                        <div class="col-lg-7">
                            <div class="appointment">

                                <!-- Heading -->
                                <div class="heading-block head-left margin-bottom-50">
                                    <h4>Hacer una cita</h4>
                                    
                                </div>
                                <form method="post" action="" name="frmpatapp" onSubmit="return validateform()"
                                    class="appointment-form">
                                    <ul class="row">
                                        <li class="col-sm-6">
                                            <label>


                                                <input placeholder="Nombre del paciente" type="text" class="form-control"
                                                    name="patiente" id="patiente"
                                                    value="<?php echo $rspatient[patientname];  ?>"
                                                    <?php echo $readonly; ?>>
                                                <i class="icon-user"></i>
                                            </label>

                                        </li>

                                        <li class="col-sm-6">
                                            <label><input placeholder="Direccion" type="text" class="form-control"
                                                    name="textarea" id="textarea"
                                                    value="<?php echo $rspatient[address];  ?>"
                                                    <?php echo $readonly; ?>><i class="icon-compass"></i>
                                            </label>

                                        </li>
                                        <li class="col-sm-6">
                                            <label><input placeholder="Ciudad" type="text" class="form-control"
                                                    name="city" id="city" value="<?php echo $rspatient[city];  ?>"
                                                    <?php echo $readonly; ?>><i class="icon-pin"></i>
                                            </label>

                                        </li>
                                        <li class="col-sm-6">
                                            <label>
                                                <input placeholder="Telefono" type="text" class="form-control"
                                                    name="mobileno" id="mobileno"
                                                    value="<?php echo $rspatient[mobileno];  ?>"
                                                    <?php echo $readonly; ?>><i class="icon-phone"></i>
                                            </label>

                                        </li>
                                        <?php
                            if(!isset($_SESSION[patientid]))
                            {        
                                ?>
                                        <li class="col-sm-6">
                                            <label>
                                                <input placeholder="Ingresar ID" type="text" class="form-control"
                                                    name="loginid" id="loginid"
                                                    value="<?php echo $rspatient[loginid];  ?>"
                                                    <?php echo $readonly; ?>><i class="icon-login"></i>
                                            </label>

                                        </li>
                                        <li class="col-sm-6">
                                            <label>

                                                <input placeholder="Contraseña" type="password" class="form-control"
                                                    name="password" id="password"
                                                    value="<?php echo $rspatient[password];  ?>"
                                                    <?php echo $readonly; ?>><i class="icon-lock"></i>
                                            </label>

                                        </li>
                                        <?php
                            }
                            ?>
                                        <li class="col-sm-6">
                                            <label>

                                                <?php 
                                    if(isset($_SESSION[patientid]))
                                    {
                                       echo $rspatient[gender];
                                   }
                                   else
                                   {
                                    ?>
                                                <select name="select6" id="select6" class="selectpicker">
                                                    <option value="" selected="" hidden="">Seleccionar Genero</option>
                                                    <?php
                                        $arr = array("Male","Female");
                                        foreach($arr as $val)
                                        {
                                            echo "<option value='$val'>$val</option>";
                                        }
                                        ?>
                                                </select>
                                                <?php
                                }
                                ?>
                                                <i class="ion-transgender"></i>
                                            </label>

                                        </li>
                                        <li class="col-sm-6">
                                            <label>
                                                <input placeholder="Fecha de Nacimiento" type="text" class="form-control"
                                                    name="dob" id="dob" onfocus="(this.type='date')"
                                                    value="<?php echo $rspatient[dob]; ?>" <?php echo $readonly; ?>><i
                                                    class="ion-calendar"></i>
                                            </label>

                                        </li>
                                        <li class="col-sm-6">
                                            <label>
                                                <input placeholder="Fecha de cita" type="text" class="form-control"
                                                    min="<?php echo date("Y-m-d"); ?>" name="appointmentdate"
                                                    onfocus="(this.type='date')" id="appointmentdate"><i
                                                    class="ion-calendar"></i>
                                            </label>

                                        </li>
                                        <li class="col-sm-6">
                                            <label>
                                                <input placeholder="Hora de cita" type="text"
                                                    onfocus="(this.type='time')" class="form-control"
                                                    name="appointmenttime" id="appointmenttime"><i
                                                    class="ion-ios-clock"></i>
                                            </label>

                                        </li>
                                        <li class="col-sm-6">
                                            <label>

                                                <select name="department" class="selectpicker" id="department"
                                                    >
                                                    <option value="">Selecionar Departamento</option>
                                                    <?php
                                $sqldept = "SELECT * FROM department WHERE status='Active'";
                                $qsqldept = mysqli_query($con,$sqldept);
                                while($rsdept = mysqli_fetch_array($qsqldept))
                                {
                                 echo "<option value='$rsdept[departmentid]'>$rsdept[departmentname]</option>";
                             }
                             ?>
                                                </select>
                                                <i class="ion-university"></i>
                                            </label>

                                        </li>
                                        <li class="col-sm-6">
                                            <label>
                                                <select name="doct" class="selectpicker" id="department"
                                                    >
                                                    <option value="">Selecionar Doctor</option>
                                                    <?php
                                                    $sqldept = "SELECT * FROM doctor WHERE status='Active'";
                                                    $qsqldept = mysqli_query($con,$sqldept);
                                                    while($rsdept = mysqli_fetch_array($qsqldept))
                                                    {
                                                        echo "<option value='$rsdept[doctorid]'>$rsdept[doctorname] (";
                                                        $sqldept = "SELECT * FROM department WHERE departmentid='$rsdept[departmentid]'";
                                                        $qsqldepta = mysqli_query($con,$sqldept);
                                                        $rsdept = mysqli_fetch_array($qsqldepta);
                                                        echo $rsdept[departmentname];

                                                        echo ")</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <i class="ion-medkit"></i>

                                            </label>

                                        </li>
                                        <li class="col-sm-12">
                                            <label>
                                                <textarea class="form-control" name="app_reason"
                                                    placeholder="Razon de la cita"></textarea>
                                            </label>
                                        </li>
                                        <li class="col-sm-12">
                                            <button type="submit" class="btn" name="submit" id="submit">Hacer la cita</button>
                                        </li>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <?php
}
?>

        </div>
    </div>
</div>
</section>
</div>



<?php
include("footer.php");
?>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform() {
    if (document.frmpatapp.patiente.value == "") {
        alert("El nombre del paciente no debe estar vacío..");
        document.frmpatapp.patiente.focus();
        return false;
    } else if (!document.frmpatapp.patiente.value.match(alphaspaceExp)) {
        alert("Nombre de paciente no valido..");
        document.frmpatapp.patiente.focus();
        return false;
    } else if (document.frmpatapp.textarea.value == "") {
        alert("La direccion no debe estar vacia..");
        document.frmpatapp.textarea.focus();
        return false;
    } else if (document.frmpatapp.city.value == "") {
        alert("La ciudad no debe estar vacia..");
        document.frmpatapp.city.focus();
        return false;
    } else if (!document.frmpatapp.city.value.match(alphaspaceExp)) {
        alert("Nombre de la ciudad no valido..");
        document.frmpatapp.city.focus();
        return false;
    } else if (document.frmpatapp.mobileno.value == "") {
        alert("El numero de telefono no debe estar vacio..");
        document.frmpatapp.mobileno.focus();
        return false;
    } else if (!document.frmpatapp.mobileno.value.match(numericExpression)) {
        alert("Numero de telefono no valido..");
        document.frmpatapp.mobileno.focus();
        return false;
    } else if (document.frmpatapp.loginid.value == "") {
        alert("ID de inicio de sesión no debe estar vacío..");
        document.frmpatapp.loginid.focus();
        return false;
    } else if (!document.frmpatapp.loginid.value.match(alphanumericExp)) {
        alert("ID de inicio de sesión no válido..");
        document.frmpatapp.loginid.focus();
        return false;
    } else if (document.frmpatapp.password.value == "") {
        alert("La contraseña no debe estar vacía..");
        document.frmpatapp.password.focus();
        return false;
    } else if (document.frmpatapp.password.value.length < 8) {
        alert("La longitud de la contraseña debe tener más de 8 caracteres...");
        document.frmpatapp.password.focus();
        return false;
    } else if (document.frmpatapp.select6.value == "") {
        alert("El género no debe estar vacío..");
        document.frmpatapp.select6.focus();
        return false;
    } else if (document.frmpatapp.dob.value == "") {
        alert("La fecha de nacimiento no debe estar vacía..");
        document.frmpatapp.dob.focus();
        return false;
    } else if (document.frmpatapp.appointmentdate.value == "") {
        alert("La fecha de la cita no debe estar vacía..");
        document.frmpatapp.appointmentdate.focus();
        return false;
    } else if (document.frmpatapp.appointmenttime.value == "") {
        alert("La hora de la cita no debe estar vacía..");
        document.frmpatapp.appointmenttime.focus();
        return false;
    } else {
        return true;
    }
}

function loaddoctor(deptid) {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("divdoc").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "departmentDoctor.php?deptid=" + deptid, true);
    xmlhttp.send();
}
</script>