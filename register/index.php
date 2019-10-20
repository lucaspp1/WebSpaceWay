<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>web_spaceways</title>
    <link rel="icon" href="/content/img/spaceApps.ico" />
    
    <link rel="stylesheet" href="/content/lib/bootstrap/dist/css/bootstrap.min.css"/>
    
    <link rel="stylesheet" href="/content/css/site.css" />

    
    <!-- Footer -->

    <script src="/content/lib/jquery/dist/jquery.min.js"> </script>
    <script src="/content/lib/bootstrap/dist/js/bootstrap.bundle.min.js"> </script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-toggleable-sm navbar-dark bg-dark border-bottom box-shadow mb-3">
            <div class="container">
                
                <a class="navbar-brand"  href="/"><img src="/content/img/tns-ship-small.png" class="ml-0 mr-3" style="max-width: 50px;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse d-sm-inline-flex flex-sm-row-reverse">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/">Home</a>
                        </li>
                        <?php
                            session_start();
                            if(empty($_SESSION["Login"])){
                        ?>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="/login">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="/register">Sign Up</a>
                            </li>
                        <?php
                            }else{
                        ?>
                            
                            <li class="nav-item">
                                <a class="nav-link text-light" href="/simulation">Simulation</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="/php/logout.php">Logout</a>
                            </li>
                        <?php
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <script>
        var total = 0;
        var index = 1;
        function next(){
            $(".hidden"+index).fadeIn();
            if(index < total){
                index++;
            }
        }
    </script>
    <div class="container">
        <main role="main" class="pb-3">
            
            <form action="/php/cadastro.php" method="post">
                <h1 class="text-center display-4">Sign Up</h1>
                <?php
                    @$alter = $_GET["alter"];
                    $con = new PDO('mysql:host=localhost;dbname=webspaceways', "root", "");
                    $stmtPerguntas = $con->prepare("select * from pergunta");
                    $stmtPerguntas->execute();
                    $cont = 0;
                    $display = $alter ? "block" : "none";
                    while(  $row = $stmtPerguntas->fetch(PDO::FETCH_ASSOC) ){
                        $contTemp = 1;
                        if($cont == 0){
                            echo "<div style='' class='hidden$cont' >";
                        }else{
                            echo "<div style='display: $display' class='hidden$cont' >";
                        }
                        
                        echo "<p> <h2> ". $row["descricao"] ." </h2> </p>";
                        $stmtRespostas = $con->prepare("select * from resposta where idPergunta = " . $row["id"]);
                        $stmtRespostas->execute();
                        while(  $rowResposta = $stmtRespostas->fetch(PDO::FETCH_ASSOC) ){
                            $contTemp++;
                            echo "<input required type='radio' name='value".$cont."' id='tt".$contTemp.$cont."' value='".$rowResposta["valor"]."' > <label for='tt".$contTemp.$cont."' > ".$rowResposta["descricao"]." </label> <br />";
                        }
                        echo "<br/> <span onclick='next()' class='btn btn-outline-dark'> Next </span>";
                        $cont++;
                    }
                    echo "<script> total = $cont </script>";
                    echo "<div style='display: $display' class='hidden$cont' >";
                ?>
                    <div class="form-group">
                        <label for="name">name</label>
                        <input name="nome" required type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>

                    <div class="form-group">
                        <label for="born">born date</label>
                        <input name="born" required type="date" class="form-control" id="born" placeholder="Enter born date">
                    </div>

                    <div class="form-group">
                        <input name="sexo" required type="radio" id="femin" value="f"   > <label for="femin">Feminino</label>
                        <input name="sexo" required type="radio" id="mas" value="m" > <label for="mas">Masculino</label>
                    </div>
                    
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="email" required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input name="senha" required type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>

        </main>
    </div>

    <!-- Footer -->
    <footer class="page-footer font-small bg-dark stylish-color-dark bgFooterCustom text-light pt-4">

        <!-- Footer Links -->
        <div class="container text-center text-md-left">

            <!-- Grid row -->
            <div class="row">

                <!-- Grid column -->
                <div class="col-md-4 mr-auto">

                    <!-- Content -->
                    <h1>Neptune Rebels</h1>
                    <p>Sleeping doesn't give any XP.</p>

                </div>

                <hr class="clearfix w-100 d-md-none">

            </div>
            <!-- Grid row -->
        </div>

    </footer>
    
</body>
</html>
