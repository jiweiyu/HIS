<?php
	session_start();
    //include_once "header.php";

    require "class.connect.php";
    $connect = new connect();
    $conn = $connect->getConnect("his");
    if(!$conn) { echo "failed to connect!";}
        
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    //搜索姓名，病员号，卡号
	if(isset($_POST["xingming"]) && isset($_POST["bingyuanhao"]) && isset($_POST["kahao"])){
		$getresult = $conn-> prepare("
				SELECT * FROM alldata
				WHERE 病员号 LIKE ?
				AND 卡号 LIKE ?
				AND 姓名 LIKE ?
				GROUP BY 姓名
				HAVING 采样时间 = min(采样时间)
				"); 
	    $a = "%".$_POST["bingyuanhao"]."%";
	    $b = "%".$_POST["kahao"]."%";
	    $c = "%".$_POST["xingming"]."%";
	    $getresult->bind_param("sss",$a,$b,$c);
	}

	//搜索开始日期，结束日期
	if(isset($_POST["startdate"]) && isset($_POST["enddate"])){
		$getresult = $conn-> prepare("
				SELECT * FROM alldata
				WHERE (采样时间>=? AND 采样时间<=?);
				GROUP BY 姓名
				HAVING 采样时间 = min(采样时间)
				"); 
		$a = $_POST["startdate"];
		$b = $_POST["enddate"];
	    $getresult->bind_param("ss",$a,$b);
	}

	//搜索年龄，性别
	//both fromage and toage
	if(isset($_POST["fromage"]) && isset($_POST["toage"]) && isset($_POST["xingbie"])){
		$getresult = $conn-> prepare("
				SELECT * FROM alldata
				WHERE (年龄>=? AND 年龄<=?) 
				AND (性别 IN (?))
				GROUP BY 姓名
				HAVING 采样时间 = min(采样时间)
				"); 
	    $a = $_POST["fromage"];
	    $b = $_POST["toage"];
	    if ($_POST["xingbie"] == "全部"){
	    	$c = "'男','女'";
	    }else{
	    	$c = $_POST["xingbie"];
	    }
	    $getresult->bind_param("sss",$a,$b,$c);
	}

	//only fromage
	if(isset($_POST["fromage"]) && empty($_POST["toage"]) && isset($_POST["xingbie"])){
		$getresult = $conn-> prepare("
				SELECT * FROM alldata
				WHERE 年龄>=?  
				AND (性别 IN (?))
				GROUP BY 姓名
				HAVING 采样时间 = min(采样时间)
				"); 
	    $a = $_POST["fromage"];
	    if ($_POST["xingbie"] == "全部"){
	    	$c = "'男','女'";
	    }else{
	    	$c = $_POST["xingbie"];
	    }
	    $getresult->bind_param("ss",$a,$c);
	}

	//only toage
	if(empty($_POST["fromage"]) && isset($_POST["toage"]) && isset($_POST["xingbie"])){
		$getresult = $conn-> prepare("
				SELECT * FROM alldata
				WHERE 年龄<=?  
				AND (性别 IN (?))
				GROUP BY 姓名
				HAVING 采样时间 = min(采样时间)
				"); 
	    $a = $_POST["toage"];
	    if ($_POST["xingbie"] == "全部"){
	    	$c = "'男','女'";
	    }else{
	    	$c = $_POST["xingbie"];
	    }
	    $getresult->bind_param("ss",$a,$c);
	}

	//only xingbie
	if(empty($_POST["fromage"]) && empty($_POST["toage"]) && isset($_POST["xingbie"])){
		$getresult = $conn-> prepare("
				SELECT * FROM alldata
				WHERE 性别 IN (?)
				GROUP BY 姓名
				HAVING 采样时间 = min(采样时间)
				"); 
	    
	    if ($_POST["xingbie"] == "全部"){
	    	$c = "'男','女'";
	    }else{
	    	$c = $_POST["xingbie"];
	    }
	    $getresult->bind_param("s",$c);
	}

	//搜索科别，项目
	if(isset($_POST["kebie"]) OR isset($_POST["xiangmudaima"]) OR isset($_POST["cedingjieguo"]) OR isset($_POST["zhenduan"])){
		$getresult = $conn-> prepare("
				SELECT * FROM alldata
				WHERE 科别 LIKE ? 
				AND 项目代码 LIKE ?
				AND 测定结果 LIKE ? 
				AND 诊断 LIKE ? 
				GROUP BY 姓名
				HAVING 采样时间 = min(采样时间)
				"); 
	    $a = "%".$_POST["kebie"]."%";
	    $b = "%".$_POST["xiangmudaima"]."%";
	    $c = "%".$_POST["cedingjieguo"]."%";
	    $d = "%".$_POST["zhenduan"]."%";
	    $getresult->bind_param("ssss",$a,$b,$c,$d);
	}

	$getresult->execute();
    $headresult = $getresult->get_result();


?><!DOCTYPE html>
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
	      <a class="navbar-brand" href="start.php">重新搜索</a>
	      <a class="navbar-brand" onclick=" window.open('tongji.php','_blank')">查看统计数据</a>
	    </div>

<!--
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
	    -->
	  </div>
	</nav>
<div class="col-lg-12 centered">
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
  <!-- Default panel contents -->


  <?php
                    if($headresult){
                    	$headresult_total = mysqli_num_rows($headresult);
                    	echo "
                    	<div class='panel-heading'>Total Result: ".$headresult_total."</div>

						<table class='table table-hover'> 
								<thead> 
									<tr> 
										<th>采样时间</th>
										<th>检验日期</th>
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
                    	";

                        while ($row = mysqli_fetch_array($headresult, MYSQLI_BOTH)){
                            $head_jianyanriqi = $row['检验日期'];
	                            $head_jianyanriqi_date = new DateTime($head_jianyanriqi);
								$head_jianyanriqi_date->format('Y-m-d');
								$head_y = date('Y',strtotime($head_jianyanriqi));
                            $head_caiyangshijian = $row['采样时间'];
                            $head_bingyuanhao = $row['病员号'];
                            $head_kahao = $row['卡号'];
                            $head_xingming = $row['姓名'];
                            $head_nianling = $row['年龄'];
                            	//head birthyear
                            	$head_birthyear = $head_y - $head_nianling;
                            $head_xingbie = $row['性别'];
                            $head_kebie = $row['科别'];
                            $head_xiangmudaima = $row['项目代码'];
                            $head_cedingjieguo = $row['测定结果'];
                            $head_zhenduan = $row['诊断'];
                            $head_biaobenzhonglei = $row['标本种类'];
                            $head_RID = $row['RID'];

                            $findall_xingming = "%".$head_xingming."%";
                            $findall_bingyuanhao = $head_bingyuanhao;
                            $findall_kahao = $head_kahao;

                            //查询head数据中所有的检验数据
                            $getheaddata = $conn->prepare("
                            	SELECT * FROM headdata
								WHERE 姓名 = ? 
								ORDER BY 采样时间;
                            	");
                            $getheaddata->bind_param("s",$head_xingming);
                            $getheaddata->execute();
                            $allheadresult = $getheaddata->get_result();

                            $headtotal = mysqli_num_rows($allheadresult);
                            if($headtotal>0){
                            	$headstatus = "active";
                            }else{
                            	$headstatus = "";
                            }

                            //按照最宽松的标准查询 考虑2012-2016跨越4年，年龄标准相差6，之后再检查具体birthyear
                            $getalldata = $conn->prepare("
                            	SELECT * FROM alldata
								WHERE 姓名 LIKE ? 
								AND ABS(年龄-?)<=6
								AND (性别 IN (?))
								ORDER BY 检验日期;
                            	");
                            $getalldata->bind_param("sss",$findall_xingming,$head_nianling,$head_xingbie);
                            $getalldata->execute();
                            $allresult = $getalldata->get_result();

                            $total = mysqli_num_rows($allresult);
                            if($total>1){
                            	$headstatus = "active";
                            }else{
                            	$headstatus = "";
                            }

                            if($head_xingming!=""){
                         	echo "
	                           <tr data-toggle='collapse' data-target='.".$head_RID."' class='accordion-toggle ".$headstatus."'>
									<td>".$head_caiyangshijian."</td> 
									<td>".$head_jianyanriqi."</td> 
									<td>".$head_xingming."</td> 
									<td>".$head_bingyuanhao."</td> 
									<td>".$head_kahao."</td> 
									<td>".$head_nianling."</td>
									<td>".$head_xingbie."</td> 
									<td>".$head_kebie."</td> 
									<td>".$head_xiangmudaima."</td>
									<td>".$head_cedingjieguo."</td>
									<td>".$head_zhenduan."</td>
									<td>".$head_biaobenzhonglei."</td>
								</tr> 
                            ";
                        	}

                        	if($allheadresult){
                        		//count the all head data number
                        		$i = 1;
                        		$realtotal = 0;
                        		while ($headrow= mysqli_fetch_array($allheadresult,MYSQLI_BOTH)) {
                        			$newhead_jianyanriqi = $headrow['检验日期'];
                        				$newhead_y = date('Y',strtotime($newhead_jianyanriqi));
		                            $newhead_caiyangshijian = $headrow['采样时间'];
		                            $newhead_bingrenleixing = $headrow['病人类型'];
		                            $newhead_bingyuanhao = $headrow['病员号'];
		                            $newhead_kahao = $headrow['卡号'];
		                            $newhead_xingming = $headrow['姓名'];
		                            $newhead_age = $headrow['age'];
		                            	$newhead_birthyear = $newhead_y - $newhead_age;
		                            $newhead_xingbie = $headrow['性别'];
		                            $newhead_kebie = $headrow['科别'];
		                            $newhead_IgG = $headrow['IgG'];
		                            $newhead_IgM = $headrow['IgM'];
		                            $newhead_zhenduan = $headrow['诊断'];
		                            $newhead_biaobenzhonglei = $headrow['标本种类'];

		                            if($i == 1){
	                                	//calculate the date_diff based on headdata
	                                	$all_datediff = abs(strtotime($newhead_caiyangshijian) - strtotime($head_caiyangshijian));
	                                	$years = floor($all_datediff / (365*60*60*24));
										$months = floor(($all_datediff - $years * 365*60*60*24) / (30*60*60*24));
										$days = floor(($all_datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	                                	
	                                	echo "
				                           	<tr >
							            	<td colspan='12' class='hiddenRow'>
							            		<div class='".$head_RID." accordian-body collapse' id='".$head_RID."'>
							            			<div class='panel-heading' style='background:#F7DC6F'>------------------------------------IgG+IgM检验------------------------------------</div>
							            			<table class='table table-hover'> 
							            				<thead> 
															<tr> 
																<th>采样时间</th>
																<th>检验日期</th>
																<th>姓名</th>
																<th>病员号</th> 
																<th>卡号</th> 
																<th>年龄</th> 
																<th>性别</th> 
																<th>科别</th>
																<th>IgG</th> 
																<th>IgM</th> 
																<th>诊断</th> 
																<th>标本种类</th>
															</tr> 
														</thead> 
							            				<tbody> 
							            ";
	                                } else {
	                                	//calculate the date_diff based on last alldata
	                                	$all_datediff = abs(strtotime($newhead_caiyangshijian) - strtotime($head_caiyangshijian));
	                                	$years = floor($all_datediff / (365*60*60*24));
										$months = floor(($all_datediff - $years * 365*60*60*24) / (30*60*60*24));
										$days = floor(($all_datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	                                }

	                                //#100: strong: 姓名、卡号、病员号、年龄（误差1年），性别都相同
	                                if($newhead_bingyuanhao == $findall_bingyuanhao && $newhead_kahao == $findall_kahao && ABS($newhead_birthyear-$head_birthyear)<=1 ){
	                                	$status = "";
	                                	$last_caiyangshijian = $newhead_caiyangshijian;
	                                }else if(ABS($newhead_birthyear-$head_birthyear)<=1){
	                               	//#200: yello warning: 姓名、年龄（误差1年）、性别相同；病员号、卡号不相同
	                                	$status = "warning";
	                                	$last_caiyangshijian = $newhead_caiyangshijian;
	                                }else if(ABS($newhead_birthyear-$head_birthyear)<=3){
	                                //#300: red warning: 姓名相同；年龄相差1年以上，3年以下、性别相同；病员号、卡号不相同
	                                	$status = "danger";
	                                	$last_caiyangshijian = $newhead_caiyangshijian;
	                                }else{
	                                	$status = "notmatch";
	                                }

	                                if($status!="notmatch"){
	                                $realtotal++;
	                            	echo "<tr class='".$status."'>
													<td>".$newhead_caiyangshijian."</td> 
													<td>".$newhead_jianyanriqi."</td> 
													<td>".$newhead_xingming."</td> 
													<td>".$newhead_bingyuanhao."</td> 
													<td>".$newhead_kahao."</td> 
													<td>".$newhead_age."</td>
													<td>".$newhead_xingbie."</td> 
													<td>".$newhead_kebie."</td> 
													<td>".$newhead_IgG."</td>
													<td>".$newhead_IgM."</td> 
													<td>".$newhead_zhenduan."</td> 
													<td>".$newhead_biaobenzhonglei."</td>
													<td>".$years."年".$months."月".$days."天</td>
													
												</tr> 			
		                            ";
		                        	}

		                        	if ($i == $headtotal){
			                        	echo "</tbody>
													</table>
													<div class='panel-heading' style='background:#F7DC6F'>------------------------------------IgG+IgM检验 共: ".$realtotal." 条------------------------------------</div>
							            		</div> 
							            	</td>
							        	</tr>
							        	";
			                        }
			                        $i++;



                        		}

                        	}

                            
                            if($total>1) {
                            	//count the all data number
                            	$i = 1;
                            	$realtotal = 0;
                            	//$total = mysqli_num_rows($allresult);
                            	while ($allrow= mysqli_fetch_array($allresult,MYSQLI_BOTH)) {

	                                $all_caiyangshijian = $allrow['采样时间'];
	                                	$y = date('Y',strtotime($all_caiyangshijian));
	                                $all_jianyanriqi = $allrow['检验日期'];
	                                $all_xingming = $allrow['姓名'];
	                                $all_bingyuanhao = $allrow['病员号'];
	                                $all_kahao = $allrow['卡号'];
	                                $all_nianling = $allrow['年龄'];
	                                	//birthyear 
	                                	$all_birthyear = $y - $all_nianling;
	                                $all_xingbie = $allrow['性别'];
	                                $all_kebie = $allrow['科别'];
	                                $all_xiangmudaima = $allrow['项目代码'];
	                                $all_cedingjieguo = $allrow['测定结果'];
	                                $all_zhenduan = $allrow['诊断'];
	                                $all_biaobenzhonglei = $allrow['标本种类'];
	                                $all_RID = $allrow['RID'];

	                                if($i == 1){
	                                	//calculate the date_diff based on headdata
	                                	$all_datediff = abs(strtotime($all_caiyangshijian) - strtotime($head_caiyangshijian));
	                                	$years = floor($all_datediff / (365*60*60*24));
										$months = floor(($all_datediff - $years * 365*60*60*24) / (30*60*60*24));
										$days = floor(($all_datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	                                	
	                                	echo "
				                           	<tr >
							            	<td colspan='12' class='hiddenRow'>
							            		<div class='".$head_RID." accordian-body collapse' id='".$head_RID."'>
							            			<div class='panel-heading' style='background:#F7DC6F'>------------------------------------其他系列检验------------------------------------</div>
							            			<table class='table table-hover'> 
							            				<thead> 
															<tr> 
																<th>采样时间</th>
																<th>检验日期</th>
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
																<th>距上次检验</th>
																<th>差值</th>
															</tr> 
														</thead> 
							            				<tbody> 
							            ";
	                                } else {
	                                	//calculate the date_diff based on last alldata
	                                	$all_datediff = abs(strtotime($all_caiyangshijian) - strtotime($last_caiyangshijian));
	                                	$years = floor($all_datediff / (365*60*60*24));
										$months = floor(($all_datediff - $years * 365*60*60*24) / (30*60*60*24));
										$days = floor(($all_datediff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
	                                }


	                                //#100: strong: 姓名、卡号、病员号、年龄（误差1年），性别都相同
	                                if($all_bingyuanhao == $findall_bingyuanhao && $all_kahao == $findall_kahao && ABS($all_birthyear-$head_birthyear)<=1 ){
	                                	$status = "";
	                                	$last_caiyangshijian = $all_caiyangshijian;
	                                }else if(ABS($all_birthyear-$head_birthyear)<=1){
	                               	//#200: yello warning: 姓名、年龄（误差1年）、性别相同；病员号、卡号不相同
	                                	$status = "warning";
	                                	$last_caiyangshijian = $all_caiyangshijian;
	                                }else if(ABS($all_birthyear-$head_birthyear)<=3){
	                                //#300: red warning: 姓名相同；年龄相差1年以上，3年以下、性别相同；病员号、卡号不相同
	                                	$status = "danger";
	                                	$last_caiyangshijian = $all_caiyangshijian;
	                                }else{
	                                	$status = "notmatch";
	                                }
	                                
	                                if($status!="notmatch"){
	                                $realtotal++;
	                            	echo "<tr class='".$status."'>
													<td>".$all_caiyangshijian."</td> 
													<td>".$all_jianyanriqi."</td> 
													<td>".$all_xingming."</td> 
													<td>".$all_bingyuanhao."</td> 
													<td>".$all_kahao."</td> 
													<td>".$all_nianling."</td>
													<td>".$all_xingbie."</td> 
													<td>".$all_kebie."</td> 
													<td>".$all_xiangmudaima."</td>
													<td>".$all_cedingjieguo."</td> 
													<td>".$all_zhenduan."</td> 
													<td>".$all_biaobenzhonglei."</td>
													<td>".$years."年".$months."月".$days."天</td>
													

												</tr> 			
		                            ";
		                        	}

			                        if ($i == $total){
			                        	echo "</tbody>
													</table>
													<div class='panel-heading' style='background:#F7DC6F'>------------------------------------其他系列检验 共: ".$realtotal." 条------------------------------------</div>
							            		</div> 
							            	</td>
							        	</tr>
							        	";
			                        }
			                        $i++;
		                        }
                            }
                        }
                    }

    ?>

	</tbody> 
</table>


</div>
</div>
</div>
</div>
</body>
</html>
