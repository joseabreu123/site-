<?php

	require ("mysqli_connect2.php");

	$id = $_POST['id'];
 	
	$query = mysqli_query($conn,"select * from classics where classic_id = $id");
	$row = mysqli_fetch_object($query);

		
		echo '<script type="text/javascript">';
		echo "$('#infoimg').empty();";
		echo "$('#infoimg').append(\"<div class='modal-dialog modal-lg'><div class='modal-content'><div class='modal-header'><button type='button' class='close' data-dismiss='modal'>&times;</button><h4 id='title' style='text-align:center' class='modal-title'><b>$row->name</b></h4> </div><div class='modal-body'><div class='container-fluid'><div class='row'><div class='col-md-5'><img src='$row->image' class='img-fluid img-thumbnail imgsize'><p id='lbnome'><center><b>$row->username</b></center></p></div><div class='col-md-1'> </div><div class='col-md-6'><div class='form-group'><h5><b>Recipe:</b></h5>$row->recipe</div></div></div> </div></div><div class='modal-footer'> <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button></div> </div></div>\");";
		echo '</script>';
		
	
		
?>

