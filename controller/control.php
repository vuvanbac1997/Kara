<?php
    require_once("../pages/connection.php");
    require_once("../model/database.php");
	require_once("../model/session.php");
	if(isset($_POST["btn_submit"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        if ($email=="" || $password==""){
			echo "Thông tin đăng nhập không đúng";
			header('Location: ../pages/login.php');
        }
        else{
            $user = db_user_get_by_username($email, $password);
			if(!empty($user)){
				if ($user['phan_quyen'] == 'admin'){
					session_set("email", $_POST["email"]);
					session_set("vaitro", "admin");
					header('Location: ../pages/index.php');
				}
				else{
					session_set("email", $_POST["email"]);
					session_set("vaitro", "member");
					header('Location: ../pages/index2.php');
				}
			}
			else{
				echo '<script>alert("Thông tin đăng nhập không đúng"); 
				window.location.href = "../pages/login.php"</script>';
				//header('Location: ../pages/login.php');
			}
			
        }
    }
    ?>