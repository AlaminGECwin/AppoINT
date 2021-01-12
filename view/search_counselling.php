<div class="container ">
	<center>
		<h1 class="text-info">Search Counselling</h1>
<?php
if (isset($_GET['sector'])) {
	# code...
}else{


?>
		<div class="btn-group ">
		  <button type="button" class="btn btn-warning">Select Sector</button>
		  <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		    <span class="sr-only">Toggle Dropdown</span>
		  </button>
		  <div class="dropdown-menu">
		  	<?php
		  	foreach ($sectors as $row) {
		  		# code...
		  	
		  	?>
		    <a class="dropdown-item" href="index.php?function=search_counselling_by_sector&sector=<?php echo $row['sector'];?>"><?php echo $row['sector']; ?></a>
		    <?php
			}
		    ?>
		    
		  </div>
		</div>

<?php 
}
?>
		<!--<button type="button" class="btn btn-dark">Search <img width="22" height="22" src="./assets/images/search.png"></button>-->



	</center>
</div>

