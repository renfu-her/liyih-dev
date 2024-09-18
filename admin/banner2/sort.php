<?PHP 

include "../include/check_all.php";//檢查登入權限和使用者是否被凍結

include "../common.func.php";

?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?PHP
//取出資料庫中no的最大值
$sql="
SELECT MAX(banner2_no) FROM `banner2` 
";

$result = $db->prepare("$sql");//防sql注入攻擊
// 數值PDO::PARAM_INT  字串PDO::PARAM_STR

$result->execute();
$rows = $result->fetch(PDO::FETCH_ASSOC);
$max_no = $rows["MAX(banner2_no)"];//取出資料庫中no的最大值;
//取出資料庫中no的最大值

//跑回圈抓取回傳的編號對應的值

for ($no=1;$no<=$max_no;$no++){

	$banner2_sort=$_POST["$no"];

	//echo '編號'.$no.'值等於='.$sort.'<br>';
	
	$sql="UPDATE `banner2` SET 
	`banner2_sort` =:banner2_sort
	WHERE `banner2_no` =:no ;";

	$result = $db->prepare("$sql");//防sql注入攻擊
	// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
	$result->bindValue(':banner2_sort', $banner2_sort, PDO::PARAM_INT);
	$result->bindValue(':no', $no, PDO::PARAM_INT);
	$result->execute();

	}

$db = null;// 關閉連線
?>
<script language="javascript">

 location.href= ('./index.php?msg=updata');

</script>
