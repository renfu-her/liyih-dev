<?php
include "../include/check_all.php";//檢查登入權限和使用者是否被凍結
include "../common.func.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?PHP
$edit_no=	$_POST["edit_no"];//傳回修改的編號
$name 		=	$_POST["name"];
$name_en 	=	$_POST["name_en"];
$content	=	$_POST["content"];
$content_en	=	$_POST["content_en"];

//有無設排序

if ( isset($_POST["sort"]) && $_POST["sort"] != '' ) { $sort   	=	$_POST["sort"]; }
else { $sort = '0'; }


//發布狀態：有勾選傳回:1
if ( isset($_POST["hide"]) && $_POST["hide"] != '' ) { $hide = '1'; }
else { $hide = '0'; }

$sql="UPDATE `abouts` SET 
`abouts_name` =:name,
`abouts_name_en` =:name_en,
`abouts_hide` =:hide,
`abouts_content` =:content,
`abouts_content_en` =:content_en
WHERE `abouts_no` =:edit_no ;";

$result = $db->prepare("$sql");//防sql注入攻擊
// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
	$result->bindValue(':name', $name, PDO::PARAM_STR);
	$result->bindValue(':name_en', $name_en, PDO::PARAM_STR);
	$result->bindValue(':hide', $hide, PDO::PARAM_INT);
	$result->bindValue(':content', $content, PDO::PARAM_STR);
	$result->bindValue(':content_en', $content_en, PDO::PARAM_STR);
	$result->bindValue(':edit_no', $edit_no, PDO::PARAM_INT);
	$result->execute();

$db = null;// 關閉連線
?>
<script language="javascript">
 location.href= ('./index.php?msg=updata');
</script>





