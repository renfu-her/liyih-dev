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
if (isset($_GET['class'])){
	$_SESSION["class_web"]=$_GET['class'];
	$sh_class=$_SESSION["class_web"];
}
 else {
  	// 如果沒有傳送 class 參數或其值為空字串，則執行以下程式碼  
	$sql_no="SELECT * FROM `goods_class` 
		where goods_class_hide=1
		ORDER BY `goods_class_sort` ,`goods_class_no` DESC 
		LIMIT 1
		";
	$result_no = $db->prepare("$sql_no");//防sql注入攻擊
	$result_no->execute();
	$rows_no = $result_no->fetch(PDO::FETCH_ASSOC);
	$sh_class=$rows_no["goods_class_no"];
	$_SESSION["class_web"]=$sh_class;
}



$sql_main="SELECT * 
FROM  `goods_class` 
WHERE  `goods_class_no` = :sh_class";
$result_main = $db->prepare("$sql_main");//防sql注入攻擊
$result_main->bindValue(':sh_class', $sh_class, PDO::PARAM_INT);
$result_main->execute();
$rows_main = $result_main->fetch(PDO::FETCH_ASSOC);
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
	<meta property="og:title" content="<?=$rows_main["goods_class_name"].'-'.$rows["conpany"];?>"/>
	<meta property="og:description" content="<?=$rows["description"];?>"/>
	<meta property="og:type" content="website"/>
	<meta property="og:site_name" content="<?=$rows["conpany"];?>" />
	<meta property="og:image" content="https://<?=$_SERVER['HTTP_HOST']?>/admin/goods_pic/<?=$rows["share_pic"]; ?>"/>
	<link rel="image_src" href="https://<?=$_SERVER['HTTP_HOST']?>/admin/goods_pic/<?=$rows["share_pic"]; ?>" />	
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon" />
    <title><?=$rows_main["goods_class_name"].'-'.$rows["conpany"];?></title>

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
        <li class="breadcrumb-item active" aria-current="page"><?=$rows_main["goods_class_name"];?></li>
      </ol>   
    </div>
  </nav>

  <!-- Content Section -->
  <section class="content mt-md-0" data-aos="fade-down" data-aos-delay="150" data-aos-duration="800">
    <div class="container-fluid">
      <div class="row list-col">
        <div class="col-12 py-3">
          <div class="container">
            <div class="d-flex flex-md-row flex-column justify-content-md-between justify-content-center align-items-md-center align-items-between w-100">
              <div class="p-title-block">
                <h2 class="p-title">品質認證與保障</h2>
                <h3 class="p-subtitle">值得信賴的合作夥伴，定期檢驗更安心</h3>
              </div>
              <img src="img/img_product_sgs.jpg" class="img-fluid">
            </div>
            <hr class="w-100">  
            <div class="col-12 my-3  pt-4">
                <h3 class="brand-title mb-1"><?=$rows_main["goods_class_name"];?></h3>
              </div>
          </div>
        </div>
        
        
      
              
        
          
        <div class="d-none"></div>
        
 <?php
//使用分頁控制必備變數--開始						
include "./admin/include/pages.php";
$class=$_SESSION["class_web"];//丟給資料庫中做條件判斷的商品類別

	if ($class<>"")
		$sql_where_class= "&& `goods_item_class` = '$class'";

	else 
		$sql_where_class= "";
		  
$pagesize='12';//設定每頁顯示資料量
$phpfile = 'products.php';//使用頁面檔案
$page= isset($_GET['page'])?$_GET['page']:1;//如果沒有傳回頁數，預設為第1頁


//查詢
$sql_page="
SELECT * 
FROM  `goods_item` 
WHERE goods_item_hide=1	$sql_where_class
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
$no_id=0;
$no_id=$no_id+$start+(($page-1)*$pagesize);//流水號

$sql_main="
SELECT goods_item.*,goods_class.*
FROM goods_item 
JOIN goods_class 
ON goods_item.goods_item_class=goods_class.goods_class_no 
WHERE goods_item_hide=1	$sql_where_class
ORDER BY `goods_item_sort` ASC ,`goods_item_no` DESC
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
       
        <?PHP
		if($no_id%3==1) {
		?>
       <!--row-->
        <div class="col-12 pt-4">
          <div class="container">
            <div class="row">  
        <?PHP
		}
		?>                 
              <!--item-->
               <div class="col-md-4 col-12 my-md-5 my-3">
                <div class="card border-0 p-0">
                  <div class="card-img">
                    <a href="product_detail.php?no=<?=$rows_main["goods_item_no"];?>" class="hover-img">
                      <img class="card-img-top" src="./admin/goods_pic/<?=$rows_main["goods_item_pic_s"]; ?>" alt="product 01" style="aspect-ratio: 850/560">
                    </a>
                  </div>
                  <div class="card-body px-0">
                    <a href="product_detail.php?no=<?=$rows_main["goods_item_no"];?>" target="_blank">
                      <h4 class="text-dark"><?=$rows_main["goods_item_title"]; ?></h4>
                    </a>
                  </div>
                </div>
              </div>
              <!--item-->
         <?PHP
		if($no_id%3==0 || $no_id==$counts_page) {
		?>
       <!--row-->
           </div>
          </div>
        </div>
        <?PHP
		}
		?> 
        
        <!--row-->
        
<?php	
}
}else{
?>	
<div class="col-12 pt-4">
  <div class="container">
	<div class="row">   
		<strong>暫無資料</strong>
	</div>
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