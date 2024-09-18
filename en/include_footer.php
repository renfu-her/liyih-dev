<!--變更圖片class成為響應式大小-->
<script type="text/javascript">
$(document).ready(function() {
	$("#img-responsive img")
	.addClass("img-responsive")//增加bootstrap內健RWD寬度
	.css("height",'');//高度清除
});
</script>
<script type="text/javascript">
jQuery(document).ready(function() {
	jQuery("#img-responsive img")
	.addClass("img-responsive")//增加bootstrap內健RWD寬度
	.css("height",'');//高度清除
});
</script>
<style>
.img-responsive,.thumbnail>img,.thumbnail a>img,.carousel-inner>.item>img,.carousel-inner>.item>a>img{display:block;max-width:100%;height:auto}
.video-wrapper iframe {  width: 100%; height: auto; aspect-ratio: 16/9;}/*youtube崁入自動100%*/
</style>
<!--變更圖片class成為響應式大小-->