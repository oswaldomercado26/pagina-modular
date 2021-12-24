<?php
include("adheader.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	if(isset($_GET[editid]))
	{
		$sql ="UPDATE admin SET adminname='$_POST[adminname]',loginid='$_POST[loginid]',password='$_POST[password]',status='$_POST[select]' WHERE adminid='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<div class='alert alert-success'>
			Registro de administrador actualizado correctamente
			</div>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
		$sql ="INSERT INTO admin(adminname,loginid,password,status) values('$_POST[adminname]','$_POST[loginid]','$_POST[password]','$_POST[select]')";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<div class='alert alert-success'>
			Registro de administrador insertado correctamente
			</div>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_GET[editid]))
{
	$sql="SELECT * FROM admin WHERE adminid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>

<div class="container-fluid">
	<div class="block-header">
		<h2 class="text-center"> Agregar nuevo administrador </h2>
	</div>
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">

				<form method="post" action="" name="frmadminprofile" onSubmit="return validateform()">


					<div class="body">
						<div class="row clearfix">
							<div class="col-sm-12">   
								<div class="form-group">
									<label> Nombre administrador</label>
									<div class="form-line">
										<input type="text" class="form-control"  name="adminname" id="adminname" value="<?php echo $rsedit[adminname]; ?>"/>
									</div>
								</div>

							</div>	

						</div>
						<div class="row clearfix"> 
							<div class="col-sm-12">                           
								<div class="form-group">
									<label>ID de inicio de sesión de administrador</label>
									<div class="form-line">
										<input type="text" class="form-control" name="loginid" id="loginid" value="<?php echo $rsedit[loginid]; ?>" />
									</div>
								</div>    
							</div>                      
						</div>  
						<div class="row clearfix"> 
							<div class="col-sm-12">                              
								<div class="form-group">
									<label> Admin Password</label>
									<div class="form-line">
										<input type="password" class="form-control"  name="password" id="password" value="<?php echo $rsedit[password]; ?>"/>
									</div>
								</div>
							</div>                          
						</div> 
						<div class="row clearfix"> 
							<div class="col-sm-12">                              
								<div class="form-group">
									<label>Confirmar Admin Password</label>
									<div class="form-line">
										<input type="password" class="form-control"  name="cnfirmpassword" id="cnfirmpassword" value="<?php echo $rsedit[confirmpassword]; ?>"/>
									</div>
								</div>
							</div>                          
						</div> 
						<div class="row clearfix">                            
							<div class="col-sm-3 col-xs-12">
								<div class="form-group drop-custum">
									<label>Estatus</label>

									<select class="form-control show-tick" name="select">
										<option value="" selected>Seleccione uno</option>
										<?php
										$arr = array("Active","Inactive");
										foreach($arr as $val)
										{
											if($val == $rsedit[status])
											{
												echo "<option value='$val' selected>$val</option>";
											}
											else
											{
												echo "<option value='$val'>$val</option>";			  
											}
										}
										?>
									</select>
								</div>
							</div>                            
						</div>                    

						<div class="col-sm-12">
							<input type="submit" class="btn btn-raised g-bg-cyan" name="submit" id="submit" value="Submit" />

						</div>
					</div>


				</form>
			</div>
		</div>
	</div>
</div>

				<?php
				include("adfooter.php");
				?>
				<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmadmin.adminname.value == "")
	{
		alert("El nombre del administrador no debe estar vacío..");
		document.frmadmin.adminname.focus();
		return false;
	}
	else if(!document.frmadmin.adminname.value.match(alphaspaceExp))
	{
		alert("Nombre de administrador no válido..");
		document.frmadmin.adminname.focus();
		return false;
	}
	else if(document.frmadmin.loginid.value == "")
	{
		alert("El ID de inicio de sesión no debe estar vacío..");
		document.frmadmin.loginid.focus();
		return false;
	}
	else if(!document.frmadmin.loginid.value.match(alphanumericExp))
	{
		alert("ID de inicio de sesión no válido..");
		document.frmadmin.loginid.focus();
		return false;
	}
	else if(document.frmadmin.password.value == "")
	{
		alert("Password no tiene que estar vacio..");
		document.frmadmin.password.focus();
		return false;
	}
	else if(document.frmadmin.password.value.length < 8)
	{
		alert("Contraseña la longitud debe ser superior a 8 caracteres...");
		document.frmadmin.password.focus();
		return false;
	}
	else if(document.frmadmin.password.value != document.frmadmin.cnfirmpassword.value )
	{
		alert("Contraseña y confirmar la contraseña debe ser igual..");
		document.frmadmin.password.focus();
		return false;
	}
	else if(document.frmadmin.select.value == "" )
	{
		alert("Amablemente seleccione el estado..");
		document.frmadmin.select.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>