
<?php
function table($columns,$information){?>
<div>
  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
      	<?php
      	foreach ($columns as $column_name) {
      		?>
      		<th scope="col"><?php echo $column_name['Field'];?></th>
      		<?php
      		# code...
      	}
      	?>
        

      </tr>
    </thead>
    <tbody>
      

      	<?php
      	foreach($information as $row_data) { 
      		?>
      		<tr>
      		<?php
	      		foreach ($row_data as $data) {
	      		?>
	      		<td ><?php echo $data;?></td>
	      		<?php
	      		# code...
	      		}
      		?>
      		<tr>
      		<?php
      	}
      	
      	?>

      
      
      
    </tbody>
  </table>
</div>
<?php
}?>
