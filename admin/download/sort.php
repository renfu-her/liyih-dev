<?PHP 

include "../include/check_all.php";//檢查登入權限和使用者是否被凍結

include "../common.func.php";

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?PHP
//取出資料庫中no的最大值
$sql="
SELECT MAX(download_no) FROM `download` 
";

$result = $db->prepare("$sql");//防sql注入攻擊
// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
$result->execute();
$rows = $result->fetch(PDO::FETCH_ASSOC);
$max_no = $rows["MAX(download_no)"];//取出資料庫中no的最大值;
//取出資料庫中no的最大值

//取出資料庫中no的最小值
$sql="
SELECT MIN(download_no) FROM `download` 
";
$result = $db->prepare("$sql");//防sql注入攻擊
// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
$result->execute();
$rows = $result->fetch(PDO::FETCH_ASSOC);
$min_no = $rows["MIN(download_no)"];//取出資料庫中no的最小值


//跑回圈抓取回傳的編號對應的值
for ($no=$min_no;$no<=$max_no;$no++){
	$ck_no='ck_'.$no;
	$download_sort_ck	=	$_POST["$ck_no"];//取原本資料庫的值
	$download_sort	=	$_POST["$no"];//取設定的值
	
	if($download_sort_ck<>$download_sort){//如果原值和傳遞值不同，代表排序有變，則更新排序
	//echo '編號'.$no.'-'.$ck_no.'值等於='.$download_sort.'原值='.$download_sort_ck.'<br>';
		$sql="UPDATE `download` SET 
	`download_sort` =:download_sort
	WHERE `download_no` =:no ;";

	$result = $db->prepare("$sql");//防sql注入攻擊
	// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
	$result->bindValue(':download_sort', $download_sort, PDO::PARAM_INT);
	$result->bindValue(':no', $no, PDO::PARAM_INT);
	$result->execute();
	}
}

$db = null;// 關閉連線
?>
<script language="javascript">

 location.href= ('./index.php?msg=updata');

</script>
