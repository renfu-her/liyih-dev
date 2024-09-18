<?php
include "../include/check_all.php";//檢查登入權限和使用者是否被凍結
include "../common.func.php";

$del_no	=	$_GET['no'];
$uppics_class = 'goods';//所屬類別

$bpic		=	$_GET['bpic'];//大圖
$spic		=	$_GET['spic'];//小圖
$file="../goods_pic/".$bpic;

  if(is_file($file)){
    unlink($file);
    //echo "{$file}刪除大圖成功!"."<BR>";
  //}else{
   // echo "{$file}大圖檔案不存在!"."<BR>";
  }


$file_s="../goods_pic/".$spic;
  if(is_file($file_s)){
    unlink($file_s);
 //   echo "{$file_s}刪除小圖成功!"."<BR>";
 // }else{
 //   echo "{$file_s}小圖檔案不存在!"."<BR>";
  }


//刪除多圖內的圖片
	$sql_pic="SELECT * FROM `uppics` WHERE `uppics_ing` = :del_no AND  `uppics_class` =  :uppics_class";//	
	$result_pic = $db->prepare("$sql_pic");//防sql注入攻擊
	// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
	
	$result_pic->bindValue(':uppics_class', $uppics_class, PDO::PARAM_STR);
	$result_pic->bindValue(':del_no', $del_no, PDO::PARAM_INT);
	$result_pic->execute();
	$counts_pic=$result_pic->rowCount();//算出總筆數	

	if($counts_pic<>0){//如果判斷結果有值才跑回圈抓
    while($rows_pic = $result_pic->fetch(PDO::FETCH_ASSOC)) 
{ 
	//刪除資料庫
	$sql="DELETE FROM uppics  WHERE `uppics_ing` = :del_no AND  `uppics_class` =  :uppics_class";

	$result = $db->prepare("$sql");//防sql注入攻擊
	// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
	
	$result->bindValue(':uppics_class', $uppics_class, PDO::PARAM_STR);
	$result->bindValue(':del_no', $del_no, PDO::PARAM_INT);
	$result->execute();
	
	//刪除資料庫

	 //刪除圖片	
	 $uppics_pic_b=$rows_pic["uppics_pic_b"];
	 $uppics_pic_s=$rows_pic["uppics_pic_s"];
		
		$file="../goods_pic/".$uppics_pic_b;
		  if(is_file($file)){
		  unlink($file);
		  }
		  
		$file="../goods_pic/".$uppics_pic_s;
		  if(is_file($file)){
		  unlink($file);
		  }
	  //刪除圖片   
}
}
//刪除多圖內的圖片



$sql="DELETE FROM goods_item WHERE goods_item_no =:del_no;";

$result = $db->prepare("$sql");//防sql注入攻擊
// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
$result->bindValue(':del_no', $del_no, PDO::PARAM_INT);
$result->execute();

$db = null;// 關閉連線
?>
<script language="javascript">
	location.href= ('./index.php?msg=del');
</script>
