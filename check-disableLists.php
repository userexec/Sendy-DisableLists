<?php include('../../api/_connect.php');?>

<?php
	// CHECK LISTS DISABLED
	/* This script checks if a user should have lists disabled.
	 * It works by checking the listsDisabled field in the apps table for a
	 * value of 1 or 0. This value will only be there if you've placed the
	 * code from toggle-disabledLists.php as instructed in its comments.
	 */

	if (isset($_POST['i'])) {
		$checkDisableListsAppId = $_POST['i'];
	} else if (isset($_GET['i'])) {
		$checkDisableListsAppId = $_GET['i'];
	} else if (function_exists('get_app_info')) {
		$checkDisableListsAppId = get_app_info('restricted_to_app');
	} else {
		return;
	}

	if (isset($_POST['checkDisabled'])) {
		echo listsDisabledForBrand();
		return;
	}

	function listsDisabledForUser() {
		if (listsDisabledForBrand() && function_exists('get_app_info')) {
			if (get_app_info('is_sub_user')) {
				return 1;
			} else {
				return 0;
			}
		}
	}

	function listsDisabledForBrand() {
		global $mysqli;
		global $checkDisableListsAppId;

		$q = "SELECT disableLists FROM apps WHERE id=" . $checkDisableListsAppId;
		$r = mysqli_query($mysqli, $q);
		if ($r) {
			while($row = mysqli_fetch_array($r)) {
				return $row['disableLists'];
			}
		} else {
			return 0;
		}
	}

	if (listsDisabledForUser() == 1 && preg_match('/subscribers|list|custom-fields|autoresponders/i', $_SERVER["REQUEST_URI"])) {
		// Kill the connection if any attempt is made to access list editing abilities
		echo "Sendy Add-on Disable Lists: Access Denied.";
		die();
	}
?>