<?PHP
if (!isset($_SESSION)) {
 	 session_start();
}
$_SESSION["bt"]='2';
include "../admin/common.func.php";

$sql="SELECT * FROM `webinfo`";
$result = $db->prepare("$sql");//防sql注入攻擊
$result->execute();
$rows = $result->fetch(PDO::FETCH_ASSOC);
?>
<?PHP
$edit_no	=	$_GET['no'];
$Day = date("Y-m-d H:i:s");//今天日期


$sql_main="SELECT * 
FROM `news` 
WHERE  news_ckpost=1
	&& news_no=:edit_no;
";

$result_main = $db->prepare("$sql_main");//防sql注入攻擊
// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
$result_main->bindValue(':edit_no', $edit_no, PDO::PARAM_INT);
$result_main->execute();
$rows_main = $result_main->fetch(PDO::FETCH_ASSOC);
$counts_main=$result_main->rowCount();//算出總筆數

if($counts_main<=0){
	echo '<meta charset="UTF-8">';
	echo '<script language="javascript">';
	echo 'alert("sorry！No Data！");';
	echo "location='./';";
	echo '</script>';	
	exit();
}
?>
<!DOCTYPE html>
<html lang="en"><head>
<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Language" content="en">
	<meta name="keywords" content="<?=$rows["keywords_en"];?>" />
	<meta name="description" content="<?PHP
												$news_content = $rows_main["news_content_en"];
												$news_content = strip_tags($news_content); // 过滤 HTML 标记
												$news_content = htmlspecialchars_decode($news_content); // 将实体转换回普通字符
	   										echo mb_strimwidth($news_content, 0, 500, '...', 'UTF-8'); 
										?>" />
	<meta name="company" content="<?=$rows["conpany_en"];?>" />
	<meta name="robots" content="all">
	<meta name="robots" content="index,follow">
	<meta name="distribution" content="Taiwan"/>
	<meta name="revisit-after" content="7 days"/>
	<meta name="rating" content="general"/>
	<meta property="og:title" content="<?=$rows_main["news_title_en"]; ?>-<?=$rows["conpany_en"];?>"/>
	<meta property="og:description" content="<?PHP
												$news_content = $rows_main["news_content_en"];
												$news_content = strip_tags($news_content); // 过滤 HTML 标记
												$news_content = htmlspecialchars_decode($news_content); // 将实体转换回普通字符
	   										echo mb_strimwidth($news_content, 0, 500, '...', 'UTF-8'); 
										?>"/>
	<meta property="og:type" content="website"/>
	<meta property="og:site_name" content="<?=$rows["conpany_en"];?>" />
	<meta property="og:image" content="https://<?=$_SERVER['HTTP_HOST']?>/admin/goods_pic/<?=$rows_main["news_pic_b"]; ?>"/>
	<link rel="image_src" href="https://<?=$_SERVER['HTTP_HOST']?>/admin/goods_pic/<?=$rows_main["news_pic_b"]; ?>" />	
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon" />
    <title><?=$rows_main["news_title_en"]; ?>-<?=$rows["conpany_en"];?></title>
  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- AOS core CSS -->
  <link href="../vendor/aos/aos.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/main.css" rel="stylesheet">


<?PHP include 'include_head.php';?>
</head>

<body>
<?PHP include 'include_body.php';?>
  <!-- Navigation -->
<?PHP include 'menu.php';?>  
  <header class="page-kv" style="background-image: url('../img/img_messagekv.jpg');">
    <div class="kv-caption">
      <h3 class="font-weight-bold text-white text-shadow mb-0">Message</h3>
    </div>
  </header>

  <nav class="breadcrumb-row mb-md-5" aria-label="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Message</li>
      </ol>   
    </div>
  </nav>

  <!-- Content Section -->
  <section class="content mt-md-0" data-aos="fade-down" data-aos-delay="150" data-aos-duration="800">
    <div class="container">
      <div class="row">
        <div class="col-12 my-3">
          <div class="d-flex flex-md-row flex-column justify-content-md-between justify-content-center align-items-md-center align-items-between w-100">
            <h3 class="m-title"><?=$rows_main["news_title_en"]; ?></h3>
            <p class="mb-0"><?=mb_strimwidth( $rows_main["news_time"], 0, 10, '', 'UTF-8');?></p>
          </div>
          <hr class="w-100"> 
        </div>
        <div class="col-12 mb-5 py-3">
			<div class="col-12 mb-5 py-3"  id="img-responsive">
			  <!-- 編輯器 -->
			 <?=$rows_main["news_content_en"]; ?>
			  <!-- 編輯器 -->
			</div>

        </div>
      </div>

      <div class="d-flex justify-content-center w-100 mb-0 py-5" aria-label="Go Back">
        <a href="#" class="btn btn-goback rounded-pill px-md-5 px-4 py-2"  onclick="history.back()">Back</a>
      </div>
    </div>
  </div>

   <?PHP include 'footer.php';?>


  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- AOS core JavaScript -->
  <script src="../vendor/aos/aos.js"></script>

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