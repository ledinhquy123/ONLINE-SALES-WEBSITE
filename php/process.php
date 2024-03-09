<?php
    session_start();
    if(isset($_GET["name"])){
        if(isset($_SESSION["account"])){
            if(isset($_SESSION["arr"])){
                if(isset($_GET["pid"])){
                    for($i = count($_SESSION["arr"]) - 1; $i >= 0; $i--){
                        if($_SESSION["arr"][$i] == $_GET["name"]){
                            array_splice($_SESSION["arr"], $i, 1);
                            if($_GET["pid"] == 1) break;
                        }
                    }
                }else{
                    array_push($_SESSION["arr"] ,$_GET["name"]);
                    // array_push($_SESSION[$_SESSION["account"]] ,$_GET["name"]);
                }
            }else{
                $_SESSION["arr"] = array($_GET["name"]);
                // $_SESSION[$_SESSION["account"]] = array($_GET["name"]);
            }
            echo '<script> window.location.href="cart.php" </script>';
        }else{
            echo '<script> 
                    alert("Bạn cần đăng nhập trước khi mua hàng");
                    window.location.href="../Login/Login.php"
                 </script>';
        }
    }
?>