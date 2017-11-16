<fieldset>
	<legend>Edit Data</legend>
    
    <?php
	$no_lapang=@$_GET['no_lapang'];
	$sql=mysql_query("select* from tb_lapang where no_lapang='$no_lapang'") or die(mysql_error());
	$data=mysql_fetch_array($sql);
	?>
    
    <form action="" method="post">
    <table>
    	<tr>
        	<td>Nomor</td>
            <td>:</td>
        	<td><input type="text" name="no_lapang" value=<?php echo $data['no_lapang']; ?> disabled="disabled" /></td>
        </tr>
    	<tr>
        	<td>Kode Lapang</td>
            <td>:</td>
        	<td><input type="text" name="kode_lapang" value=<?php echo $data['kode_lapang']; ?> /></td>
        </tr>
        <tr>
        	<td>Tanggal</td>
            <td>:</td>
        	<td><input type="text" name="tanggal" value=<?php echo $data['tanggal']; ?> /></td>
        </tr>
        <tr>
        	<td>Waktu Awal</td>
            <td>:</td>
        	<td><input type="text" name="waktu_awal" value=<?php echo $data['waktu_awal']; ?> /></td>
        </tr>
        <tr>
        	<td>Waktu Akhir</td>
            <td>:</td>
        	<td><input type="text" name="waktu_akhir" value=<?php echo $data['waktu_akhir']; ?> /></td>
        </tr>
        <tr>
        	<td>Tarif</td>
            <td>:</td>
        	<td><input type="text" name="tarif" value=<?php echo $data['tarif']; ?> /></td>
        </tr>
        <tr>
        	<td></td>
            <td></td>
        	<td><input type="submit" name="edit" value="Edit"/><input name="reset" type="reset" value="Batal"></td>
        </tr>
    </table>
    </form>
    <?php
	
	$kode_lapang=@$_POST['kode_lapang'];
	$tanggal=@$_POST['tanggal'];
	$waktu_awal=@$_POST['waktu_awal'];
	$waktu_akhir=@$_POST['waktu_akhir'];
	$tarif=@$_POST['tarif'];
	
	$edit_data=@$_POST['edit'];
	
	if($edit_data){
		if($kode_lapang == "" || $tanggal == "" || $waktu_akhir == "" || $waktu_akhir == ""){
			?>
            <script type="text/javascript">
			alert("Inputan tidak boleh kosong!");
            </script>
            <?php
		}else{
			mysql_query("update tb_lapang set kode_lapang='$kode_lapang', tanggal='$tanggal', waktu_awal='$waktu_awal', waktu_akhir='$waktu_akhir', tarif='$tarif' where no_lapang='$no_lapang'") or die (mysql_error()) ;	
	?>
    <script type="text/javascript">
			alert("Data berhasil diedit");
			window.location.href="?page=lapang";
            </script>
            <?php
		}
	}
	?>
</fieldset>