<?php include('../config.php');?>
<?php include('../functions.php');?>

<?php
	// DISABLE MANAGEMENT OF LISTS
	/* This script toggles a field in the database that determines whether a
	 * particular brand may manage their own subscriber lists.
	 * 
	 * It uses a checkbox item that you place in edit-brand.php to fire an AJAX
	 * call to the server which toggles the invoice field in the apps table
	 * to 1 or 0. When would be presented with a path to manage lists, the
	 * check-disableLists.php script will ensure that this option is inaccessible
	 * if lists are disabled.
	 */

	$app_id = $_POST['i'];

	$q = "SELECT EXISTS(SELECT disableLists FROM apps)";
	$r = mysqli_query($mysqli, $q);
	if ($r) {
		// Disable Lists row exists. Check its value.
		$q = "UPDATE apps SET disableLists = IF(disableLists=1, 0, 1) WHERE id=" . $app_id;
		$r = mysqli_query($mysqli, $q);
	} else {
		// Invoice row does not exist. Add it to the login table.
		$q = "ALTER TABLE apps ADD disableLists TINYINT(1) DEFAULT 0";
		$r = mysqli_query($mysqli, $q);
		$q = "UPDATE apps SET disableLists = 1 WHERE id=" . $app_id;
		$r = mysqli_query($mysqli, $q);
	}

	echo 1;
?>