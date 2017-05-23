<?php  
session_start();
date_default_timezone_set('Asia/Shanghai');

require "class.connect.php";
$connect = new connect();
$conn = $connect->getConnect("his");

if ($_FILES["uploadcsv"]["size"] > 0) { 

    //get the csv file 
    $file = $_FILES["uploadcsv"]["tmp_name"]; 
    $handle = fopen($file,"r"); 

    //remove first line
    $line = fgetcsv($handle, 1000, ",");
    $row = 0;
    while(($line = fgetcsv($handle, 1000, ",")) !== FALSE){
        $row++;

        $date = strtotime($line[0]);
        $new = $conn->prepare("
                    INSERT alldata SET 
                    检验日期 = ?,
                    样本号 = ?,
                    病人类型 = ?,
                    病员号 = ?,
                    卡号 = ?,
                    姓名 = ?,
                    年龄 = ?,
                    性别 = ?,
                    科别 = ?,
                    病区 = ?,
                    床号 = ?,
                    项目代码 = ?,
                    测定结果 = ?,
                    年龄单位 = ?,
                    诊断 = ?,
                    病人特征 = ?,
                    标本说明 = ?,
                    标本种类 = ?,
                    付费类别 = ?,
                    送检医生代码 = ?,
                    送检医生姓名 = ?,
                    检验医生代码 = ?,
                    检验医生姓名 = ?,
                    审核医生代码 = ?,
                    审核医生姓名 = ?,
                    架杯位置 = ?,
                    HighLowFlag = ?,
                    TechNo = ?,
                    采样时间 = ?,
                    接受时间 = ?,
                    审核时间 = ?,
                    RID = ?
                    ;
                    ");
        $rid = "";
        $date = date('y-m-d h:i:s', $date);
        $new->bind_param("sissssssssssssssssssssssssssssss",
            $date,
            $line[1],
            $line[2],
            $line[3],
            $line[4],
            $line[5],
            $line[6],
            $line[7],
            $line[8],
            $line[9],
            $line[10],
            $line[11],
            $line[12],
            $line[13],
            $line[14],
            $line[15],
            $line[16],
            $line[17],
            $line[18],
            $line[19],
            $line[20],
            $line[21],
            $line[22],
            $line[23],
            $line[24],
            $line[25],
            $line[26],
            $line[27],
            $line[28],
            $line[29],
            $line[30],
            $rid
            );

        $new->execute();

    }

    fclose($handle);
}

//redirect 
$_SESSION['rowadded']=$row;
header('Location: uploadcsv.php?success=1'); die; 



?> 
