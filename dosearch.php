<!DOCTYPE html>
<html lang="en">

<?php
	session_start();
    //include_once "header.php";

    require "class.connect.php";
    $connect = new connect();
    $conn = $connect->getConnect("his");
    if(!$conn) { echo "failed to connect!";}
        
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

	//search IgG+IgM
    if(isset($_POST["IgG"]) && isset($_POST["IgGChange"]) && isset($_POST["IgM"]) && isset($_POST["IgMChange"])){

    	//IgG+IgM持续阴性
    	if($_POST["IgG"]== "0-阴性" && $_POST["IgGChange"] == "持续" && $_POST["IgM"]== "0-阴性" && $_POST["IgMChange"] == "持续" ){
	        $getresult = $conn-> prepare("SELECT *
				FROM
				(
				(SELECT a1.*
				FROM headdata a1, headdata a2
				WHERE a1.姓名=a2.姓名
				AND a1.采样时间<a2.采样时间
				AND (a1.IgG= ? AND a2.IgG = ?))
				UNION 
				(SELECT a3.*
				FROM headdata a3, headdata a4
				WHERE a3.姓名=a4.姓名
				AND a3.采样时间<a4.采样时间
				AND (a3.IgM= ? AND a4.IgM = ?))
				) as s
				GROUP BY 姓名
				HAVING 采样时间 = min(采样时间)
				"); 
	        $a = "0";
	        $getresult->bind_param("ssss",$a,$a,$a,$a);
    	}
    	//IgG+IgM持续阳性
    	if(($_POST["IgG"]== "1-阳性" OR $_POST["IgG"]== "2-弱阳性") && $_POST["IgGChange"] == "持续" && ($_POST["IgM"]== "1-阳性" OR $_POST["IgM"]== "2-弱阳性") && $_POST["IgMChange"] == "持续" ){
	        $getresult = $conn-> prepare("SELECT *
				FROM
				(
				(SELECT a1.*
				FROM headdata a1, headdata a2
				WHERE a1.姓名=a2.姓名
				AND a1.采样时间<a2.采样时间
				AND (a1.IgG IN (?,?)) AND (a2.IgG IN (?,?))
				) 
				UNION 
				(SELECT a3.*
				FROM headdata a3, headdata a4
				WHERE a3.姓名=a4.姓名
				AND a3.采样时间<a4.采样时间
				AND (a3.IgG IN (?,?)) AND (a4.IgG IN (?,?)) 
				)
				) as s
				GROUP BY 姓名
				HAVING 采样时间 = min(采样时间)
				"); 
	        $a = "1"; 
	        $b = "2";
	        $getresult->bind_param("ssssssss",$a,$b,$b,$a,$a,$b,$b,$a);
    	}

			$getresult->execute();
            $headresult = $getresult->get_result();
            if($headresult){
            	while($row = mysqli_fetch_array($headresult, MYSQLI_BOTH)){
                	$name = $row['姓名'];
                	echo "$name";
                }
            }

    }



    //search 个人信息

    //search 日期范围

    //search 年龄性别

    //search 科别项目


?>
</html>