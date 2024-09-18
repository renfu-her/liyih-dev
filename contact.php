<?PHP
if (!isset($_SESSION)) {
 	 session_start();
}
$_SESSION["bt"]='5';
include "./admin/common.func.php";

$sql="SELECT * FROM `webinfo`";
$result = $db->prepare("$sql");//防sql注入攻擊
$result->execute();
$rows = $result->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="zh-Hant"><head>
<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Language" content="zh-tw">
	<meta name="keywords" content="<?=$rows["keywords"];?>" />
	<meta name="description" content="<?=$rows["description"];?>" />
	<meta name="company" content="<?=$rows["conpany"];?>" />
	<meta name="robots" content="all">
	<meta name="robots" content="index,follow">
	<meta name="distribution" content="Taiwan"/>
	<meta name="revisit-after" content="7 days"/>
	<meta name="rating" content="general"/>
	<meta property="og:title" content="<?=$rows["conpany"];?>"/>
	<meta property="og:description" content="<?=$rows["description"];?>"/>
	<meta property="og:type" content="website"/>
	<meta property="og:site_name" content="<?=$rows["conpany"];?>" />
	<meta property="og:image" content="https://<?=$_SERVER['HTTP_HOST']?>/admin/goods_pic/<?=$rows["share_pic"]; ?>"/>
	<link rel="image_src" href="https://<?=$_SERVER['HTTP_HOST']?>/admin/goods_pic/<?=$rows["share_pic"]; ?>" />	
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon" />
    <title><?=$rows["conpany"];?></title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- AOS core CSS -->
  <link href="vendor/aos/aos.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/main.css" rel="stylesheet">

<?PHP include 'include_head.php';?>	
</head>

<body>
<?PHP include 'include_body.php';?>
  <!-- Navigation -->
