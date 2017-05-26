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
	      <a class="navbar-brand" href="#">Dr LU</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Select <span class="sr-only">(current)</span></a></li>
	        <li><a href="#">Select</a></li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="#">Action</a></li>
	            <li><a href="#">Another action</a></li>
	            <li><a href="#">Something else here</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Separated link</a></li>
	            <li class="divider"></li>
	            <li><a href="#">One more separated link</a></li>
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
	  </div>
	</nav>
<div class="col-lg-12 centered">
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Search Result</div>

  <!-- Table -->
	<table class="table table-striped table-hover "> 
		<thead> 
			<tr> 
				<th>采样时间</th>
				<th>检验时间</th>
				<th>姓名</th>
				<th>病员号</th> 
				<th>卡号</th> 
				<th>年龄</th> 
				<th>性别</th> 
				<th>科别</th>
				<th>项目代码</th> 
				<th>测定结果</th> 
				<th>诊断</th> 
				<th>标本种类</th>
			</tr> 
		</thead> 
		<tbody> 
			 <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle">
				<td>2012/01/01</td> 
				<td>2012/01/01</td> 
				<td>陈荣祥</td> 
				<td>123456</td> 
				<td>12346</td> 
				<td>66</td>
				<td>男</td> 
				<td>脑外科</td> 
				<td>ALB3</td>
				<td>33.3</td> 
				<td>右侧额叶脑内血肿</td> 
				<td>血清</td>
			</tr> 
			<tr >
            	<td colspan="12" class="hiddenRow">
            		<div class="accordian-body collapse" id="demo1">
            			<div class="panel-heading" style="background:#F7DC6F">------------------------------------系列检验------------------------------------</div>
            			<table class="table table-striped table-hover "> 
            				<thead> 
								<tr> 
									<th>采样时间</th>
									<th>检验时间</th>
									<th>姓名</th>
									<th>病员号</th> 
									<th>卡号</th> 
									<th>年龄</th> 
									<th>性别</th> 
									<th>科别</th>
									<th>项目代码</th> 
									<th>测定结果</th> 
									<th>诊断</th> 
									<th>标本种类</th>
									<th>距上次检验(天)</th>
									<th>差值</th>
								</tr> 
							</thead> 
            				<tbody> 
							 <tr class="warning">
								<td>2012/01/01</td> 
								<td>2012/01/01</td> 
								<td >陈荣祥</td> 
								<td>123456</td> 
								<td>12346</td> 
								<td>66</td>
								<td>男</td> 
								<td>脑外科</td> 
								<td>ALB3</td>
								<td>33.3</td> 
								<td>右侧额叶脑内血肿</td> 
								<td>血清</td>
								<td>3</td>
								<td>2.6</td>
							</tr> 
							 <tr class="active">
								<td>2012/01/01</td> 
								<td>2012/01/01</td> 
								<td>陈荣祥</td> 
								<td>123456</td> 
								<td>12346</td> 
								<td>66</td>
								<td>男</td> 
								<td>脑外科</td> 
								<td>ALB3</td>
								<td>33.3</td> 
								<td>右侧额叶脑内血肿</td> 
								<td>血清</td>
								<td>3</td>
								<td>2.6</td>
							</tr> 
							 <tr class="active">
								<td>2012/01/01</td> 
								<td>2012/01/01</td> 
								<td>陈荣祥</td> 
								<td>123456</td> 
								<td>12346</td> 
								<td>66</td>
								<td>男</td> 
								<td>脑外科</td> 
								<td>ALB3</td>
								<td>33.3</td> 
								<td>右侧额叶脑内血肿</td> 
								<td>血清</td>
								<td>3</td>
								<td>2.6</td>
							</tr> 
							</tbody>
						</table>
						<div class="panel-heading" style="background:#F7DC6F">------------------------------------系列检验------------------------------------</div>
            		</div> 
            	</td>
        	</tr>
			<tr data-toggle="collapse" data-target="#demo2" class="accordion-toggle">
				<td>Jacob</td> 
				<td>Thornton</td> 
				<td>@fat</td> 
				<td>Jacob</td> 
				<td>Thornton</td> 
				<td>@fat</td> 
				<td>Jacob</td> 
				<td>Thornton</td> 
				<td>@fat</td> 
				<td>Jacob</td> 
				<td>Thornton</td> 

			</tr> 
			<tr >
            	<td colspan="6" class="hiddenRow"><div class="accordian-body collapse" id="demo2"> Demo2 </div> </td>
        	</tr>
			<tr data-toggle="collapse" data-target="#demo3" class="accordion-toggle">
				<td>Larry</td> 
				<td>the Bird</td> 
				<td>@twitter</td> 
				<td>Larry</td> 
				<td>the Bird</td> 
				<td>@twitter</td> 
				<td>Larry</td> 
				<td>the Bird</td> 
				<td>@twitter</td> 
				<td>Larry</td> 
				<td>the Bird</td> 
			</tr> 
			<tr >
            	<td colspan="6" class="hiddenRow"><div class="accordian-body collapse" id="demo3"> Demo3 </div> </td>
        	</tr>
		</tbody> 
	</table>
</div>
</div>
</div>
</div>
</body>
</html>
