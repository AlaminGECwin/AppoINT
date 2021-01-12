<!DOCTYPE html>
<html lang="en">
  <head>
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets/logo/cm short.png">
    <!--footer-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="footer, address, phone, icons" />

    <link rel="stylesheet" href="style.css">
    
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

    <link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css" href="assets/css/footer.css">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >

    <!--<title><?php echo $arr['title']?></title>-->
    <title>Counselling Manager</title>
    <style>
        
    </style>
    <link href="assets/fontawesome/css/all.css" rel="stylesheet">


    
    
    
  </head>
  <?php
  if (isset($_GET['function'])) {
    # code...
    $function=$_GET['function'];
  }else {
    # code...
    $function="home";
  }
    
  ?>
  <body class="bg-white">
    <div class="container mb-3">
      
       
      <nav class="navbar  navbar-warning bg-white sticky-top  ">
      <a class="navbar-brand text-warning" <?php  route("home"); ?>  ><img src="assets/logo/cm logo.png" width="230" height="50"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!--<div class="collapse navbar-collapse " id="navbarSupportedContent">-->
        
        <ul class=" nav  justify-content-end ">

          

          

          
<!--
          <li class="nav-item <?php if($function=='about'){ echo 'active'; } ?>">
            <a class="nav-link" href="index.php?function=about">About</a>
          </li>

          <li class="nav-item <?php if($function=='contact'){ echo 'active'; } ?>">
            <a class="nav-link" href="index.php?function=contact">Contact</a>
          </li>





          <li class="nav-item <?php if($function=='test'){ echo 'active'; } ?>">
            <a class="nav-link" href="index.php?function=test">TEST</a>
          </li>


-->

        </ul>
      
        
        
        
      <!--</div>-->


            <ul class="nav justify-content-end">
              

              <li class="nav-item">
                <a class="nav-link " href="index.php?function=search_counselling"><button type="button" class="btn btn-warning text-dark font-weight-bold">Search Counselling</button></a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="index.php?function=sign_up"><button type="button" class="btn btn-white">Connect Now</button></a>
              </li>

              <li class="nav-item">
                <a class="nav-link " href="index.php?function=sign_in"><button type="button" class="btn btn-outline-primary">Sign in</button></a>
              </li>
              
            </ul> 
    </nav>
  </div>





