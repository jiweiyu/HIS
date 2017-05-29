<?php 
session_start();

    require "class.connect.php";
    $connect = new connect();
    $conn = $connect->getConnect("his");
    if(!$conn) { echo "failed to connect!";}
        
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if(issset($_SESSION['headresult'])){
      $headresult=$_SESSION['headresult'];
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>2012-2016 Data Analysis</title>

    <link href="http://bootswatch.com/lumen/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/hiddenrow.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="http://bootswatch.com/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="http://bootswatch.com/assets/js/custom.js"></script>

</head>

<body>

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">统计数据</a>
        </div>
      </div>
    </nav>

    <div class="col-lg-12 centered">
    <div class="row">
    <div class="col-md-12">
    <div class="panel panel-default">



</div>
</div>
</div>
</div>
</body>
</html>