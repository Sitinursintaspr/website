<?php
@session_start();
include"koneksi.php";
?>


<!DOCTYPE html>
<html>
<head>
<title>Home Member</title>
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
    		<li class="utama"><a href="?page=lapangan">Informasi Lapangan</a></li>
            <li class="utama"><a href="?page=penyewa">Booking</a></li>
            
            <li class="utama"  style="float:right; background-color:#F00;"><a href="masuk.php">Logout</a></li></li>
    	</ul>
         
    </div>
    
    <div id="Isi">
    <?php
$page=@$_GET['page'];
$action=@$_GET['action'];
if($page=="lapangan"){
	include "data/lapangan.php";
}else if($page=="penyewa"){
	if($action==""){/**/
		include "data/penyewa.php";
	}
}?>
    </div>
    
    <div id="Footer">
    @Copyrigt 2017 - Wendi Siswanto
    </div>
</div>

</body>
</html>

