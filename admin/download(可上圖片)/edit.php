<?PHP
if (!isset($_SESSION)) {
 	 session_start();
}
include "../include/check_all.php";//檢查登入權限和使用者是否被凍
include "../common.func.php";

$edit_no	=	$_GET['no'];

$sql="SELECT * 
FROM `download` 
where download_no=:edit_no;";

$result = $db->prepare("$sql");//防sql注入攻擊
// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
$result->bindValue(':edit_no', $edit_no, PDO::PARAM_INT);
$result->execute();
$rows = $result->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>後台管理系統</title>  
<?PHP include '../include_head.php';?> 
<!-- 表單css -->
<link rel="stylesheet" href="/admin/style_form.css">  
</head>
<body class="hold-transition skin-blue sidebar-mini">
<?PHP include '../phpinclude_body.php';?>
<div class="wrapper">
<?PHP include '../head.php';?> 
  <!-- Left side column. contains the logo and sidebar -->
<?PHP include '../menu.php';?> 
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">  
</section>
<!-- Main 內容開始 -->
<section class="content">
  <div class="row">
    <div class=" col-xs-12 col-md-12 col-sm-12 col-xs-12">
      <div class="info-box txt_main">
<div class="box-header txt_12"><span>|| 後台管理介面 > 修改</span><span></span>檔案下載</div>
<span class="txt_12_red">
        <?PHP 
		//取得資料新增修改刪除狀態
		if(isset($_GET['msg'])){
			$msg	= $_GET['msg'];
			switch($msg){
				case 'add':
					echo $msg='【資料狀態】：&nbsp;&nbsp;新增成功';
				break;
				case 'updata':
					echo $msg='【資料狀態】：&nbsp;&nbsp;修改成功';
				break;
				case 'del':
					echo $msg='【資料狀態】：&nbsp;&nbsp;刪除成功';
				break;
	}		
}
		?>
 </span>
<form  class="form-horizontal" method="post" action="./edit_ok.php" name="form"  id="form" data-toggle="validator" enctype="multipart/form-data">
<div class="text-center txt_title"><strong><span class="form-group">
  <input type="hidden" name="edit_no" value="<?=$edit_no?>">
</span>修改檔案下載</strong></div>
<div class="box-body">
  <div class="form-group">
   		<label class="col-md-2 control-label">語系：</label>
    	<div class="col-md-10">       
    	<select name="class" id="class" required data-error="請選擇類別" >
                
                   <option value="中文版" <?PHP if($rows["download_class"]=='中文版') echo 'selected';?>>中文版</option>
                   <option value="英文版" <?PHP if($rows["download_class"]=='英文版') echo 'selected';?>>英文版</option>
               </select>
    	<div class="help-block with-errors"></div>
   	 	</div>
     </div>
	 <div class="form-group">
   		<label class="col-md-2 control-label">標題：</label>
    	<div class="col-md-10">       
    	<input name="title"  id="title" type="text"  value="<?=$rows["download_title"]?>"  required="required" data-error="必須填寫標題" />
    	<div class="help-block with-errors"></div>
   	 	</div>
     </div>	
     
   
    
   
     <div class="form-group">
   		<label class="col-md-2 control-label">目前封面圖片：</label>
    	<div class="col-md-10 control-label" style="text-align: left">  
    	<?PHP if($rows["download_pic_s"]<>''){ ?>
    	<img src="../goods_pic/<?=$rows["download_pic_s"]; ?>"  height="150" border="1" class="img_Fillet"  onerror="this.src='../goods_pic/defpic.jpg'" >
       </br>
       	  
       
        <?PHP } 
			else{
			echo "無";
			}
		?>          
   	 	</div>
     </div>	
     <div class="form-group">
   		<label class="col-md-2 control-label">更換封面圖片：</label>
    	<div class="col-md-10">  
    	<!--預覽區塊-->
    	<label for="imgfile">
        	<img id="view_uppic" src="../images/view_uppic.jpg" class="view_uppic" /> 
        </label>		
      	<!--預覽區塊-->  
      	<span class="txt_12_red">建議尺寸:450x620pix</span> 
    	<input name="imgfile" type="file" id="imgfile" size="40" onChange="chkfile(this);" accept="image/gif, image/jpeg, image/png"/>
    	<div class="help-block with-errors"></div>
   	 	</div>
     </div>	
     <div class="form-group">
   		<label class="col-md-2 control-label">更換上傳PDF檔案：</label>
    	<div class="col-md-10">       
			<div style="top:7px;position: relative; margin-bottom: 20px;" > <a href="../../upload/<?=$rows["download_file"]; ?>" target="_blank" class="label label-primary txt_16 a_movetop">目前檔案：<?=$rows["download_file"]; ?></a> </div>
    	<input name="uploadedfile" type="file" id="uploadedfile" size="40"  />
    	<!--<span class="txt_12_red">伺服器最大上傳檔案為 <?=ini_get('upload_max_filesize')?></span> -->
    	<div class="help-block with-errors"></div>
   	 	</div>
     </div>
    <div class="form-group">
   		<label class="col-md-2 control-label">是否發佈：</label>
    	<div class="col-md-10">    
    	 <label for="hide" style="cursor:pointer">
			<input name="hide" type="checkbox" id="hide" value="1" <?PHP if($rows["download_hide"]==1) echo 'checked'; ?> class="input_checkbox" ><span class="txt_12_gl1" style="position: relative; bottom: 7px;">說明：勾選後才會正式對外發佈</span>
		</label>
			<div class="help-block with-errors"></div>
   	 	</div>
     </div>	
 
      
     <!--按鈕-->
     <div  >
    	<div class="col-xs-6 text-right"> 
     		<input type="submit" name="Submit2" value="送出" class="btn btn-info btn_bt" />
        </div> 
        <div class="col-xs-6 text-left"> 
     		<input type="button" value="返回" class="btn btn-default btn_bt"  onclick="location.href='./index.php'"/>
        </div> 
     </div>
     <!--按鈕-->
</div>



</form>



 
  
       
      </DIV>
    </DIV>
  </DIV>
</section>
<!-- Main 內容結束 -->

</div>
<!-- /.content-wrapper -->
<?PHP include '../footer.php';?> 
<?PHP include '../include_js.php';?>  

<!--引用 Validator-->
<script src="../js/validator.min.js"></script>

<!--執行 Validator-->
<script>
$('#form').validator().on('submit', function(e) {
if (e.isDefaultPrevented()) { // 未驗證通過 則不處理
return;
} else { // 通过后，送出表单
//alert("已送出表單");
}
//e.preventDefault();  防止原始 form 提交表单
});
</script>
<!--預覽區塊-->	
		<script>  
		 $('#imgfile').change(function() {
		  var file = $('#imgfile')[0].files[0];
		  var reader = new FileReader;
		  reader.onload = function(e) {
			$('#view_uppic').attr('src', e.target.result);
		  };
		  reader.readAsDataURL(file);
		});
		</script>  
<!--預覽區塊--> 
<!--表單避免重複發送-->
 <script>
    // 取得表單元素
    const form = document.querySelector('form');
    const submitBtn = form.querySelector('[type="submit"]');

    // 禁用送出按鈕
   form.addEventListener('submit', (e) => {
   e.preventDefault();
	  if (!form.checkValidity()) {
		// 如果表單未通過驗證，就不執行後續的程式碼
	  } else {
		submitBtn.disabled = true;
		submitBtn.value = '上傳中...';
		// 在這裡加入檔案上傳的程式碼
		form.submit(); // 手動送出表單
	  }
	});
</script>
<!--表單避免重複發送-->

</div> 
</body>
</html>
