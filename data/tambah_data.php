<fieldset>
	<legend>Tambah Data Lapangan</legend>
    
    <?php
	$carikode=mysql_query("select max(no_mobil) from tb_lapang;") or die(mysql_error());
	$datakode=mysql_fetch_array($carikode);
	if ($datakode){
		$nilaikode=substr($datakode[0],1);
		$kode=(int) $nilaikode;
		$kode=$kode+1;
		$hasilkode="M".str_pad($kode,3,"0",STR_PAD_LEFT);
	}else{
		$hasilkode="M001";
	}
	?>
    
	<form action="" method="post">
    <table>
    	<tr>
        	<td>Nomor</td>
            <td>:</td>
        	<td><input type="text" name="no_mobil" value=<?php echo $hasilkode; ?> /></td>
        </tr>
    	<tr>
        	<td>Kode Lapang</td>
            <td>:</td>
        	<td><input type="text" name="kode_mobil"/></td>
        </tr>
       <tr>
				<td>merk</td>
				<td>:</td>
				<td><input type="text" name="merk" /></td>
			</tr>
			<tr>
				<td>type</td>
				<td>:</td>
				<td><input type="text" name="type" /></td>
			</tr>
			<tr>
				<td>warna</td>
				<td>:</td>
				<td><input type="text" name="warna" /></td>
			</tr>
			<tr>
				<td>tarif 12jam</td>
				<td>:</td>
				<td><input type="text" name="tarif per hari" /></td>
			</tr>
			<tr>
        	<td></td>
            <td></td>
        	<td><input type="submit" name="tambah" value="Tambah"/><input name="reset" type="reset" value="Reset"></td>
        </tr>
    </table>
    </form>
    
    <?php
	$no_mobil=@$_POST['no_mobil'];
	$kode_mobil=@$_POST['kode_mobil'];
	$merk=@$_POST['merk'];
	$type=@$_POST['type'];
	$warna=@$_POST['warna'];
	$tarifperhari=@$_POST['tarif per hari'];
	
	$tambah_data=@$_POST['tambah'];
	
	if($tambah_data){
		if($no_mobil=="" || $kode_mobil == "" || $merk == "" || $type == "" || $warna == "" || $tarifperhari == ""){
			?>
            <script type="text/javascript">
			alert("Inputan tidak boleh kosong!");
            </script>
            <?php
		}else{
			mysql_query("insert into tb_mobil values('$no_mobil','$kode_mobil','$merk','$type','$warna','$tarifperhari')") or die (mysql_error()) ;	
		?>
            <script type="text/javascript">
			alert("Tambah data berhasil!");
			window.location.href="?page=mobil";
            </script>
            <?php
		}
	}
	?>
</fieldset>