<?php
include("adformheader.php");
include("dbconnection.php");
if(isset($_GET[delid]))
{
	$sql ="DELETE FROM medicine WHERE medicineid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Registro de medicamentos eliminado con éxitoy..');</script>";
	}
}
?>
<div class="container-fluid">
  <div class="block-header">
    <h2 class="text-center">Ver lista de medicamentos</h2>

  </div>
</div>
<div class="card">

  <section class="container">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">

          <thead>
            <tr>
              <th>Nombre</th>
              <th>Costo</th>
              <th>descripcion</th>
              <th>Estatus</th>
              <th>Accion</th>
            </tr>
          </thead> 
          <tbody>

            <?php
            $sql ="SELECT * FROM medicine";
            $qsql = mysqli_query($con,$sql);
            while($rs = mysqli_fetch_array($qsql))
            {
              echo "<tr>
              <td>&nbsp;$rs[medicinename]</td>
              <td>&nbsp;$$rs[medicinecost]</td>
              <td>&nbsp;$rs[description]</td>
              <td>&nbsp;$rs[status]</td>
              <td>&nbsp;
              <a href='medicine.php?editid=$rs[medicineid]' class='btn btn-raised bg-green'>Editar</a> 
              <a href='viewmedicine.php?delid=$rs[medicineid]' class='btn btn-raised bg-blush'>Eliminar</a></td>
              </tr>";
            }
            ?>
          </tbody>
        </table>
      </section>
     
    </div>
  </div>
</div>

</div>
</div>
<?php
include("adformfooter.php");
?>