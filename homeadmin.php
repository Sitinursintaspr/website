<?php
@session_start();
include"koneksi.php";
if(@$_SESSION['Admin']){
?>


<!DOCTYPE html>
<html>
<head>
<title>Home Admin</title>
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
    Rental Mobil Online
    </div>
    
    <div id="Menu">
    	<ul>
			<li class="utama"><a href="/rentcar">Beranda</a></li>
			<li class="utama"><a href="">Mobil</a>
				<ul>
					<li><a href="?page=mobil">Lihat Mobil</a></li>
					<li><a href="?page=mobil&action=tambah">Tambah Data</a></li>
				</ul>
			</li>
			<li class="utama"><a href="">Penyewa</a>
				<ul>
					<li><a href="?page=penyewa">Lihat Penyewa</a></li>
					<li><a href="">Tambah Data</a></li>
				</ul>
			</li>
            <li class="utama"  style="float:right; background-color:#F00;"><a href="Logout.php">Logout</a></li>
            <li class="utama"  style="float:right;">
            <?php
				if(@$_SESSION['Admin']){
					$user_login=@$_SESSION['Admin'];
				}
				
				$sql_user=mysql_query("select* from admin where kode_user='$user_login'") or die (mysql_error());
				$data_user=mysql_fetch_array($sql_user);
            ?>
            <a>Welcome, <?php echo $data_user['Nama']; ?></a></li>
            </li>
    	</ul>
         
    </div>
    
  <div id="isi">
	<?php
	$page = @$_GET['page'];
	$action = @$_GET['action'];
	if ($page == "mobil") {
		if ($action == "") {
			include "inc/mobil.php";
		} else if($action == "tambah") {
			include "inc/tambah_mobil.php";
		}
	} else if($page=="penyewa") {
		echo "Ini Halaman Penyewa";
	} else if ($page=="") {
		echo "Selamat Datang di Halaman Utama";
	}else if($page==""){
	echo "Selamat Datang di Rental Mobil Online";
	} else {
		echo "404! Halaman Tidak Ditemukan";
	}
	?>
	</div>
    
    <div id="Footer">
		@Copyrigt 2017 - Siti Nursinta Supartina
    </div>
</div>

</body>
</html>

<?php
}else{
	header("location:loginadmin.php");
}
?>