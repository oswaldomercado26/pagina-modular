<?php
include("header.php");
include("dbconnection.php");
if(isset($_POST[submit]))
{
	$servicetypeid= $_POST[servicetypeid];
	$billtype = "Service Charge";
	include("insertbillingrecord.php");
}
?>
<div class="wrapper col2">
  <div id="breadcrumb">
    <ul>
      <li class="first">Agregar cargo por servicio</li></ul>
  </div>
</div>
<div class="wrapper col4">
  <div id="container">
    <h1>Agregar nuevos registros de cargos por servicio</h1>
     <form method="post" action="" name="frmbill" onSubmit="return validateform()">

    <table width="342" border="3">
      <tbody>
        <tr>
          <td width="34%">Date </td>
          <td width="66%"><input min="<?php echo date("Y-m-d"); ?>" value="<?php echo date("Y-m-d"); ?>" type="date" name="date" id="date"></td>
        </tr>
        <tr>
         
         
          </select>
          </td>
        </tr>
        <tr>
          <td>Cargos extras</td>
          <td><input type="text" name="amount" id="amount"></td>
        </tr>
         
        <tr>
          <td colspan="2" align="center"><input type="submit" name="submit" id="submit" value="Add Service charge" /></td>
        </tr>
      </tbody>
    </table>
    </form>
<?php
$billappointmentid = $_GET[appointmentid];
include("viewbilling.php");
?>
<table width="342" border="3">
<thead>
  <tr>
          <td colspan="2" align="center"><a href='patientreport.php?patientid=<?php echo $_GET[patientid]; ?>'><strong>Ver informe del paciente>></strong></a></td>
        </tr>
      </thead>
    </table>
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
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmbill.treatment.value == "")
	{
		alert("El tipo de tratamiento no debe estar vacío..");
		document.frmbill.treatment.focus();
		return false;
	}
	else if(!document.frmbill.treatment.value.match(alphaspaceExp))
	{
		alert("Tipo de tratamiento no válido..");
		document.frmbill.treatment.focus();
		return false;
	}
	else if(document.frmbill.date.value == "")
	{
		alert("La fecha de facturación no debe estar vacía..");
		document.frmbill.date.focus();
		return false;
	}
	else if(document.frmbill.time.value == "")
	{
		alert("El tiempo de facturación no debe estar vacío..");
		document.frmbill.time.focus();
		return false;
	}
	else if(document.frmbill.amount.value == "")
	{
		alert("La cantidad no debe estar vacía..");
		document.frmbill.amount.focus();
		return false;
	}
	else if(!document.frmbill.amount.value.match(numericExpression))
	{
		alert("Monto no valido..");
		document.frmbill.amount.focus();
		return false;
	}
	else if(document.frmbill.discount.value == "")
	{
		alert("El descuento no debe estar vacío..");
		document.frmbill.discount.focus();
		return false;
	}
	else if(!document.frmbill.discount.value.match(numericExpression))
	{
		alert("Descuento no válido..");
		document.frmbill.discount.focus();
		return false;
	}
	else if(document.frmbill.tax.value == "")
	{
		alert("El monto del impuesto no debe estar vacío..");
		document.frmbill.tax.focus();
		return false;
	}
	else if(!document.frmbill.tax.value.match(numericExpression))
	{
		alert("Importe de impuestos no válido..");
		document.frmbill.tax.focus();
		return false;
	}
	else if(document.frmbill.bill.value == "")
	{
		alert("El monto de la factura no debe estar vacío..");
		document.frmbill.bill.focus();
		return false;
	}
	else if(!document.frmbill.bill.value.match(numericExpression))
	{
		alert("Monto de la factura no válido..");
		document.frmbill.bill.focus();
		return false;
	}
	else if(document.frmbill.textarea.value == "")
	{
		alert("El motivo del descuento no debe estar vacío..");
		document.frmbill.textarea.focus();
		return false;
	}
	else if(!document.frmbill.textarea.value.match(alphaspaceExp))
	{
		alert("Razón de descuento no válido..");
		document.frmbill.textarea.focus();
		return false;
	}
	else if(document.frmbill.paid.value == "")
	{
		alert("El monto pagado no debe estar vacío..");
		document.frmbill.paid.focus();
		return false;
	}
	else if(!document.frmbill.paid.value.match(numericExpression))
	{
		alert("Monto pagado no válido..");
		document.frmbill.paid.focus();
		return false;
	}
	else if(document.frmbill.Dtime.value == "")
	{
		alert("El tiempo de descarga no debe estar vacío..");
		document.frmbill.Dtime.focus();
		return false;
	}
	else if(document.frmbill.Ddate.value == "")
	{
		alert("La fecha de alta no debe estar vacía..");
		document.frmbill.Ddate.focus();
		return false;
	}
	else
	{
		return true;
	}
	
}
</script>