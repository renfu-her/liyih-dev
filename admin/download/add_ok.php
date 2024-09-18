<?PHP
include "../include/check_all.php";//檢查登入權限和使用者是否被凍結
include "../common.func.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?PHP
$title 			=	$_POST["title"];
$class			=	$_POST["class"];

$sort	=	'0';
$edituser   =	$_SESSION["id"];//發布者
$edittime   =	date("Y-m-d H:i:s");//新增時間


//發布狀態：有勾選傳回:1
if ( isset($_POST["hide"]) && $_POST["hide"] != '' ) { $hide = '1'; }
else { $hide = '0'; }





if($_FILES['uploadedfile']['name']<>''){
//上傳檔案

//上傳到的地點(請已"/"結束)
$upload_path = '../../upload/';

//可接受的最大檔案大小(單位: bytes)
//不設代表可以接受任意大小
$max_size = '';

/* 上傳程序開始 */

//檢查是否有錯誤
if(isset($_FILES['uploadedfile']) && sizeof($_FILES['uploadedfile']) > 0)
{
if($_FILES['uploadedfile']['error'] > 0)
{
//發生錯誤
//錯誤代碼資訊可以上php官網看:
//http://tw.php.net/manual/en/features.file-upload.errors.php
echo '上傳錯誤代碼: ' . $_FILES['uploadedfile']['error'] . '<br />';
exit;
}

//是否有限制檔案大小?
if(($max_size > 0) && ($_FILES['uploadedfile']['size'] > $max_size))
{
//檔案過大
echo '您上傳的檔案大小大於系統可接受的範圍<p>';
echo '<input type="button" class="input" style="CURSOR:hand; height:25px; width:100px;" onclick="history.back()" value="Back" />';
exit;
}

//檢查檔案是否已存在
if(file_exists($upload_path . basename($_FILES['uploadedfile']['name'])))
{
echo '檔案已存在,請重新選擇上傳檔案<p>';
echo '<input type="button" class="input" style="CURSOR:hand; height:25px; width:100px;" onclick="history.back()" value="Back" />';
exit;
}

//檢查目錄是否存在, 不存在的話新增一個
if(!is_dir($upload_path) && !mkdir($upload_path))
{
//目錄不存在, 無法新增資料夾
echo '系統無法新增資料夾';
exit;
}

//移動已上傳的檔案
move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $upload_path . basename($_FILES['uploadedfile']['name']));

$file_name=basename($_FILES['uploadedfile']['name']);//檔案名稱
}
//上傳檔案
}


//新增使用者
$sql="insert into download (	
download_title,
download_file,
download_sort,
download_class,
download_hide,
download_edituser,
download_edittime
)	VALUES (
:title,
:file_name,
:sort,
:class,
:hide,
:edituser,
:edittime
)";

	$result = $db->prepare("$sql");//防sql注入攻擊
	// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
	$result->bindValue(':title', $title, PDO::PARAM_STR);
	$result->bindValue(':file_name', $file_name, PDO::PARAM_STR);
	$result->bindValue(':sort', $sort, PDO::PARAM_INT);
	$result->bindValue(':class', $class, PDO::PARAM_STR);
	$result->bindValue(':hide', $hide, PDO::PARAM_INT);


	$result->bindValue(':edittime', $edittime, PDO::PARAM_STR);
	$result->bindValue(':edituser', $edituser, PDO::PARAM_STR);


	$result->execute();


$db = null;// 關閉連線


?>
<script language="javascript">
location.href= ('./index.php?msg=add');
</script>





