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
                
                <a class="navbar-brand" href="/"><img src="/content/img/tns-ship-small.png" class="ml-0 mr-3" style="max-width: 50px;"></a>
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
    <div class="container">
        <main role="main" class="pb-3">
                        
            <div class="text-center">
                <h1 class="display-4">Sign In</h1>
                <p>
                    <form action="/php/login.php" method="post">
                        <div class="form-group text-left">
                            <label for="exampleInputEmail1">Email address</label>
                            <input name="login" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group text-left">
                            <label for="exampleInputPassword1">Password</label>
                            <input name="senha" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        
                        <button type="submit" class="btn btn-primary my-2">Submit</button>
                    </form>
                </p>
            </div>

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
