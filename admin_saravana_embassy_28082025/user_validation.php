<?php
    $check_login_session = "valid_user"; $login_user_id = "";
	if(!empty($_SESSION)) {
		$login_user_id = $obj->checkUser();
		if(!empty($login_user_id)) {
			if($login_user_id != $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id']) {
				$check_login_session = "invalid_user";
			}
		}
		else {
			$check_login_session = "invalid_user";
		}
	}
	else {
		$check_login_session = "invalid_user";
	}
	if($check_login_session == "invalid_user") {
		echo $check_login_session;
		exit;
	}
?>