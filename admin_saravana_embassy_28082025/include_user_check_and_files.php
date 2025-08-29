<?php
    include("include_files.php");
    
    if(!empty($page_title) && $page_title != "index") {      
        $login_user_id = "";
        if(!empty($_SESSION)) {
          $login_user_id = $obj->checkUser();
          if(!empty($login_user_id)) {
            if($login_user_id != $_SESSION[$GLOBALS['site_name_user_prefix'].'_user_id']) {
              header("Location:logout.php");
              exit;
            }
          }
          else {
            header("Location:logout.php");
            exit;
          }
        }
        else {
          header("Location:index.php");
          exit;
        }
    }
    $project_title = "";
    $project_title = $obj->getProjectTitle();
?>