<?PHP
if (!isset($_SESSION)) {
 	 session_start();
}
include "../include/check_all.php";//檢查登入權限和使用者是否被凍
include "../common.func.php";
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
<div class="box-header txt_12"><span>|| 後台管理介面 > 新增檔案下載</span><span class="txt_12_red"></span>
</div><form  class="form-horizontal" name="form1" method="post" action="./add_ok.php" id="form" data-toggle="validator"  enctype="multipart/form-data">
<div class="text-center txt_title"><strong>新增檔案下載</strong></div>
<div class="box-body">
 <div class="form-group">
   		<label class="col-md-2 control-label">語系：</label>
    	<div class="col-md-10">       
    	<select name="class" id="class" required data-error="請選擇類別" >
                   <option value="" selected>請選擇</option>
                   <option value="中文版">中文版</option>
                   <option value="英文版">英文版</option>
               </select>
    	<div class="help-block with-errors"></div>
   	 	</div>
     </div>
	 <div class="form-group">
   		<label class="col-md-2 control-label">標題：</label>
    	<div class="col-md-10">       
    	<input name="title"  id="title" type="text"  value=""  required="required" data-error="必須填寫標題" />
    	<div class="help-block with-errors"></div>
   	 	</div>
     </div>
    
    

      <div class="form-group">
   		<label class="col-md-2 control-label">上傳PDF檔案：</label>
    	<div class="col-md-10">       
    	
    	<input name="uploadedfile" type="file" id="uploadedfile" size="40"  required="required" accept=".pdf"/>
    	<!--<span class="txt_12_red">伺服器最大上傳檔案為 <?=ini_get('upload_max_filesize')?></span> -->
    	<div class="help-block with-errors"></div>
   	 	</div>
     </div>
    <div class="form-group">
   		<label class="col-md-2 control-label">是否發佈：</label>
    	<div class="col-md-10">    
    	 <label for="hide" style="cursor:pointer">
			<input name="hide" type="checkbox" id="hide" value="1" checked class="input_checkbox" ><span class="txt_12_gl1" style="position: relative; bottom: 7px;">說明：勾選後才會正式對外發佈</span>
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
