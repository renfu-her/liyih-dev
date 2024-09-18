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
<!DOCTYPE html>
<html lang="en">
<head>
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Language" content="en">
	<meta name="keywords" content="<?=$rows["keywords_en"];?>" />
	<meta name="description" content="<?=$rows["description_en"];?>" />
	<meta name="company" content="<?=$rows["conpany_en"];?>" />
	<meta name="robots" content="all">
	<meta name="robots" content="index,follow">
	<meta name="distribution" content="Taiwan"/>
	<meta name="revisit-after" content="7 days"/>
	<meta name="rating" content="general"/>
	<meta property="og:title" content="<?=$rows["conpany_en"];?>"/>
	<meta property="og:description" content="<?=$rows["description_en"];?>"/>
	<meta property="og:type" content="website"/>
	<meta property="og:site_name" content="<?=$rows["conpany_en"];?>" />
	<meta property="og:image" content="https://<?=$_SERVER['HTTP_HOST']?>/admin/goods_pic/<?=$rows["share_pic"]; ?>"/>
	<link rel="image_src" href="https://<?=$_SERVER['HTTP_HOST']?>/admin/goods_pic/<?=$rows["share_pic"]; ?>" />	
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon" />
    <title><?=$rows["conpany_en"];?></title>

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fontawesome core CSS -->
  <link href="../vendor/fontawesome/css/all.min.css" rel="stylesheet">

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
      <div class="row message-row">
         <?php
//使用分頁控制必備變數--開始						
$Day = date("Y-m-d H:i:s");//今天日期
$no_id=0;
include "../admin/include/pages.php";
$pagesize='12';//設定每頁顯示資料量
$phpfile = 'messages.php';//使用頁面檔案
$page= isset($_GET['page'])?$_GET['page']:1;//如果沒有傳回頁數，預設為第1頁


//查詢
$sql_page="
SELECT * FROM news
WHERE news_ckpost=1 
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
SELECT * FROM news 
WHERE news_ckpost=1 
ORDER BY `news_no` DESC 
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
       <!--item-->
        <div class="col-12 mb-5">
          <div class="card message-card">
            <div class="date-row">
              <p class="event-date"><?=mb_strimwidth( $rows_main["news_time"], 0, 10, '', 'UTF-8');?></p>
            </div>
            <div class="row no-gutters align-items-center">
              <div class="col-md-7 <?PHP if($no_id%2==0) echo 'order-last'; ?>">
                <div class="card-body text-left">
                  <div class="card-content mt-md-4">
                    <a href="message_detail.php?no=<?=$rows_main["news_no"];?>">
                      <h3 class="card-title"><?=$rows_main["news_title_en"]; ?></h3>
                      <hr>
                      <h5 class="card-text">
                        <?PHP
								$news_content = $rows_main["news_content_en"];
								$news_content = strip_tags($news_content); // 过滤 HTML 标记
								$news_content = htmlspecialchars_decode($news_content); // 将实体转换回普通字符
							echo mb_strimwidth($news_content, 0, 90, '...', 'UTF-8'); 
						?>
                      </h5>
                    </a>
                  </div>
                </div>
              </div>
              <div class="col-md-5">
                <div class="card-img d-block">
                  <a href="message_detail.php?no=<?=$rows_main["news_no"];?>" class="hover-img">
                    <img src="../admin/goods_pic/<?=$rows_main["news_pic_s"];?>"  alt="message 01" style=" width: 100%; aspect-ratio: 500/330">
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--item-->
 <?php	
}
}else{
?>	
<div class="col-12 mb-5">
  <div class="card message-card">
	<div class="date-row">
		<strong>No Data</strong>
	</div>
  </div>
</div>
<?PHP }?>      
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
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  
  <!-- Fontawesome core JavaScript -->
  <script src="../vendor/fontawesome/js/all.min.js"></script>

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