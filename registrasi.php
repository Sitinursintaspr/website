<?php require_once('Connections/Registrasi.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO pendaftaran (Nama, Password, Email) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['Nama'], "text"),
                       GetSQLValueString($_POST['User'], "text"),
                       GetSQLValueString($_POST['Email'], "text"));

  mysql_select_db($database_Registrasi, $Registrasi);
  $Result1 = mysql_query($insertSQL, $Registrasi) or die(mysql_error());

  $insertGoTo = "Masuk.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_Registrasi, $Registrasi);
$query_Daftar = "SELECT * FROM pendaftaran";
$Daftar = mysql_query($query_Daftar, $Registrasi) or die(mysql_error());
$row_Daftar = mysql_fetch_assoc($Daftar);
$totalRows_Daftar = mysql_num_rows($Daftar);
?>



<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Registrasi</title>


<style type="text/css">
body{
	font-family:"Arial Black", Gadget, sans-serif;
	font-size:14px;
	background:url(gambar/h.gif);
	background-color:#000;
}
#utama{
	width:300px;
	margin:0 auto;
	margin-top:12%;
	 
}
#judul{
	padding:15px;
	text-align:center;
	color:#FFF;
	font-size:30px;
	background-color:#09F;
	border-top-right-radius:10px;
	border-top-left-radius:10px;
	border-bottom:3px solid #FFF;
}
#masuk{
	background-color:#CCC;
	padding:20px;
	border-bottom-right-radius:10px;
	border-bottom-left-radius: 10px;
}
input{
	padding:10px;
	border:0;
}
.Lg{
	width:240px;
}
.Btm{
	background-color:#09F;
	color:FFF;
	border-radius:10px;
}
</style>
</head>

<body>
	<div id="utama">
    	<div id="judul">
    	Registrasi
        </div>
		
		<div id="masuk">
		
		<form name="form" action="<?php echo $editFormAction; ?>" method="POST">
        
        <div>
		  <input name="Nama" type="text" placeholder="Nama" class="Lg">
		  </div>
			<div style="margin-top:10px;">
				<input name="User" type="text" placeholder="Username" class="Lg">
			</div>
			<div style="margin-top:10px;">
				<input name="Password" type="password" placeholder="Password" class="Lg">
			</div>
            <div style="margin-top:10px;">
		  <input name="Email" type="text" placeholder="Email" class="Lg">
			<div style="margin-top:10px;">
			  <input name="login" type="submit" value="Daftar" class="Btm">
			</div></br>
          <label>Sudah punya Akun? <a href="masuk.php">Login</a></label>
          <input type="hidden" name="MM_insert" value="form">
		</form>
        
        
        
	  </div>
    </div>
</body>
</html>
<?php
mysql_free_result($Daftar);
?>
