<?PHP
if (!isset($_SESSION)) {
 	 session_start();
}
$_SESSION["bt"]='3';
include "./admin/common.func.php";

$sql="SELECT * FROM `webinfo`";
$result = $db->prepare("$sql");//防sql注入攻擊
$result->execute();
$rows = $result->fetch(PDO::FETCH_ASSOC);
?>
<?PHP
$edit_no	=	$_GET['no'];
$Day = date("Y-m-d H:i:s");//今天日期


$sql_main="SELECT goods_item.*,goods_class.*
FROM goods_item 
JOIN goods_class 
ON goods_item.goods_item_class=goods_class.goods_class_no 
WHERE goods_item_hide=1
	&& goods_item_no=:edit_no;
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
	echo 'alert("抱歉！資料已經下架或移除囉，網站將轉回首頁！");';
	echo "location='./';";
	echo '</script>';	
	exit();
}
?>
<!DOCTYPE html>
<html lang="zh-Hant"><head>
<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Language" content="zh-tw">
	<meta name="keywords" content="<?=$rows["keywords"];?>" />
	<meta name="description" content="<?PHP
												$news_content = $rows_main["goods_item_description"];
												$news_content = strip_tags($news_content); // 过滤 HTML 标记
												$news_content = htmlspecialchars_decode($news_content); // 将实体转换回普通字符
	   										echo mb_strimwidth($news_content, 0, 500, '...', 'UTF-8'); 
										?>" />
	<meta name="company" content="<?=$rows["conpany"];?>" />
	<meta name="robots" content="all">
	<meta name="robots" content="index,follow">
	<meta name="distribution" content="Taiwan"/>
	<meta name="revisit-after" content="7 days"/>
	<meta name="rating" content="general"/>
	<meta property="og:title" content="<?=$rows_main["goods_item_title"]; ?>-<?=$rows["conpany"];?>"/>
	<meta property="og:description" content="<?PHP
												$news_content = $rows_main["goods_item_description"];
												$news_content = strip_tags($news_content); // 过滤 HTML 标记
												$news_content = htmlspecialchars_decode($news_content); // 将实体转换回普通字符
	   										echo mb_strimwidth($news_content, 0, 500, '...', 'UTF-8'); 
										?>"/>
	<meta property="og:type" content="website"/>
	<meta property="og:site_name" content="<?=$rows["conpany"];?>" />
	<meta property="og:image" content="https://<?=$_SERVER['HTTP_HOST']?>/admin/goods_pic/<?=$rows_main["goods_item_pic_b"]; ?>"/>
	<link rel="image_src" href="https://<?=$_SERVER['HTTP_HOST']?>/admin/goods_pic/<?=$rows_main["goods_item_pic_b"]; ?>" />	
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon" />
    <title><?=$rows_main["goods_item_title"]; ?>-<?=$rows["conpany"];?></title>


  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Fontawesome core CSS -->
  <link href="vendor/fontawesome/css/all.min.css" rel="stylesheet">

  <!-- AOS core CSS -->
  <link href="vendor/aos/aos.css" rel="stylesheet">

  <!-- owl.carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"></link>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"></link>

  <!-- Custom styles for this template -->
  <link href="css/main.css" rel="stylesheet">

<?PHP include 'include_head.php';?>
</head>

<body>
<?PHP include 'include_body.php';?>
  <!-- Navigation -->
