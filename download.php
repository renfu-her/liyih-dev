<?PHP
if (!isset($_SESSION)) {
 	 session_start();
}
$_SESSION["bt"]='4';
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

  <!-- Fontawesome core CSS -->
  <link href="vendor/fontawesome/css/all.min.css" rel="stylesheet">

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
  <header class="page-kv" style="background-image: url('img/img_downloadkv.jpg');">
    <div class="kv-caption">
      <h3 class="font-weight-bold text-white text-shadow mb-0">檔案下載</h3>
    </div>
  </header>

  <nav class="breadcrumb-row mb-md-5" aria-label="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">首頁</a></li>
        <li class="breadcrumb-item active" aria-current="page">檔案下載</li>
      </ol>   
    </div>
  </nav>

  <!-- Content Section -->
  <section class="content mt-md-0" data-aos="fade-down" data-aos-delay="150" data-aos-duration="800">
        <div class="container">
      <div class="row">









        <!-- /*20230511*/ -->

        <div class="col-md-auto col-12 left-col text-center mb-md-3 mb-4">
          <img src="../img/ic_pdf.png" class="ic_pdf img-fluid">
          <h3>下載專區</h3>
        </div>
        <div class="col-md col-12 right-col">
          <ul class="list-download list-unstyled">
           <?php
//使用分頁控制必備變數--開始						

$no_id=0;
include "./admin/include/pages.php";
$pagesize='12';//設定每頁顯示資料量
$phpfile = 'download.php';//使用頁面檔案
$page= isset($_GET['page'])?$_GET['page']:1;//如果沒有傳回頁數，預設為第1頁


//查詢
$sql_page="
SELECT * FROM download
WHERE download_hide=1 && download_class='中文版'
";//算總頁數用
		  
$result_page = $db->prepare("$sql_page");//防sql注入攻擊
// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
//$result->bindValue(':id', $id, PDO::PARAM_INT);
$result_page->execute();
$counts_page=$result_page->rowCount();//算出總筆數

if ($page>$counts_page) $page = $counts_page;//輸入值大於總數則顯示最後頁
else $page = intval($page);//當前頁面-避免非數字頁碼
$getpageinfo = page($page,$counts_page,$phpfile,$pagesize);//將函數傳回給pages.php處理
$page_sql_start=($page-1)*$pagesize;//資料庫查詢起始資料
?>
<?PHP 
//列出內容
$no_id=$no_id+$start+(($page-1)*$pagesize);//流水號

$sql_main="
SELECT * FROM download 
WHERE download_hide=1 && download_class='中文版'
ORDER BY `download_sort` ,`download_no` DESC 
LIMIT :page_sql_start , :pagesize 

 ";
		  
$result_main = $db->prepare("$sql_main");//防sql注入攻擊
// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
//$result->bindValue(':id', $id, PDO::PARAM_INT);
$result_main->bindValue(':page_sql_start', $page_sql_start, PDO::PARAM_INT);
$result_main->bindValue(':pagesize', $pagesize, PDO::PARAM_INT);
$result_main->execute();
$counts_main=$result_main->rowCount();//算出總筆數

if($counts_main<>0){//如果判斷結果有值才跑回圈抓資料
   while($rows_main = $result_main->fetch(PDO::FETCH_ASSOC)) {
$no_id=$no_id+1;
?>		 
       
            <li>
              <a href="./upload/<?=$rows_main["download_file"]; ?>" class="d-flex flex-md-row flex-column justify-content-md-between align-items-center" target="_blank" >
                <div class="d-flex flex-md-row flex-column align-items-center">
                  <div class="circlenum"><?=$no_id?></div>
                  <h4 class="rowtitle"><?=$rows_main["download_title"]; ?></h4>
                </div>
                <div class="btn-download">
                  <svg class="arrow-down" xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"><path fill="white" d="M9 4h6v8h4.84L12 19.84L4.16 12H9V4Z"/></svg>
                </div>
              </a>
            </li>
<?php	
}
}else{
?>	  
            <li>暫無資料</li>       
<?PHP }?>                 
          </ul>
        </div>

        <!-- /*20230511*/ -->














      </div>
      <nav class="py-5" aria-label="Page navigation">
       <?php
			if($counts_page>$pagesize){
				echo $getpageinfo['pagecode'];//顯示分頁的html代碼
			}
			?>
      </nav>
    </div>
  </div>

  <?PHP include 'footer.php';?>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <!-- Fontawesome core JavaScript -->
  <script src="vendor/fontawesome/js/all.min.js"></script>

  <!-- AOS core JavaScript -->
  <script src="vendor/aos/aos.js"></script>

  <!-- Iconify core JavaScript -->
  <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
  <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>

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
