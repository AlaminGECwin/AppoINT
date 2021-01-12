<?php
	/**
	 * all library functions here.
	 */
	function route($view){
		echo "href='"."index.php?function=".$view."'";

	}
	function function_active($function)
	{
		if($function=='home'){ echo 'active'; }
	}
?>