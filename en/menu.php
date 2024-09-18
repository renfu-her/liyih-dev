<nav class="navbar navbar-expand-xl <?PHP if($_SESSION["bt"]=='0') echo ' navbar-dark'; else echo ' navbar-light'; ?>">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="../img/logo-<?PHP if($_SESSION["bt"]=='0') echo 'white'; else echo 'blue'; ?>.png" srcset="../img/logo-<?PHP if($_SESSION["bt"]=='0') echo 'white'; else echo 'blue'; ?>.svg" class="img-logo"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav">
          <li class="nav-item fulldown dropdown">
            <a class="nav-link <?PHP if($_SESSION["bt"]=='1') echo ' active'; ?>" href="about.php" id="navbarDropdownClasses" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Company</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownClasses">
              <div class="container h-100">
                <div class="row align-items-center h-100">
                  <div class="col-md-3 col-12 d-md-block d-none">
                    <h2 class="dropdown-item"><b>Company</b></h2>
                  </div>
                  <div class="col-md-9 col-12 px-0">
                    <ul class="multi-column-dropdown px-0">
                     <?PHP 	
					//列出內容
					$sql_left="SELECT * 
							FROM `abouts` 
							where abouts_hide=1
							ORDER BY `abouts_sort` ,`abouts_no` DESC 
					 ";

					$result_left = $db->prepare("$sql_left");//防sql注入攻擊
					// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
					//$result->bindValue(':id', $id, PDO::PARAM_INT);
					$result_left->execute();

					$counts_left=$result_left->rowCount();//算出總筆數
					if($counts_left<>0){//如果判斷結果有值才跑回圈抓資料
					   while($rows_left = $result_left->fetch(PDO::FETCH_ASSOC)) {
					$no_id=$no_id+1;
					?>
                      <li><a href="about.php?no=<?=$rows_left["abouts_no"]; ?>"  <?PHP if($rows_left["abouts_no"]==$no) echo ' class="txt_blue"'; ?>><h5><?=$rows_left["abouts_name_en"]; ?></h5></a></li>
                      <?php	
					}
					}
					?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link <?PHP if($_SESSION["bt"]=='2') echo ' active'; ?>" href="messages.php">Message</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?PHP if($_SESSION["bt"]=='3') echo ' active'; ?>" href="products.php" id="navbarDropdownProducts" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Product</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownProducts">
              <div class="container h-100">
                <div class="row align-items-center h-100">
                  <div class="col-md-3 col-12 d-md-block d-none">
                    <h2 class="dropdown-item"><b>Product Description</b></h2>
                  </div>
                  <div class="col-md-9 col-12 px-0">
                    <ul class="multi-column-dropdown px-0">
                      <?PHP 	
					//列出內容
					$sql_left="SELECT * 
							FROM `goods_class` 
							where goods_class_hide=1
							ORDER BY `goods_class_sort` ,`goods_class_no` DESC 
					 ";

					$result_left = $db->prepare("$sql_left");//防sql注入攻擊
					// 數值PDO::PARAM_INT  字串PDO::PARAM_STR
					//$result->bindValue(':id', $id, PDO::PARAM_INT);
					$result_left->execute();

					$counts_left=$result_left->rowCount();//算出總筆數
					if($counts_left<>0){//如果判斷結果有值才跑回圈抓資料
					   while($rows_left = $result_left->fetch(PDO::FETCH_ASSOC)) {
					$no_id=$no_id+1;
					?>
                      <li><a href="products.php?class=<?=$rows_left["goods_class_no"]; ?>" <?PHP if($rows_left["goods_class_no"]==$sh_class) echo ' class="txt_blue"'; ?>><h5><?=$rows_left["goods_class_name_en"]; ?></h5></a></li>
                      <?php	
					}
					}
					?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link <?PHP if($_SESSION["bt"]=='4') echo ' active'; ?>" href="download.php">Download</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?PHP if($_SESSION["bt"]=='5') echo ' active'; ?>" href="contact.php">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.kingbags.com.tw" target="_blank">Shop</a>
          </li>
        </ul>
        <div class="lang-select w-148">
          <select class="form-control custom-select" onchange="if (this.value) window.location.href=this.value">
            <option value="..<?=mb_strimwidth($_SERVER['REQUEST_URI'], 3, 99999,  'UTF-8')?>">繁體中文</option>
            <option value="./" selected>English</option>
          </select>
        </div>
      </div>
    </div>
  </nav>