<?php 
session_start();
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

<body style="background:url('img/111.jpg'); background-blend-mode:color-dodge;">

    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">2012-2016安庆检验数据分析</a>
        </div>
<!--
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">查询 <span class="sr-only">(current)</span></a></li>
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">查看 <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">2012年</a></li>
                <li><a href="#">2013年</a></li>
                <li><a href="#">2014年</a></li>
                
                <li class="divider"></li>
                <li><a href="#">重要数据</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Link</a></li>
          </ul>
        </div>
-->
      </div>
    </nav>

<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="well bs-component" >

<ul class="nav nav-tabs">
  <li class="active"><a href="#005" data-toggle="tab" aria-expanded="true">IgG+IgM</a></li>
  <li class=""><a href="#001" data-toggle="tab" aria-expanded="false">个人信息</a></li>
  <li class=""><a href="#002" data-toggle="tab" aria-expanded="false">日期范围</a></li>
  <li class=""><a href="#003" data-toggle="tab" aria-expanded="false">年龄性别</a></li>
  <li class=""><a href="#004" data-toggle="tab" aria-expanded="false">科别＋项目</a></li>
  
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade" id="001">
    <form class="form-horizontal" role="form" method="post" action="listdetail_alldata.php">
          <fieldset>
            </br>
            <div class="form-group">
              <label for="inputEmail" class="col-lg-2 control-label">姓名</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="xingming" name="xingming" placeholder="姓名">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-lg-2 control-label">病员号</label>
              <div class="col-lg-10">
                <input type="password" class="form-control" id="bingyuanhao" name="bingyuanhao" placeholder="病员号">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-lg-2 control-label">卡号</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="kahao" name="kahao" placeholder="卡号">
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </fieldset>
        </form>
  </div>
  <div class="tab-pane fade" id="002" role="form" method="post" action="listdetail_alldata.php">
    <form class="form-horizontal">
          <fieldset>
            </br>
            <div class="form-group">
              <label for="inputEmail" class="col-lg-2 control-label" style="width: 120px;">起始日期</label>
              <div class="input-group date" style="width: 400px;">
                  <input name="startdate" id="startdate" type="text" class="form-control" onKeyUp="chInput('startdate')" onKeyDown="chInput('startdate')" placeholder="2012/01/01"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-lg-2 control-label" style="width: 120px;">结束日期</label>
              <div class="input-group date" style="width: 400px;">
                  <input name="enddate" id="enddate" type="text" class="form-control" onKeyUp="chInput('enddate')" onKeyDown="chInput('enddate')" placeholder="2016/12/31"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
              </div>
            </div>
            <!--<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
            <!-- Include Date Range Picker -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

              <script>
              $('#startdate').datepicker({
              format: 'yyyy/mm/dd',
              todayHighlight: true,
              autoclose: true,
              orientation: "auto",
              startDate: "2012/01/01",
                
              });
              
              $('#enddate').datepicker({
              format: 'yyyy/mm/dd',
              todayHighlight: true,
              autoclose: true,
              orientation: "bottom auto",
              startDate: "2012/01/01",
              });
              </script>
            <div class="form-group" style="width: 620px;">
              <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </fieldset>
        </form>
  </div>
  <div class="tab-pane fade" id="003">
    <form class="form-horizontal" role="form" method="post" action="listdetail_alldata.php">
          <fieldset>
            </br>
            <div class="form-group">
              <label for="inputEmail" class="col-lg-2 control-label">年龄</label>
              <div class="col-lg-10">
                <input type="text" class="form-control" id="fromage" name="fromage" placeholder="from" style="width: 100px;"> 
                <br>
                <input type="text" class="form-control" id="toage" name="toage" placeholder="to" style="width: 100px;">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-lg-2 control-label">性别</label>
              <div class="col-lg-10">
                 <select class="form-control" id="xingbie" name="xingbie">
                  <option>男</option>
                  <option>女</option>
                  <option>全部</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </fieldset>
        </form>
  </div>
  <div class="tab-pane fade" id="004">
    <form class="form-horizontal" role="form" method="post" action="listdetail_alldata.php">
          <fieldset>
            </br>
            <div class="form-group">
              <label for="inputEmail" class="col-lg-2 control-label" style="width: 120px;">科别</label>
              <div class="col-lg-10" style="width: 405px;">
                <input type="text" class="form-control" id="kebie" name="kebie" placeholder="科别关键字"> 
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-lg-2 control-label" style="width: 120px;">项目代码</label>
              <div class="col-lg-10" style="width: 405px;">
                <input type="text" class="form-control" id="xiangmudaima" name="xiangmudaima" placeholder="项目代码关键字"> 
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-lg-2 control-label" style="width: 120px;">测定结果</label>
              <div class="col-lg-10" style="width: 405px;">
                <input type="text" class="form-control" id="cedingjieguo" name="cedingjieguo" placeholder="测定结果关键字"> 
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-lg-2 control-label" style="width: 120px;">诊断</label>
              <div class="col-lg-10" style="width: 405px;">
                <input type="text" class="form-control" id="zhenduan" name="zhenduan" placeholder="诊断关键字"> 
              </div>
            </div>
            <div class="form-group" style="width: 705px;">
              <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </fieldset>
        </form>
  </div>
  <div class="tab-pane fade active in" id="005">
    <form class="form-horizontal" role="form" method="post" action="listdetail.php">
          <fieldset>
            </br>
            <div class="form-group">
              <label for="inputEmail" class="col-lg-2 control-label">HEVIgG</label>
              <div class="col-lg-10">
                 <select class="form-control" id="IgG" name="IgG">
                  <option>0-阴性</option>
                  <option>1-阳性</option>
                  <option>2-弱阳性</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-lg-2 control-label">变化</label>
              <div class="col-lg-10">
                 <select class="form-control" id="IgGChange" name="IgGChange">
                  <option>持续</option>
                  <option>转阳</option>
                  <option>转阴</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-lg-2 control-label">HEVIgM</label>
              <div class="col-lg-10">
                 <select class="form-control" id="IgM" name="IgM">
                  <option>0-阴性</option>
                  <option>1-阳性</option>
                  <option>2-弱阳性</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-lg-2 control-label">变化</label>
              <div class="col-lg-10">
                 <select class="form-control" id="IgMChange" name="IgMChange">
                  <option>持续</option>
                  <option>转阳</option>
                  <option>转阴</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </fieldset>
        </form>
  </div>
</div>
</div>
    </div>
</div> 



</body>
</html>