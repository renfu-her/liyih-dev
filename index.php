<?PHP
if (!isset($_SESSION)) {
 	 session_start();
}
$_SESSION["bt"]='0';
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

  <!-- owl.carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"></link>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"></link>

  <!-- Custom styles for this template -->
  <link href="css/main.css" rel="stylesheet">
<?PHP include 'include_head.php';?>
</head>

<body class="main">
<?PHP include 'include_body.php';?>
  <!-- Navigation -->
<?PHP include 'menu.php';?>  

  <!-- Carousel Banner -->
  <header class="sec01">
    <div id="KVcarousel" class="carousel slide overflow-hidden" data-ride="carousel" data-interval="5000">   
      <ol class="carousel-indicators">
       <?PHP 
		$banner_o=0;
		$sql_banner="
		SELECT * FROM `banner` 
		WHERE `banner_hide`='1' && `banner_class` = '中文版'
		ORDER BY `banner_sort`  
		";//DESC是遞減
		$result_banner = $db->prepare("$sql_banner");//防sql注入攻擊
		$result_banner->execute();
		$total_banner=$result_banner->rowCount();//算出總筆數
		//列出內容
		if($total_banner<>0){//如果判斷結果有值才跑回圈抓資
		   while($rows_banner = $result_banner->fetch(PDO::FETCH_ASSOC))
		{ 
		?>
			<li data-target="#KVcarousel" data-slide-to="<?=$banner_o?>" <?PHP if($banner_o==0) echo 'class="active"';?>></li>
		 <?PHP
		$banner_o=$banner_o+1;//判斷第一次要給li style值
		}}
		?> 

      </ol>         
      <div class="carousel-inner" role="listbox">
        <?PHP 
		$banner_o=0;
		$sql_banner="
		SELECT * FROM `banner` 
		WHERE `banner_hide`='1' && `banner_class` = '中文版'
		ORDER BY `banner_sort` 
		";//DESC是遞減
		$result_banner = $db->prepare("$sql_banner");//防sql注入攻擊
		$result_banner->execute();
		$total_banner=$result_banner->rowCount();//算出總筆數
		//列出內容
		if($total_banner<>0){//如果判斷結果有值才跑回圈抓資
		   while($rows_banner = $result_banner->fetch(PDO::FETCH_ASSOC))
		{ 
		$banner_o=$banner_o+1;//判斷第一次要給li style值
		?>    
        <!-- Slide One - Set the background image for this slide in the line below -->
        <div class="carousel-item <?PHP if($banner_o==1) echo ' active';?>" style="background-image: url('./admin/goods_pic/<?=$rows_banner["banner_pic_b"]; ?>'); <?PHP if($rows_banner["banner_href"]<>'無超連結'){?> cursor:pointer<?PHP }?> " 
           <?PHP if($rows_banner["banner_href"]=='當前視窗'){?> 
            onclick="location.href='<?=$rows_banner["banner_link"]?>'"
           <?PHP }?> 
            <?PHP if($rows_banner["banner_href"]=='開啟新頁'){?> 
            onclick="window.open('<?=$rows_banner["banner_link"]?>')"
           <?PHP }?> 
            >
            
        </div>
       <?PHP
		}}
		?> 
		  
       
      </div>
      
      <a class="carousel-control-prev" href="#KVcarousel" type="button" data-slide="prev">
        <i class="fa fa-chevron-left fa-lg text-white" aria-hidden="true"></i>
        <span class="sr-only">向前</span>
      </a>
      <a class="carousel-control-next" href="#KVcarousel" type="button" data-slide="next">
        <i class="fa fa-chevron-right fa-lg text-white" aria-hidden="true"></i>
        <span class="sr-only">向後</span>
      </a>
    </div>
  </header>

  <!-- About Section -->
  <section class="sec02">
    <div class="container">
      <div class="row no-gutters align-items-center">
        <div class="col-md col-12">
          <div class="about-img-block" data-aos="zoom-out-left" data-aos-duration="800">
            <h1 class="about-img-title">誠信、專業、永續經營</h1>
            <h2 class="about-img-subtitle">專門生產品質優良的軟性積層包裝材料</h2>
          </div>
        </div>
        <div class="col-md col-12">
          <div class="about-text-block" data-aos="fade-down" data-aos-delay="300" data-aos-easing="ease-out-cubic" data-aos-duration="1500">
            <p>勵億塑膠秉持誠信、專業、永續經營的理念，以多年專業的食品塑膠袋生產經驗，獲得許多知名食品大廠指定愛用，如：統一、全家、義美、乖乖…等口碑品牌</p>
            <p>我們具有超過30年的食品包裝袋製造經驗，自產自銷一條龍服務，專門提供品質優越、價格實惠的各式精美食品包裝袋</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SGS Section -->
  <section class="sec03 bg-transparent">
    <div class="container">
      <div class="row no-gutters align-items-center">
        <div class="col-md-7 col-12">
          <div class="about-text-block" data-aos="zoom-out-left" data-aos-duration="800">
            <h1 class="about-img-title">品質認證與保障</h1>
            <h2 class="about-img-subtitle">值得信賴的合作夥伴，定期檢驗更安心</h2>
          </div>
        </div>
        <div class="col-md-5 col-12">
          <div class="about-text-block border-0" data-aos="fade-down" data-aos-delay="300" data-aos-easing="ease-out-cubic" data-aos-duration="1500">
            <img src="img/img-sgs.jpg" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Brand Section -->
  <section class="sec04">
    <div class="container">
      <div class="row">
        <div class="col-12 py-5">
          <div class="row align-items-center py-md-5 py-2">
            <div class="col-lg-3 col-12" data-aos="fade-right" data-aos-easing="ease-in-out" data-aos-delay="100" data-aos-duration="800">
              <div class="brandTitle">
                <h2 class="font-weight-bold text-white mb-md-3 mb-2">產品特色</h2>    
              </div>
            </div>
            <div class="col-lg-9 col-12" data-aos="fade-left" data-aos-easing="ease-in-out" data-aos-delay="450" data-aos-duration="800">
              <div class="brandContent">
                <p class="text-white">我們秉持誠信、專業、永續經營的理念，以多年專業的食品塑膠袋生產經驗，獲得許多知名食品大廠指定愛用如：統一、全家、義美、乖乖……等口碑品牌</p>
              </div>
            </div>
          </div>

          <div id="brandCarousel" class="owl-carousel owl-theme">
    <?PHP 					

