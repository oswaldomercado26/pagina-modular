<?php

include("adheader.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	$sql = "UPDATE doctor SET password='$_POST[newpassword]' WHERE password='$_POST[oldpassword]' AND doctorid='$_SESSION[doctorid]'";
	$qsql= mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('La contraseña se ha actualizado correctamente..');</script>";
	}
	else
	{
		echo "<script>alert('No se pudo actualizar la contraseña..');</script>";		
	}
}
?>

<div class="container-fluid">
    <div class="block-header">
        <h2 class="text-center"> Contraseña del médico</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <form method="post" action="" name="frmdoctchangepass" onSubmit="return validateform()"
                    style="padding: 10px">
                    <div class="form-group">
                        <label>Contraseña antigua</label>
                        <div class="form-line">
                            <input class="form-control" type="password" name="oldpassword" id="oldpassword" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Contraseña nueva</label>
                        <div class="form-line">
                            <input class="form-control" type="password" name="newpassword" id="newpassword" />

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Confirmar contraseña</label>
                        <div class="form-line">
                            <input class="form-control" type="password" name="password" id="password" />
                        </div>
                    </div>

                    <input class="btn btn-raised g-bg-cyan" type="submit" name="submit" id="submit" value="Submit" />


                </form>
                <p>&nbsp;</p>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
</div>
<?php
include("adfooter.php");
?>
<script type="application/javascript">
function validateform1() {
    if (document.frmdoctchangepass.oldpassword.value == "") {
        alert("La contraseña anterior no debe estar vacía..");
        document.frmdoctchangepass.oldpassword.focus();
        return false;
    } else if (document.frmdoctchangepass.newpassword.value == "") {
        alert("La nueva contraseña no debe estar vacía..");
        document.frmdoctchangepass.newpassword.focus();
        return false;
    } else if (document.frmdoctchangepass.newpassword.value.length < 8) {
        alert("La longitud de la nueva contraseña debe tener más de 8 caracteres...");
        document.frmdoctchangepass.newpassword.focus();
        return false;
    } else if (document.frmdoctchangepass.newpassword.value != document.frmdoctchangepass.password.value) {
        alert(" La nueva contraseña y la contraseña de confirmación deben ser iguales..");
        document.frmdoctchangepass.password.focus();
        return false;
    } else {
        return true;
    }
}
</script>