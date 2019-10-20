<?php
    
    function msg($msg){
        echo "<script> alert('$msg'); </script>";
    }
    function redirect($msg){
        echo "<script> window.location = '$msg'; </script>";
    }
    function verifyEmail($con, $email){
        $sql = "select * from usuario where email = :email";
        $stmt = $con->prepare($sql);
        $resultado = $stmt->execute( 
            array(
                ":email" => $email
            )
         );
         return ($resultados = $stmt->fetch(PDO::FETCH_ASSOC));
    }
    $con = new PDO('mysql:host=localhost;dbname=webspaceways', "root", "");

    @$senha = $_POST["senha"];
    @$email = $_POST["email"];
    @$sexo = $_POST["sexo"];
    @$born = $_POST["born"];
    @$nome = $_POST["nome"];
    
    $dados = array( $senha, $nome, $email, $sexo, $born );
    $suave = true;
    foreach ($dados as $value) {
        if(empty($value)){
            $suave = false;
        }
    }
    if( !$suave ){
        msg("missing param");
        redirect("/login");
    }else{
        if( verifyEmail($con, $email) ){
            msg("Email já existe");
            redirect("/register?alter=1");
        }else{
            @$arr = ARRAY( @$_POST["value0"], @$_POST["value1"], @$_POST["value2"], @$_POST["value3"], @$_POST["value4"] );
            // new array containing frequency of values of $arr 
            $arr_freq = array_count_values($arr);     
            
            // arranging the new $arr_freq in decreasing order  
            // of occurrences 
            arsort($arr_freq); 
            
            // $new_arr containing the keys of sorted array 
            $new_arr = array_keys($arr_freq); 
            $frequently = $new_arr[0];
            $sql = "INSERT INTO usuario (nome, DataNascimento, sexo, senha, email, idPerfil) VALUES ( :nome, :born, :sexo, :senha, :email, :frequently)";
            $stmt = $con->prepare($sql);
            
            $resultado = $stmt->execute( 
                array(
                    ":email" => $email,
                    ":senha" => md5($senha),
                    ":nome" => $nome,
                    ":born" => $born,
                    ":sexo" => $sexo,
                    ":frequently" => $frequently
                )
            );
            
            msg("register success");
            redirect("/login");
        }
    }
