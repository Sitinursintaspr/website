<?php
@session_start();
include"koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>Home</title>
<style type="text/css">
body{
	font-family:Arial;
	font-size:14px;
}

#canvas{
	width:960px;
	margin:0 auto;
	border:1px solid silver;
}

#Header{
	font-family:"Times New Roman", Times, serif; 
	font-style:bold;
	color:#FFF;
	font-size:50px;
	padding:70px;
	background:url(gambar/c.jpg)  no-repeat center;
	background-size:100% 150%;
	
}
#Menu{
	background-color:#0FF;
}
	#Menu ul{
		list-style: none;
		margin:0;
		padding:0;	
	}
	#Menu ul li:hover{
		background-color:#CCC;
	}
	#Menu ul li.utama{
		display:inline-table;
	}
	#Menu ul li a{
		display block;
		text-decoration:none;
		line-height:40px;
		padding:0 10px;
		
	}
	.utama ul{
		display:none;
		position:absolute;
		z-index:2;
	}
	.utama:hover ul{
		display:block;
	}
	.utama ul li{
		display:block;
		background-color:#09F;
		width:140px;
	}
		
#Isi{
	min-height:400px;
	padding:20px;
	
}
#Footer{
	text-align:center;
	padding:20px;
	background-color:#CCC;
	
}
</style>
</head>

<body>
<div id="canvas">
    <div id="Header">
    Booking Lapangan Badminton
    </div>
    
    <div id="Menu">
    	<ul>
    		<li class="utama"><a href="/website">Home</a></li>
            <li class="utama"><a href="">Lapangan</a>
               <ul>
                <li><a href="?page=lapangan">Info Lapangan</a></li>
                <li><a href="?page=tarif">Tarif</a></li>
                <li><a href="?page=jadwal">Jadwal</a></li>
               </ul>
             </li>
            <li class="utama"><a href="">Booking</a></li>
            <li class="utama"><a href="">Login</a>
            	<ul>
                <li><a href="masuk.php">Member</a></li>
                <li><a href="loginadmin.php">Admin</a></li>
               </ul>
             </li>
            <li class="utama"><a href="">Contact Us</a></li>
            <li class="utama"><a href="">Help</a></li>
    	</ul>
    </div>
    
    <div id="Isi">
    <?php
$page=@$_GET['page'];
if($page=="lapangan"){
	include "data/lapangan.php";
}else if($page=="tarif"){
	echo "Ini Halaman Tarif";
}else if($page=="jadwal"){
	echo "Ini Halaman Jadwal";
}else if($page==""){
	echo "Selamat Datang di GOR Siswanto";
}else{
	echo "404! Halaman tidak ditemukan";
}
?>
    </div>
    <!-- Insert to your webpage where you want to display the slider -->
    <div id="amazingslider-1" style="display:block;position:relative;margin:15px auto 30px;">
        <ul class="amazingslider-slides" style="display:none;">
            <li><img src="images/f.jpg" alt="LPG3" data-description="Welcome to Siswanto's Website
Hopefully you enjoy the ride!" />            </li>
            <li><img src="images/lapang.jpg" alt="LPG2" />            </li>
            <li><img src="images/background.jpg" alt="background" />            </li>
            <li><img src="images/badmmm.jpg" alt="Shuttle Cock" />            </li>
            <li><img src="images/c.jpg" alt="LPG1" />            </li>
            <li><img src="images/g.jpg" alt="Gold" />            </li>
            <li><img src="images/i.jpg" alt="Shuttle Cock 1" />            </li>
            <li><img src="images/n.jpg" alt="Shuttle Cock 2" />            </li>
        </ul>
        <ul class="amazingslider-thumbnails" style="display:none;">
            <li><img src="images/thumbnails/f.jpg" /></li>
            <li><img src="images/thumbnails/lapang.jpg" /></li>
            <li><img src="images/thumbnails/background.jpg" /></li>
            <li><img src="images/thumbnails/badmmm.jpg" /></li>
            <li><img src="images/thumbnails/c.jpg" /></li>
            <li><img src="images/thumbnails/g.jpg" /></li>
            <li><img src="images/thumbnails/i.jpg" /></li>
            <li><img src="images/thumbnails/n.jpg" /></li>
        </ul>
        <div class="amazingslider-engine" style="display:none;"><a href="http://www.amazingslider.com">jQuery Slider</a></div>
    </div>
    <!-- End of body section HTML codes -->
    
    <div id="Footer">
    @Copyrigt 2017 - Wendi Siswanto
    </div>
</div>

</body>
</html>
