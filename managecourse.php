<?php
include("header.php");
if(isset($_POST['add']))
{
	$course = mysqli_real_escape_string($con,$_POST['coursename']);
	$q = mysqli_query($con, "select * from tblcourse where LOWER(coursename)=LOWER('".$_POST['coursename']."')");
	if(mysqli_num_rows($q) >0 )
	{
		echo "<script>alert('Course alredy exist!!!');</script>";
	}
	else{
	$qry = "insert into tblcourse(coursename) values ('".$course."')";
	if(mysqli_query($con, $qry))
	{ 
		echo "<script>alert('success!!!');</script>";
	}
	}
}
if(isset($_GET['id']))
{
	$rs = mysqli_query($con, "delete from tblcourse where courseid=".$_GET['id']);
	if($rs)
	{
		echo "<script>alert('Record Deleted!!!');window.location='managecourse.php';</script>";
	}
}
?>
<br>
<!-- Tab News Start-->
<div class="tab-news">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-pills nav-justified">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="pill" href="#featured">Add Department</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-12">
					<label class="control-label"><B>Department Name</B> <span id="lblError" style="color: red"></span></label>
					<input type="text" class="form-control" id="coursename" name="coursename" placeholder="Course" required>
				</div>
			</div>
			<div class="tn-news row">
				<div class="tn-title">
					<input type="submit" class="btn btn-info btn-lg" name="add" value="ADD">
				</div>
			</div>
		</div>
	</div>
</FORM>				
			</div>

		</div>
	</div>
</div>
<!-- Tab News Start-->
<br>
<!-- Tab News Start-->
<div class="tab-news">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="nav nav-pills nav-justified">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="pill" href="#featured">View Department</a>
					</li>
				</ul>
<form action="" method="post" class="form-horizontal">
	<div class="tab-content">
		<div id="featured" class="container tab-pane active">
			<div class="tn-news row">
				<div class="col-md-12">
<table class="table table-bordered" id="dataTables-example">
  <tr>
    <th>#</th>
    <th>Department Name</th>
    <th>Action</th>
  </tr>
  <?php
  $res = mysqli_query($con, "Select * from tblcourse");
  $c = 1;
  while($row = mysqli_fetch_array($res))
  {
	  echo "<tr>
    <td>".$c++."</td>
    <td>".$row[1]."</td>
    <td><a href='managecourse.php?id=$row[0]' onclick='return val()' class='btn btn-danger' >Delete</a></td>
  </tr>";
  }
  /* ### */  ?>
  
</table>
				</div>
			</div>
		</div>
	</div>
</FORM>				
			</div>

		</div>
	</div>
</div>
<!-- Tab News Start-->
<br>
<?php
include("footer.php");
?>
<link rel="stylesheet" type="text/css" href="DataTables-1.10.12/extensions/Buttons/css/buttons.dataTables.css">
 	<link rel="stylesheet" type="text/css" href="DataTables-1.10.12/media/css/jquery.dataTables.css">
<script type="text/javascript" language="javascript" src="DataTables-1.10.12/media/js/jquery.dataTables.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/extensions/Buttons/js/dataTables.buttons.js">
	</script>
	<script type="text/javascript" language="javascript" src="Stuk-jszip-6d2b991/dist/jszip.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="pdfmake-master/build/pdfmake.min.js">
	</script>
	<script type="text/javascript" language="javascript" src="pdfmake-master/build/vfs_fonts.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/extensions/Buttons/js/buttons.html5.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/examples/resources/syntax/shCore.js">
	</script>
	<script type="text/javascript" language="javascript" src="DataTables-1.10.12/examples/resources/demo.js">
	</script>
    <script>
        $(document).ready(function () {
            $('#dataTables-example').dataTable({
		dom: 'Bfrtip',
        lengthMenu: [
            [ 10, 25, 50, -1 ],
            [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength',
			'pdfHtml5'
        ]
	} );
        });
    </script>
	<script>
	 function val()
	 {
		var flag=confirm("Do you want to delete the record");
		if(!flag)
		return false;
		else
		return true;
	 }
	</script>