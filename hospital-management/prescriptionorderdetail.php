<?php
include("header.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	 $sql ="DELETE FROM prescription_records WHERE prescription_record_id='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('prescripción eliminada con éxito..');</script>";
	}
}
if(isset($_POST[submit]))
{
	if(isset($_GET[editid]))
	{
			$sql ="UPDATE prescription_records SET prescription_id='$_POST[prescriptionid]',medicine_name='$_POST[medicine]',cost='$_POST[cost]',unit='$_POST[unit]',dosage='$_POST[select2]',status=' $_POST[select]' WHERE prescription_record_id='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('registro de prescripción actualizado con éxito...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
		$sql ="INSERT INTO prescription_records(prescription_id,medicine_name,cost,unit,dosage,status) values('$_POST[prescriptionid]','$_POST[medicine]','$_POST[cost]','$_POST[unit]','$_POST[select2]','$_POST[select]')";
		if($qsql = mysqli_query($con,$sql))
		{	
			$billtype = "Prescription update";
			$prescriptionid= $_POST[prescriptionid];
			echo "<script>alert('registro de prescripción insertado correctamente...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_GET[editid]))
{
	$sql="SELECT * FROM prescription_records WHERE prescription_record_id='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>

<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Agregar nuevo registro de prescripción</li></ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
 <table width="200" border="3">
      <tbody>
        <tr>
          <td><strong>Doctor</strong></td>
          <td><strong>Paciente</strong></td>
          <td><strong>Fecha de preinscripcion</strong></td>
          <td><strong>Estatus</strong></td>
        </tr>
          <?php
		$sql ="SELECT * FROM prescription WHERE prescriptionid='$_GET[prescriptionid]'";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			$sqlpatient = "SELECT * FROM patient WHERE patientid='$rs[patientid]'";
			$qsqlpatient = mysqli_query($con,$sqlpatient);
			$rspatient = mysqli_fetch_array($qsqlpatient);
			
			
		$sqldoctor = "SELECT * FROM doctor WHERE doctorid='$rs[doctorid]'";
			$qsqldoctor = mysqli_query($con,$sqldoctor);
			$rsdoctor = mysqli_fetch_array($qsqldoctor);
			
        echo "<tr>
          <td>&nbsp;$rsdoctor[doctorname]</td>
          <td>&nbsp;$rspatient[patientname]</td>
		   <td>&nbsp;$rs[prescriptiondate]</td>
		<td>&nbsp;$rs[status]</td>
		
        </tr>";
		}
		?>
      </tbody>
    </table>
    
  <h1>Ver registro de prescripción</h1>
    <table width="200" border="3">
      <tbody>
        <tr>
          <td><strong>Medicina</strong></td>
          <td><strong>Costo</strong></td>
          <td><strong>Unidad</strong></td>
          <td><strong>Dosis</strong></td>
                    <?php
			if(!isset($_SESSION[patientid]))
			{
		  ?>  
          <td><strong>Acción</strong></td>
          <?php
			}
			?>
        </tr>
         <?php
		$sql ="SELECT * FROM prescription_records WHERE prescription_id='$_GET[prescriptionid]'";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
        echo "<tr>
          <td>&nbsp;$rs[medicine_name]</td>
          <td>&nbsp;Rs. $rs[cost]</td>
		   <td>&nbsp;$rs[unit]</td>
		    <td>&nbsp;$rs[dosage]</td>";
			if(!isset($_SESSION[patientid]))
			{
			 echo " <td>&nbsp; <a href='prescriptionrecord.php?delid=$rs[prescription_record_id]&prescriptionid=$_GET[prescriptionid]'>Eliminar</a> </td>"; 
			}
		echo "</tr>";
		}
		?>
        <tr>
          <td colspan="6"><div align="center">
            <input type="submit" name="print" id="print" value="Print" onclick="myFunction()"/>
          </div></td>
          </tr>
      </tbody>
    </table>
<script>
function myFunction() {
    window.print();
}
</script>

           <?php
			if(!isset($_SESSION[patientid]))
			{
		  ?>  
<form method="post" action="" name="frmpresrecord" onSubmit="return validateform()"> 
  <input type="hidden" name="prescriptionid" value="<?php echo $_GET[prescriptionid]; ?>"  />
    <table width="200" border="3">
      <tbody>
      
        <tr>
          <td width="34%">Medicina</td>
          <td width="66%"><input type="text" name="medicine" id="medicine" value="<?php echo $rsedit[medicine_name]; ?>" /></td>
        </tr>
        <tr>
          <td>Costo</td>
          <td><input type="text" name="cost" id="cost" value="<?php echo $rsedit[cost]; ?>"/></td>
        </tr>
        <tr>
          <td>Unidad</td>
          <td><input type="number" min="1" name="unit" id="unit" value="<?php echo $rsedit[unit]; ?>" /></td>
        </tr>
        <tr>
          <td>Dosis</td>
          <td><select name="select2" id="select2">
           <option value="">Select</option>
          <?php
		  $arr = array("1-0-1","1-1-1","1-1-0","0-1-1","0-1-0","0-0-1","1-0-0");
		  foreach($arr as $val)
		  {
			 if($val == $rsedit[dosage])
			  {
			  echo "<option value='$val' selected>$val</option>";
			  }
			  else
			  {
				  echo "<option value='$val'>$val</option>";			  
			  }
		  }
		  ?>
          </select></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Submit" />  </td>
        </tr>
      </tbody>
    </table>
    </form>
    <?php
			}
		?>
    <p>&nbsp;</p>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
<?php
include("footer.php");
?>
<script type="application/javascript">
function validateform()
{
	if(document.frmpresrecord.prescriptionid.value == "")
	{
		alert("El ID de la receta no debe estar vacío..");
		document.frmpresrecord.prescriptionid.focus();
		return false;
	}
	else if(document.frmpresrecord.medicine.value == "")
	{
		alert("El campo de la medicina no debe estar vacío..");
		document.frmpresrecord.medicine.focus();
		return false;
	}
	else if(document.frmpresrecord.cost.value == "")
	{
		alert("El costo no debe estar vacío..");
		document.frmpresrecord.cost.focus();
		return false;
	}
	else if(document.frmpresrecord.unit.value == "")
	{
		alert("La unidad no debe estar vacía..");
		document.frmpresrecord.unit.focus();
		return false;
	}
	else if(document.frmpresrecord.select2.value == "")
	{
		alert("La dosis no debe estar vacía..");
		document.frmpresrecord.select2.focus();
		return false;
	}
	else if(document.frmpresrecord.select.value == "" )
	{
		alert("Amablemente seleccione el estado..");
		document.frmpresrecord.select.focus();
		return false;
	}
	else
	{
		return true;
	}
	
}
</script>