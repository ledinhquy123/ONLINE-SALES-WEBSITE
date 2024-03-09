<?php
    require_once("../controler/control_form.php");
    if(isset($_POST["userName"]) && isset($_POST["passWord"])){
        session_start();

        $control = new control_form();
        $result = $control->getTaiKhoan1();

        $check = false;
        while($row = $result->fetch_assoc()){
            if($row["userName"] == $_POST["userName"] && $row["passWord"] == $_POST["passWord"]){
                $_SESSION["account"] = array($_POST["userName"], $_POST["passWord"]);
                $check = true;
                $ok = "";
                if(
                    ($_SESSION["account"][0] == "quylee" && $_SESSION["account"][1] == "admin") ||
                    ($_SESSION["account"][0] == "thuy1976" && $_SESSION["account"][1] == "654321")
                ){
                    $ok = '../admin_new/php/';
                }else $ok = '../php/';
                echo '<script> 
                        alert("Đăng nhập thành công"); 
                        window.location.href = "'. $ok .'";
                     </script>';
                break;
            }
        }
        if(!$check){
            echo '<script> 
                alert("Tài khoảng không đúng, cần phải đăng kí!");
                window.location.href = "Register.php";
             </script>';
        }
    }else{
        echo '<script> 
                alert("Bạn cần phải đăng kí!");
                window.location.href = "Register.php";
             </script>';
    }
?>