<?PHP include 'menu.php';?> 

  <header class="page-kv" style="background-image: url('img/img_contactkv.jpg');">
    <div class="kv-caption">
      <h3 class="font-weight-bold text-white text-shadow mb-0">與我聯絡</h3>
    </div>
  </header>

  <nav class="breadcrumb-row mb-md-5" aria-label="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">首頁</a></li>
        <li class="breadcrumb-item active" aria-current="page">與我聯絡</li>
      </ol>    
    </div>
  </nav>

  <!-- Content Section -->
  <section class="content mt-md-0" data-aos="fade-down" data-aos-delay="150" data-aos-duration="800">
    <div class="container">
      <div class="row no-gutters">
        <div class="col-12 bg-bluegradient mb-3">
          <div class="row align-items-center">
            <div class="col-md-8 col-12">
              <img src="img/bg_contactblock.png" class="img-fluid">
            </div>
            <div class="col-md-4 col-12">
              <ul class="list-unstyled">
                <li class="p-2" data-aos="fade-left" data-aos-easing="ease-in-out" data-aos-delay="700" data-aos-duration="1000" data-aos-anchor=".content">
                  <div class="d-flex flex-row align-items-center">
                    <img src="img/ic_contactblock01.png" class="img-fluid">
                    <h5 class="d-inline-block align-middle mb-0 pl-2 text-white">週一至週五 8:00~18:00</h5>  
                  </div>
                </li>
                <li class="p-2" data-aos="fade-left" data-aos-easing="ease-in-out" data-aos-delay="800" data-aos-duration="1000" data-aos-anchor=".content">
                  <div class="d-flex flex-row align-items-center">
                    <img src="img/ic_contactblock02.png" class="img-fluid">
                    <a href="tel:02-2201-4458" class="text-white"><h5 class="d-inline-block align-middle mb-0 pl-2 text-white">(02)2201-4458</h5></a>
                  </div>
                </li>
                <li class="p-2" data-aos="fade-left" data-aos-easing="ease-in-out" data-aos-delay="900" data-aos-duration="1000" data-aos-anchor=".content">
                  <div class="d-flex flex-row align-items-center">
                    <img src="img/ic_contactblock03.png" class="img-fluid">
                    <h5 class="d-inline-block align-middle mb-0 pl-2 text-white">(02)2203-0186</h5>
                  </div>
                </li>
                <li class="p-2" data-aos="fade-left" data-aos-easing="ease-in-out" data-aos-delay="1000" data-aos-duration="1000" data-aos-anchor=".content">
                  <div class="d-flex flex-row align-items-start">
                    <img src="img/ic_contactblock04.png" class="img-fluid">
                    <a href="https://goo.gl/maps/3EmoDoaVACzQFfN99" class="text-white" target="_blank"><h5 class="d-inline-block align-middle mb-0 pl-2 text-white">新北市新莊區民安東路180號1F</h5></a>  
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 mb-5 text-center">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3615.404534190627!2d121.43119611517422!3d25.020342044992383!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a7f0b18cae9b%3A0x3b8e9182f1be57ac!2zMjQy5paw5YyX5biC5paw6I6K5Y2A5rCR5a6J5p2x6LevMTgw6Jmf!5e0!3m2!1szh-TW!2stw!4v1679769043544!5m2!1szh-TW!2stw" width="100%" height="420" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>

    <div class="container-fluid pt-md-5" style="background-color: #f6f7f7;">
      <div class="row justify-content-center">
        <div class="col-12 py-5" id="form-anchor">
          <h3 class="page-title text-center mb-4" id="contactus">填寫表單</h3>
          <p class="text-lightdark text-center mb-4">請填寫以下資料，我們將有專人與您聯絡</p>
          
          <div class="form-content pb-5">
            <div class="row">
              <div class="col-md-8 col-12 mx-auto">
                <form class="contactform needs-validation"  action="send_contact.php" method="post" >
                  <div class="form-group">
                    <label for="contact_name" required>聯絡人</label>
                    <input type="text" class="form-control form-control-lg" id="contact_name" name="contact_name" required>
                  </div>
                  <div class="form-group">
                    <label for="contact_company" required>公司名稱</label>
                    <input type="text" class="form-control form-control-lg" id="contact_company" name="contact_company" required>
                  </div>
                  <div class="form-group">
                    <label for="contact_department" required>部門單位</label>
                    <input type="text" class="form-control form-control-lg" id="contact_department" name="contact_department" required>
                  </div>
                  <div class="form-group">
                    <label for="contact_tel" required>聯絡電話</label>
                    <input type="tel" class="form-control form-control-lg" id="contact_tel" name="contact_tel" required>
                  </div>
                  <div class="form-group">
                  <label for="contact_address">地址</label>
                  <input type="text" class="form-control form-control-lg" id="contact_address" name="contact_address" >
                  </div>
                  <div class="form-group">
                    <label for="contact_email" required>電子郵件</label>
                    <input type="email" class="form-control form-control-lg" id="contact_email" name="contact_email" required>
                  </div>
                  <div class="form-group">
                    <label for="contact_objects" required>詢問項目</label>
                    <select class="form-control form-control-lg" id="contact_objects" name="contact_objects" required>
                      <option value="" selected>請選擇</option>
                      <option value="產品諮詢">產品諮詢</option>
                      <option value="合作洽談">合作洽談</option>
                      <option value="批發諮詢">批發諮詢</option>
                      <option value="其他">其他</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="contact_message">內容</label>
                    <textarea class="form-control form-control-lg" id="contact_message"  name="contact_message"  rows="4"></textarea>
                  </div>
                  <div class="w-100 text-center mb-3">
                     <script src='https://www.google.com/recaptcha/api.js'></script>	   
						   <div class="g-recaptcha wow fadeInDown animated" data-sitekey="<?=$google_data_sitekey?>"></div>
                  </div>
  					
                  <button type="submit" class="btn btn-send btn-block py-md-3 py-2" value="Submit"><h3>送出</h3></button>
    
                </form>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </div>
  </section>

  <?PHP include 'footer.php';?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- AOS core JavaScript -->
  <script src="vendor/aos/aos.js"></script>

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  <script>
  $(document).ready(function(){
    AOS.init({
      offset: 120,
      once: true,
    });
  })
  </script>

</body>

</html>
<?PHP include 'include_footer.php';?>
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