<?PHP include 'menu.php';?>  

  <header class="page-kv" style="background-image: url('img/img_productkv.jpg');">
    <div class="kv-caption">
      <h3 class="font-weight-bold text-white text-shadow mb-0">產品介紹</h3>
    </div>
  </header>

  <nav class="breadcrumb-row mb-md-5" aria-label="breadcrumb">
    <div class="container">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">首頁</a></li>
        <li class="breadcrumb-item"><a href="products.php">產品介紹</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="products.php?class=<?=$rows_main["goods_class_no"]; ?>"><?=$rows_main["goods_class_name"]; ?></a></li>
      </ol>   
    </div>
  </nav>

  <!-- Content Section -->
  <section class="content mt-md-0" data-aos="fade-down" data-aos-delay="150" data-aos-duration="800">
    <div class="container-fluid">
      <div class="row list-col">
        <div class="col-12 mb-5 py-3">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-6 col-12">
                <img src="./admin/goods_pic/<?=$rows_main["goods_item_pic_b"]; ?>" class="img-fluid">
              </div>
              <div class="col-md-6 col-12">
                <h2 class="font-weight-bold"><?=$rows_main["goods_item_title"]; ?></h2>
                <h5><?=$rows_main["goods_item_description"]; ?></h5>
                <div class="py-md-5 py-3">
                  <a href="contact.php#contactus" class="btn btn-send px-5 py-2"><h5 class="font-weight-bold mb-0 px-5">立即諮詢</h5></a>
                </div>
              </div>
            </div> 
          </div>
        </div>
        
        
                 
                 <?PHP 	
					//列出內容
					$uppics_class = 'goods';//所屬類別
					$sql_uppics="
							SELECT *
							FROM uppics
							where uppics_ing=:edit_no && uppics_class = :uppics_class
							ORDER BY `uppics_sort` ASC 
					 ";

					$result_uppics = $db->prepare("$sql_uppics");//防sql注入攻擊
					// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
					//$result->bindValue(':id', $id, PDO::PARAM_INT);
					$result_uppics->bindValue(':uppics_class', $uppics_class, PDO::PARAM_STR);
					$result_uppics->bindValue(':edit_no', $edit_no, PDO::PARAM_INT);
					$result_uppics->execute();

					$counts_uppics=$result_uppics->rowCount();//算出總筆數
					?>
					<div class="col-12 py-3"  <?PHP if($counts_uppics==0) echo ' style="display: none"';?>>
					  <div class="container">
						<div class="row">
						  <div class="col-12 my-3">
							<div id="productCarousel" class="owl-carousel owl-theme" >
					<?PHP
					if($counts_uppics<>0){//如果判斷結果有值才跑回圈抓資料
					   while($rows_uppics = $result_uppics->fetch(PDO::FETCH_ASSOC)) {
					$no_id=$no_id+1;
					?>
                       <div class="item" data-aos="fade-left" data-aos-easing="ease-in-out" data-aos-delay="100" data-aos-duration="1500" data-aos-anchor=".brandTitle">
                    <div class="card border-0 p-0">
                      <div class="card-img">
                        <div class="hover-img">
                          <img class="card-img-top" src="./admin/goods_pic/<?=$rows_uppics["uppics_pic_b"]; ?>" alt="product 01" style="aspect-ratio: 850/560">
                        </div>
                      </div>
                    </div>
                  </div>
                    <?php	
					}
					}
					?>
                 
                 
                 
					
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-12 py-3">
          <div class="container">
            <div class="row">
              <div class="col-12"  id="img-responsive">
                <!-- 編輯器 -->
               <?=$rows_main["goods_item_content"]; ?>
                <!-- 編輯器 -->
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-center w-100 mb-0 py-5" aria-label="Go Back">
        <a href="#" class="btn btn-goback rounded-pill px-md-5 px-4 py-2" onclick="history.back()">回上頁</a>
      </div>
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

  <!-- owl.carousel -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <script>
  $(document).ready(function(){
    AOS.init({
      offset: 120,
      once: true,
    });

    $(".owl-carousel").owlCarousel({
      loop: false, // 循環播放
      //margin: 30, // 外距 30px
      nav: true, // 顯示點點
      navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
      rewind: true,
      dots: false, // 顯示點點
      autoplay: true,

      responsive: {
        0: {
            items: 1, // 螢幕大小為 0~576 顯示 1 個項目
            //stagePadding: 20, // 物件內距
        },
        576: {
            items: 2, // 螢幕大小為 576~767 顯示 2 個項目
            //stagePadding: 20, // 物件內距
        },
        768: {
            items: 2, // 螢幕大小為 768~992 顯示 3 個項目
            //stagePadding: 50, // 物件內距
        },
        992: {
            items: 3, // 螢幕大小為 992 以上 顯示 3 個項目
            //stagePadding: 50, // 物件內距
        }
      }
    });

  })
  </script>

</body>

</html>
<?PHP include 'include_footer.php';?>