$sql_main="
SELECT * FROM goods_item 
WHERE goods_item_hide=1	&& goods_item_home=1 
ORDER BY  `goods_item_sort` ASC, `goods_item_no` DESC 


 ";
		  
$result_main = $db->prepare("$sql_main");//防sql注入攻擊
// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
//$result->bindValue(':id', $id, PDO::PARAM_INT);
$result_main->execute();
						
$counts_main=$result_main->rowCount();//算出總筆數

if($counts_main<>0){//如果判斷結果有值才跑回圈抓資料
   while($rows_main = $result_main->fetch(PDO::FETCH_ASSOC)) {
$no_id=$no_id+1;
?>	
            
            <div class="item" data-aos="fade-left" data-aos-easing="ease-in-out" data-aos-delay="600" data-aos-duration="1500" data-aos-anchor=".brandTitle">
              <div class="card border-0 p-0">
                <div class="card-img">
                  <a href="product_detail.php?no=<?=$rows_main["goods_item_no"];?>" class="hover-img">
                    <img class="card-img-top" src="./admin/goods_pic/<?=$rows_main["goods_item_pic_b"]; ?>" alt="brand 02"  style="width: 100%; aspect-ratio: 850/560">
                  </a>
                </div>
                <div class="card-body px-0">
                  <a href="product_detail.php?no=<?=$rows_main["goods_item_no"];?>">
                    <h4><?=$rows_main["goods_item_title"]; ?></h4>
                  </a>
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
  </section>

  <!-- Shop Section -->
  <section class="sec05" data-aos="zoom-in" data-aos-duration="800">
    <div class="container">
      <div class="row">
        <div class="col-12 py-5">
          <div class="d-flex flex-md-row flex-column justify-content-end align-items-center ml-auto py-md-5 py-2" data-aos="fade-right" data-aos-easing="ease-in-out" data-aos-delay="500" data-aos-duration="800">
            <div class="d-flex flex-md-row flex-column br-4">
              <h4 class="shop-title px-md-4 pl-5 py-3">網路商城</h4>
              <h2 class="shop-item px-md-4 pl-5">精袋師</h2>
            </div>
            <div class="mt-md-3 mt-5 px-md-4">
              <a href="https://www.kingbags.com.tw" class="btn-more" target="_blank">線上訂購</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

 <!-- Side Social Link -->
  <aside class="sidebar">
    <ul class="list-unstyled">
      <li data-aos="zoom-in-up" data-aos-easing="ease-in-out" data-aos-delay="150" data-aos-duration="1500" data-aos-anchor=".navbar"><a href="https://www.facebook.com/liyihkingbags" target="_blank"><img src="img/side_ic01.png" srcset="./img/side_ic01.svg" class="side_ic ic_msg"></a></li>
      <li data-aos="zoom-in-up" data-aos-easing="ease-in-out" data-aos-delay="300" data-aos-duration="1500" data-aos-anchor=".navbar"><a href="tel:02-2201-4458"><img src="img/side_ic02.png" srcset="./img/side_ic02.svg" class="side_ic ic_phone"></a></li>
      <li data-aos="zoom-in-up" data-aos-easing="ease-in-out" data-aos-delay="450" data-aos-duration="1500" data-aos-anchor=".navbar"><a href="#top"><img src="img/side_ic03.png" srcset="./img/side_ic03.svg" class="side_ic ic_top"></a></li>
    </ul>
  </aside>

 
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



</body>

</html>
<?PHP include 'include_footer.php';?>
  <script>
  $(document).ready(function(){
    AOS.init({
      offset: 120,
      once: true,
    });

    $("a[href='#top']").click(function() {
      $("html, body").animate({ scrollTop: 0 }, "slow");
      return false;
    });

    $(".owl-carousel").owlCarousel({
      loop: false, // 循環播放
      //margin: 30, // 外距 30px
      nav: true, // 顯示點點
      navText:["<div class='nav-btn prev-slide'></div>","<div class='nav-btn next-slide'></div>"],
      rewind: true,
      dotsEach: true, // 顯示點點
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