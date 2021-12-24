<?php

include("adheader.php");
include("dbconnection.php");
session_start();
if(isset($_POST[submit]))
{
	$sql = "UPDATE admin SET password='$_POST[newpassword]' WHERE password='$_POST[oldpassword]' AND adminid='$_SESSION[adminid]'";
	$qsql= mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<div class='alert alert-success'>
		Contraseña actualizada exitosamente
	</div>";
	}
	else
	{
		echo "<div class='alert alert-warning'>
		Error en la actualización del registro de administrador
	</div>";		
	}
}
?>
<div class="container-fluid">
    <div class="block-header">
        <h2 class="text-center"> Contraseña del administrador</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
<form method="post" action="" name="frmadminprofile" onSubmit="return validateform()">


		<div class="body">
			<div class="row clearfix">
				<div class="col-sm-12">   
					<div class="form-group">
						<div class="form-line">
							<input class="form-control" type="password" name="oldpassword" id="oldpassword" placeholder="Old Password" />
						</div>
					</div>
				
				</div>	
				
			</div>
			<div class="row clearfix"> 
				<div class="col-sm-12">                           
				 <div class="form-group">
						<div class="form-line">
							<input class="form-control" type="password" name="newpassword" id="newpassword" placeholder="New Password" />
						</div>
					</div>    
				</div>                      
			</div>  
			<div class="row clearfix"> 
			<div class="col-sm-12">                              
				 <div class="form-group">
						<div class="form-line">
							<input class="form-control" type="password" name="password" id="password" placeholder="Confirm Password" />
						</div>
					</div>
					</div>                          
			</div>                     
			<div class="col-sm-12">
				<input type="submit" class="btn btn-raised g-bg-cyan" name="submit" id="submit" value="Submit" />
				
			</div>
		</div>
	</div>

</form>


 <div class="clear"></div>
  </div>
</div>
<?php
include("adfooter.php");
?>
<script type="application/javascript">
function validateform1()
{
	if(document.frmadminchange.oldpassword.value == "")
	{
		alert("La contraseña anterior no debe estar vacía..");
		document.frmadminchange.oldpassword.focus();
		return false;
	}
	else if(document.frmadminchange.newpassword.value == "")
	{
		alert("La nueva contraseña no debe estar vacía..");
		document.frmadminchange.newpassword.focus();
		return false;
	}
	else if(document.frmadminchange.newpassword.value.length < 8)
	{
		alert("La longitud de la nueva contraseña debe tener más de 8 caracteres...");
		document.frmadminchange.newpassword.focus();
		return false;
	}
	else if(document.frmadminchange.newpassword.value != document.frmadminchange.password.value )
	{
		alert(" La nueva contraseña y la contraseña de confirmación deben ser iguales..");
		document.frmadminchange.password.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
