<?php
    function msg($msg){
        echo "<script> alert('$msg'); </script>";
    }
    function redirect($msg){
        echo "<script> window.location = '$msg'; </script>";
    }
    $con = new PDO('mysql:host=localhost;dbname=webspaceways', "root", "");
    @$login = $_POST["login"];
    @$senha = $_POST["senha"];
    if( empty($login) || empty($senha) ){
        msg("missing param");
        redirect("/login");
    }else{
        $sql = "select * from usuario where email = :email and senha = :senha";
        $stmt = $con->prepare($sql);
        $resultado = $stmt->execute( 
            array(
                ":email" => $login,
                ":senha" => md5($senha),
            )
         );
         if($resultado){
            if( $resultados = $stmt->fetch(PDO::FETCH_ASSOC)){
                session_start();
                $_SESSION["Login"] = $resultados["idUsuario"];
                msg("succesc Login");
                redirect("/");
            }else{
                msg("user not found");
                redirect("/login");
            }
         }else{
            msg("login cant be possible");
            redirect("/login");
         }
    }
