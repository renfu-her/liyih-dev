<?PHP
if (!isset($_SESSION)) {
 	 session_start();
}
$_SESSION["bt"]='1';
include "./admin/common.func.php";

$sql="SELECT * FROM `webinfo`";
$result = $db->prepare("$sql");//防sql注入攻擊
$result->execute();
$rows = $result->fetch(PDO::FETCH_ASSOC);


if (isset($_GET['no']) && $_GET['no'] !== '') {
  	// 如果有傳送 no 參數且其值不為空字串，則執行以下程式碼
 	$no=$_GET['no'];
} else {
  	// 如果沒有傳送 no 參數或其值為空字串，則執行以下程式碼  
	$sql_no="SELECT * FROM `abouts` 
		where abouts_hide=1
		ORDER BY `abouts_sort` ,`abouts_no` DESC 
		LIMIT 1
		";
	$result_no = $db->prepare("$sql_no");//防sql注入攻擊
	$result_no->execute();
	$rows_no = $result_no->fetch(PDO::FETCH_ASSOC);
	$no=$rows_no["abouts_no"];
	
}

$sql_main="SELECT * FROM `abouts` 
	where abouts_hide=1 &&  abouts_no=:no
	ORDER BY `abouts_sort` ,`abouts_no` DESC 
	LIMIT 1
	";
$result_main = $db->prepare("$sql_main");//防sql注入攻擊
$result_main->bindValue(':no', $no, PDO::PARAM_INT);
$result_main->execute();
$rows_main = $result_main->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="zh-Hant"><head>
<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Language" content="zh-tw">
	<meta name="keywords" content="<?=$rows["keywords"];?>" />
	<meta name="description" content="<?PHP
												$abouts_content = $rows_main["abouts_content"];
												$abouts_content = strip_tags($abouts_content); // 过滤 HTML 标记
												$abouts_content = htmlspecialchars_decode($abouts_content); // 将实体转换回普通字符
	   										echo mb_strimwidth($abouts_content, 0, 500, '...', 'UTF-8'); 
										?>" />
	<meta name="company" content="<?=$rows["conpany"];?>" />
	<meta name="robots" content="all">
	<meta name="robots" content="index,follow">
	<meta name="distribution" content="Taiwan"/>
	<meta name="revisit-after" content="7 days"/>
	<meta name="rating" content="general"/>
	<meta property="og:title" content="<?=$rows_main["abouts_name"].'-'.$rows["conpany"];?>"/>
	<meta property="og:description" content="<?PHP
												$abouts_content = $rows_main["abouts_content"];
												$abouts_content = strip_tags($abouts_content); // 过滤 HTML 标记
												$abouts_content = htmlspecialchars_decode($abouts_content); // 将实体转换回普通字符
	   										echo mb_strimwidth($abouts_content, 0, 500, '...', 'UTF-8'); 
										?>"/>
	<meta property="og:type" content="website"/>
	<meta property="og:site_name" content="<?=$rows["conpany"];?>" />
	<meta property="og:image" content="https://<?=$_SERVER['HTTP_HOST']?>/admin/goods_pic/<?=$rows["share_pic"]; ?>"/>
	<link rel="image_src" href="https://<?=$_SERVER['HTTP_HOST']?>/admin/goods_pic/<?=$rows["share_pic"]; ?>" />	
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon" />
    <title><?=$rows_main["abouts_name"].'-'.$rows["conpany"];?></title>

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


  <header class="page-kv" style="background-image: url('img/img_aboutkv.jpg');">
    <div class="kv-caption">
      <h3 class="font-weight-bold text-white text-shadow mb-0">公司簡介</h3>
    </div>
  </header>

  <nav class="breadcrumb-row mb-md-5" aria-label="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">首頁</a></li>
        <li class="breadcrumb-item"><a href="about.php">公司簡介</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?=$rows_main["abouts_name"]?></li>
      </ol>   
    </div>
  </nav>

  <!-- Content Section -->
  <section class="content mt-md-0" data-aos="fade-down" data-aos-delay="150" data-aos-duration="800">
    <div class="container">
      <div class="row">
        <div class="col-12 mb-md-0 mb-3">
          <h3 class="brand-title"><?=$rows_main["abouts_name"]?></h3>

          <div class="row">
            <div class="col-12 mb-md-0 mb-4 pr-3"  id="img-responsive">

 					<?PHP					
					echo $rows_main["abouts_content"];
					?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?PHP include 'footer.php';?>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- AOS core JavaScript -->
  <script src="vendor/aos/aos.js"></script>

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