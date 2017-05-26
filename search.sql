//query statement 

//1, search 病员号，卡号，姓名
SELECT * FROM alldata
WHERE 病员号=?;

SELECT * FROM alldata
WHERE 卡号=?;

SELECT * FROM alldata
WHERE 姓名=?;

//2, search 年龄，性别
SELECT * FROM alldata
WHERE (年龄>=? AND 年龄<=?) AND (性别 IN (?));

//3, search 日期范围
SELECT * FROM alldata
WHERE (检验日期>="2012-02-01" AND 检验日期<="2012-02-03");

//4, search 科别，项目代码，测定结果，诊断
SELECT * FROM alldata
WHERE 科别 LIKE "%脑外科%" AND 项目代码 LIKE "%ALB%" AND 
测定结果>="35" AND 测定结果<="43" AND
诊断 LIKE "%%" ;


//找到同一病人所有检验纪录
//tag病人identity with confidence level
//#100: strong: 姓名、卡号、病员号、年龄（误差1年），性别都相同
//#200: yello warning: 姓名、年龄（误差1年）、性别相同；病员号、卡号不相同
//#300: red warning: 姓名相同；年龄相差1年以上，3年以下、性别相同；病员号、卡号不相同

SELECT * FROM alldata
WHERE 姓名 LIKE "%陈荣祥%" 
AND 卡号 LIKE "%%" 
AND 病员号 LIKE "%%" 
AND ABS(年龄-"66")<=1
AND (性别 IN ("男"))
ORDER BY 检验日期;


//IgG+IgM
＃IgG转阳head
SELECT a1.姓名,a1.采样时间,a1.IgG
FROM headdata a1, headdata a2
WHERE a1.姓名=a2.姓名
AND a1.采样时间<a2.采样时间
AND ((a1.IgG="0" AND a2.IgG = "1") OR (a1.IgG="0" AND a2.IgG = "2"));

＃IgG转阴head
SELECT a1.姓名,a1.采样时间,a1.IgG
FROM headdata a1, headdata a2
WHERE a1.姓名=a2.姓名
AND a1.采样时间<a2.采样时间
AND ((a1.IgG="1" AND a2.IgG = "0") OR (a1.IgG="2" AND a2.IgG = "0"));


＃IgM转阳head
SELECT a1.姓名,a1.采样时间,a1.IgG
FROM headdata a1, headdata a2
WHERE a1.姓名=a2.姓名
AND a1.采样时间<a2.采样时间
AND ((a1.IgM="0" AND a2.IgM = "1") OR (a1.IgM="0" AND a2.IgM = "2"));

＃IgM转阴head
SELECT a1.姓名,a1.采样时间,a1.IgG
FROM headdata a1, headdata a2
WHERE a1.姓名=a2.姓名
AND a1.采样时间<a2.采样时间
AND ((a1.IgM="1" AND a2.IgM = "0") OR (a1.IgM ="2" AND a2.IgM = "0"));




