<?php
	session_start();
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "dramaSystem";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}
	//获取用户ID
	$current_uid = $_SESSION['uid'];
?>

<html lang="en">
<head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" href="css/slider.css">
    <link type="text/css" rel="stylesheet" href="css/kalendar.css">

	<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
	<script src="js/jquery.scrollTo-1.4.2-min.js" type="text/javascript"></script>
	<script src="js/waypoints.min.js" type="text/javascript"></script>
	<script src="js/navbar2.js" type="text/javascript"></script>
	<script src="js/slider.js" type="text/javascript"></script> 
	<script type="text/javascript" src="js/kalendar.js"></script>

<script type="text/javascript"> 
	//home  顶部大图切换功能
	$(document).ready(function(){  
	$.manualScroll({  
	objId:"scrollDiv",  
	showArea:"showArea",  
	showWidth:600, 
	showHeight:413,
	showTitle: true,  
	picTimer:0,
	interval:3000 
	});  

	});  
</script>

</head>
<body id="home">
 
 	<div class="wrapper" style="top:35px;">

		<header>	
			<a href="first_page.php"><h1>Drama</h1></a>
		</header>
		
		<div class="nav-container">		
			<nav>	 
				<ul>			 
					<li><a href="#chapter-1" class="selected">热门话剧</a></li>
					<li><a href="#chapter-2">话剧日历</a></li>
					<li><a href="#chapter-3">场馆 演员</a></li>
					<li><a href="private_page_1.php">个人主页</a></li>			 
				</ul>
				<div class="nav-left"></div>
				<div class="nav-right"></div>
				<div class="nav-above"></div>
			</nav>	
		</div>

		<div style="float:right; margin-right: 50px;">

			<form method="post" action="search_drama.php"> 
				<input id="searchd" name="searchd" type="search" placeholder="搜话剧~">
			</form>

			<style>
				/* reset webkit search input browser style */
				input {
					outline: none;
				}
				input[type=search] {
					-webkit-appearance: textfield;
					-webkit-box-sizing: content-box;
					font-family: inherit;
					font-size: 100%;
				}
				input::-webkit-search-decoration,
				input::-webkit-search-cancel-button {
					display: none; /* remove the search and cancel icon */
				}

				/* search input field */
				input[type=search] {
					background: #ededed url(images/search-icon.png) no-repeat 9px center;
					border: solid 1px #ccc;
					padding: 9px 10px 9px 32px;
					width: 55px;
					
					-webkit-border-radius: 10em;
					-moz-border-radius: 10em;
					border-radius: 10em;
					
					-webkit-transition: all .5s;
					-moz-transition: all .5s;
					transition: all .5s;
				}
				input[type=search]:focus {
					width: 130px;
					background-color: #fff;
					border-color: #6dcff6;
					
					-webkit-box-shadow: 0 0 5px rgba(109,207,246,.5);
					-moz-box-shadow: 0 0 5px rgba(109,207,246,.5);
					box-shadow: 0 0 5px rgba(109,207,246,.5);
				}
				</style>
		</div>
		
		<section id="chapter-1" style="margin-top:90px;">

			<div class="main">
				<div  class="slider-scroll f-c" style="margin-bottom:40px;">  
					<div id="showArea">
						<a href="drama_page.php?did=6"  title="暗恋桃花源（经典版）" target="_blank"><img style="display:block; opacity:1;" src="http://uploads.theatreabove.com/file/20160105/20160105162525_548.jpg"  width="664px" height="419px" alt="暗恋桃花源（经典版）"/></a>
						<a href="drama_page.php?did=1"  title="在那遥远的星球，一粒沙" target="_blank"><img style="display:block; opacity:1;" src="http://uploads.theatreabove.com/file/20160104/20160104140401_152.jpg"  width="664px" height="419px" alt="在那遥远的星球，一粒沙"/></a>
						<a href="drama_page.php?did=5"  title="弹琴说爱" target="_blank"><img style="display:block; opacity:1;" src="http://uploads.theatreabove.com/file/20151112/20151112163256_461.jpg"  width="664px" height="419px" alt="弹琴说爱"/></a>
						<a href="drama_page.php?did=7"  title="暗恋桃花源（30周年纪念版）" target="_blank"><img style="display:block; opacity:1;" src="http://uploads.theatreabove.com/file/20160118/20160118135105_311.jpg"  width="664px" height="419px" alt="暗恋桃花源（30周年纪念版）"/></a>
						<a href="drama_page.php?did=2"  title="水中之书" target="_blank"><img style="display:block; opacity:1;" src="http://uploads.theatreabove.com/file/20160319/20160319140750_933.png"  width="664px" height="419px" alt="水中之书"/></a>
					</div>
					<div id="scrollDiv">  
						<ul>
							<li class="on"><a href="drama_page.php?did=6" target="_blank">暗恋桃花源（经典版）<!--12个字以内--><span>黄磊 孙莉<!--14个字以内--></span></a><span class="entity-triangle"></span></li>  

							<li ><a href="drama_page.php?did=1" target="_blank">在那遥远的星球，一粒沙<!--12个字以内--><span>郑佩佩重回话剧舞台<!--14个字以内--></span></a><span class="entity-triangle"></span></li>  

							<li ><a href="drama_page.php?did=5" target="_blank">弹琴说爱<!--12个字以内--><span>赖声川 丁乃筝 编导<!--14个字以内--></span></a><span class="entity-triangle"></span></li>  

							<li ><a href="drama_page.php?did=7" target="_blank">暗恋桃花源（30周年纪念版）<!--12个字以内--><span>暗恋30周年<!--14个字以内--></span></a><span class="entity-triangle"></span></li>  

							<li ><a href="drama_page.php?did=2" target="_blank">水中之书<!--12个字以内--><span>开启一次奇妙的“快乐学习”<!--14个字以内--></span></a><span class="entity-triangle"></span></li>  
						</ul> 
					</div> 
				</div>
			</div>

			<hr />
			
		</section>

		
		<section id="chapter-2">
			<div id='wrap' style="margin-top:10px; margin-bottom:40px;"></div>
			<hr />
		</section>


		<section id="chapter-3">
			<div style="margin-bottom:40px;">
	            <p>【场馆信息】</p>
	            <div class="column left">
		            <div>
		            	<a href="venue_page.php?vid=1"><img src="http://admin.soupu.com/upload/editor/2016/3/2016031711131962_y.png" style="width: 260px; height: 150px">
		            	</a>
		            </div>
		            <div>
		            	<a href="venue_page.php?vid=1">上剧场</a>
		            </div>

		            <div style="margin-top: 30px;">
		            	<a href="venue_page.php?vid=2"><img src="http://static.228.cn//upload/2011/11/21/AfterTreatment/4-311092716064387731111211434542784-0.jpg" style="width: 260px; height: 150px">
		            	</a>
		            </div>
		            <div>
		            	<a href="venue_page.php?vid=2">保利剧院</a>
		            </div>

		            <div style="margin-top: 30px;">
		            	<a href="venue_page.php?vid=3"><img src="http://static.228.cn//upload/2011/11/21/AfterTreatment/4-211092716055663871111211438325959-0.jpg" style="width: 260px; height: 150px">
		            	</a>
		            </div>
		            <div>
		            	<a href="venue_page.php?vid=3">首都剧场</a>
		            </div>
		        </div>

		        <div class="column right">
		            <div>
		            	<a href="venue_page.php?vid=4"><img src="http://static.228.cn//upload/2012/01/10/AfterTreatment/1201101525198294-0.jpg" style="width: 260px; height: 150px">
		            	</a>
		            </div>
		            <div>
		            	<a href="venue_page.php?vid=4">话剧艺术中心</a>
		            </div>

		            <div style="margin-top: 30px;">
		            	<a href="venue_page.php?vid=5"><img src="http://static.228.cn//upload/2012/01/10/AfterTreatment/120110145414134-0.jpg" style="width: 260px; height: 150px">
		            	</a>
		            </div>
		            <div>
		            	<a href="venue_page.php?vid=5">中国国家话剧院</a>
		            </div>

		            <div style="margin-top: 30px;">
		            	<a href="venue_page.php?vid=6"><img src="http://www.mengjinghui.com.cn/images/theatres/photo_fengchao.png" style="width: 260px; height: 150px">
		            	</a>
		            </div>
		            <div>
		            	<a href="venue_page.php?vid=6">蜂巢剧场</a>
		            </div>
		        </div>
			</div>

			<div style="float:right; margin-bottom: 20px;"><a href="venue_list.php">More...</a></div>

			<hr />
			
			<p>【演员信息】</p>
			<div id="bookrack" style="margin-left:0px; margin-top:40px; margin-bottom:40px;">
			    <a href="actor_page.php?aid=1" title="袁泉"><img src="http://static.damai.cn/http_imgload.aspx?p=e2e4c2cfeec21ee2e4c2cfeec21e0da95bce1e4b1e8a1e5b7d1ea91ecdcdb35e4b0dced0b0d2a9a9cdb07d5bed5bb05e5eb37db08ab3ed0d7d5be28acdcd4ba9df0d7dcedf0d7dce" alt="jquery" /></a>
			    <a href="actor_page.php?aid=2" title="赖声川"><img src="http://static.damai.cn/http_imgload.aspx?p=e2e4c2cfeec21ee2e4c2cfeec21e0da95ba91e5b0d1eed1e5b7d1ea91ecd1f0de2afaf7d1fb01f5ecd5eb07dd21f5eb05e0dd05eb0d2ce5eed0d5bcdb3d0a97dcddf0d7dcedf0d7dce" alt="jquery" /></a>
			    <a href="actor_page.php?aid=5" title="孟京辉"><img src="http://static.damai.cn/http_imgload.aspx?p=e2e4c2cfeec21ee2e4c2cfeec21e0da95ba91e5b0d1ece1e5b8a1e5b0d1e4bce5eed5e8acdceb0ce4b7d5eb07db35b1fb04b7de2d0b0af5e8a1f5b7d7dd21fd0a91fdf0d7dcedf0d7dce" alt="jquery" /></a>
			    <a href="actor_page.php?aid=7" title="黄磊"><img src="http://static.damai.cn/http_imgload.aspx?p=e2e4c2cfeec21ee2e4c2cfeec21e0da95b5b1e5b1e5b5b1e5b7d1ea91ece0d0d5e8ae25eceb0e2d2cd8ab07dcd7d1fb0b3d28a1fb0ce8ae2cdce8a4b4b4bb3ced2df0d7dcedf0d7dce" alt="jquery" /></a>
			    <a href="actor_page.php?aid=8" title="孙莉"><img src="http://uploads.theatreabove.com/file/20160112/20160112225313_203.jpg" alt="jquery" /></a>
			    <a href="actor_page.php?aid=11" title="谢娜"><img src="http://pic.sc.chinaz.com/Files/pic/pic9/201211/xpic8240_s.jpg" alt="jquery" /></a>
			    <a href="actor_page.php?aid=6" title="何炅"><img src="http://uploads.theatreabove.com/file/20160413/20160413162113_994.jpg" alt="jquery" /></a>
			    <a href="actor_page.php?aid=10" title="沈腾"><img src="http://www.kaixinmahua.com.cn/uploadfile/2013/0520/20130520112005240.png" alt="jquery" /></a>
			    <a href="actor_page.php?aid=3" title="胡歌"><img src="http://n.sinaimg.cn/ent/transform/20160107/SLBX-fxnkkuv4143946.jpg" alt="jquery" /></a>
			</div>

			<div style="float:right;"><a href="actor_list.php">More...</a></div>

			<script type="text/javascript">
			var Bookrack = function(a, b, c, e) {
			    this.scale = e || 0.4;
			    this.x = b || 120;
			    this.y = c || 160;
			    this.border = 2;
			    this.init(a);
			    this.exec(Math.ceil(Math.random() * this.imgs.length))
			};
			Bookrack.prototype = {
			    init: function(a) {
			        this.width = a.clientWidth - 2 * this.x * this.scale;
			        a.style.position = "relative";
			        a.style.height = this.y + "px";
			        this.imgs = a.getElementsByTagName("a");
			        var b = this,
			        c = document.createElement("span"),
			        e,
			        d;
			        this.each(function(a, g) {
			            a.style.position = "absolute";
			            a.style.bottom = "0";
			            a.style.border = this.border + "px solid gray";
			            a.style.left = this.width * (g / this.imgs.length) + 2 * this.border + "px";
			            a.setAttribute("dir", g);
			            d = a.getElementsByTagName("img")[0].getAttribute("alt").split("|");
			            e = c.cloneNode(!0);
			            e.innerHTML = a.getAttribute("title");
			            a.appendChild(e);
			            a.onmouseover = function() {
			                b.exec(this.getAttribute("dir"))
			            }
			        })
			    },
			    each: function(a) {
			        for (var b = 0,
			        c; c = this.imgs[b++];) a.call(this, c, b, this.imgs.length)
			    },
			    color: function(a) {
			        a = (~~ (255 * a)).toString(16);
			        2 > a.length && (a = "0" + a);
			        a = a.substr(0, 2);
			        return "#" + a + a + a
			    },
			    exec: function(a) {
			        this.each(function(b, c, e, d, f) {
			            b.getElementsByTagName("span")[0].style.display = "none";
			            c == a && (b.getElementsByTagName("span")[0].style.display = "block");
			            d = Math.min(c / a, a / c);
			            f = Math.sin(90 * (Math.PI / 180) * d) * (1 - this.scale);
			            b.style.zIndex = Math.ceil(1E4 * f);
			            b.style.borderColor = this.color(f + this.scale);
			            b.style.width = this.x * (f + this.scale) - 2 * this.border + "px";
			            b.style.height = this.y * (f + this.scale) - 2 * this.border + "px";
			            b.style.marginLeft = this.x * f / -2 + "px"
			        })
			    }
			};
			new Bookrack(document.getElementById('bookrack'), 120, 160);
			</script>	
		</section>
		
 		<footer style="text-align:center;clear:both">
 			<hr />
 			<p>Drama话剧推荐系统</p>
 		</footer>
 	
 	</div>

</body>
</html>