<?PHP
if (!isset($_SESSION)) {
 	 session_start();
}
include "../include/check_all.php";//檢查登入權限和使用者是否被凍
include "../common.func.php";

$edit_no	=	$_GET['no'];

$sql="SELECT * 
FROM `news` 
where news_no=:edit_no;";

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
<div class="box-header txt_12"><span>|| 後台管理介面 > 修改訊息公告</span>
</div>
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
<form  class="form-horizontal" method="post" action="edit_ok.php" name="form"  id="form" data-toggle="validator" enctype="multipart/form-data">
<div class="text-center txt_title"><strong>修改訊息公告  
    	<input type="hidden" name="edit_no" value="<?=$edit_no?>">   </strong></div>
<div class="box-body">
	 <div class="form-group">
   		<label class="col-md-2 control-label">標題：</label>
    	<div class="col-md-10">       
    	<input name="title"  id="title" type="text"  value="<?=$rows["news_title"]; ?>"  required="required" data-error="必須填寫標題" />
    	<div class="help-block with-errors"></div>
   	 	</div>
     </div>	
     <div class="form-group">
   		<label class="col-md-2 control-label">標題(Title)：</label>
    	<div class="col-md-10">       
    	<input name="title_en"  id="title_en" type="text"  value="<?=$rows["news_title_en"]; ?>"  required="required" data-error="必須填寫標題(Title)" />
    	<div class="help-block with-errors"></div>
   	 	</div>
     </div>	
    <div class="form-group">
   		<label class="col-md-2 control-label">目前圖片：</label>
    	<div class="col-md-10 control-label" style="text-align: left">      	
    	<img src="../goods_pic/<?=$rows["news_pic_s"]; ?>"  height="150" border="1" class="img_Fillet"  onerror="this.src='../goods_pic/defpic.jpg'" >      
   	 	</div>
     </div>	
     <div class="form-group">
   		<label class="col-md-2 control-label">更換圖片：</label>
    	<div class="col-md-10">    
    	<!--預覽區塊-->
    	<label for="imgfile">
        	<img id="view_uppic" src="../images/view_uppic.jpg" class="view_uppic" /> 
        </label>		
      	<!--預覽區塊-->    
      	<span class="txt_12_red">建議尺寸:550x340pix</span> 
			<input name="imgfile" type="file" id="imgfile" onChange="chkfile(this);" accept="image/gif, image/jpeg, image/png"  />   
			<div class="help-block with-errors"></div>
   	 	</div>
     </div>	
    

    
     <div class="form-group">
   		<label class="col-md-2 control-label">是否發佈：</label>
    	<div class="col-md-10">    
    	 <label for="ckpost"  style="cursor:pointer">
			<input name="ckpost" type="checkbox" id="ckpost" value="1" <?PHP if($rows["news_ckpost"]==1) echo 'checked'; ?> class="input_checkbox" ><span class="txt_12_gl1" style="position: relative; bottom: 7px;">說明：勾選後才會正式對外發佈</span>
		</label>
			<div class="help-block with-errors"></div>
   	 	</div>
     </div>	
     <div class="form-group">
   		<label class="col-md-2 control-label">內容：</label>
    	<div class="col-md-10"> 
    	 <textarea name="content" id="content"><?=$rows["news_content"]; ?></textarea>
   	 	</div>
     </div>
     <div class="form-group">
   		<label class="col-md-2 control-label">內容(Content)：</label>
    	<div class="col-md-10"> 
    	 <textarea name="content_en" cols="5" id="content_en"><?=$rows["news_content_en"]; ?></textarea>
   	 	</div>
     </div>
     
     <!--按鈕-->
     <div  >
    	<div class="col-xs-6 text-right"> 
     		<input type="submit" name="Submit2" value="儲存修改" class="btn btn-info btn_bt" />
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

<script type="text/javascript">
$(document).ready(function(){
//  $("#title").focus();
});
</script>

<!--檢查上傳檔案-->
<?PHP include '../include/chkfile_size.php';?> 
<!--檢查上傳檔案-->

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

<!-- 啟用 tinymce--> 
<script src="/tiny_mce/tinymce.min.js"></script>
<script>
tinymce.init({
    selector: "#content,#content_en",
    height: '300px',
	//selector: "#textarea,#textarea2",//單獨選擇id
    theme : "modern",
	fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
    language : "zh_TW" ,
    plugins: [
    "advlist autolink lists link image charmap print preview anchor colorpicker textcolor lineheight",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste jbimages youTube",
  ],
	

  toolbar: "insertfile undo redo | styleselect | bold italic strikethrough forecolor backcolor | fontselect | fontsizeselect | lineheightselect | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages youTube | code",
  relative_urls: false
});
	
</script>
<!-- 啟用 tinymce--> 
</div> 
</body>
</html>
