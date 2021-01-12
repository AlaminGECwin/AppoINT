<?php
function booked_button(){?>
<button type="button" class="btn  btn btn-danger w-100 h-100" >Booked</button>
<?php
}?>


<?php
function not_available_button(){?>
<button type="button" class="btn btn-light btn-outline-dark w-100 h-100">Not Available</button>
<?php
}?>

<?php
function available_button(){   //echo $i;     ?>
<a href="index.php?function=update_time_slot">
<button type="button" class="btn btn-success w-100 h-100 " >Available</button>
</a>
<?php
}?>

<?php
function expired_button(){?>
<button type="button" class="btn btn-secondary w-100 h-100 ">Expired</button>
<?php
}?>

<?php
function profile_button(){?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Profile</button>
<?php
}?>


<?php
function appointment_schedule_button(){?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#appointment_schedule">
  Schedule
</button>
<?php
}?>


<?php
function button($name,$color,$action_link){?>
<a href="<?php echo $action_link; ?>">
	<button type="button" class="btn <?php echo "btn-".$color; ?>" >
	  <?php echo $name; ?>
	</button>
</a>
<?php
}?>


