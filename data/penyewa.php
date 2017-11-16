<fieldset>
	<legend>Booking</legend>
    
    
	<form action="" method="post">
    <table>
    	<tr>
        	<td>Nama</td>
            <td>:</td>
        	<td><input type="text" name="Nama" /></td>
        </tr>
    	<tr>
        	<td>Jenis Kelamin</td>
            <td>:</td>
        	<td><input type="text" name="Jenis_Kelamin"/></td>
        </tr>
        <tr>
        	<td>Kode Lapang</td>
            <td>:</td>
        	<td><input type="text" name="Lapangan"/></td>
        </tr>
        <tr>
        	<td>Tanggal</td>
            <td>:</td>
        	<td><input type="text" name="Hari"/></td>
        </tr>
        <tr>
        	<td>Waktu Awal</td>
            <td>:</td>
        	<td><input type="text" name="Waktu_Awal"/></td>
        </tr>
        <tr>
        	<td>Waktu Akhir</td>
            <td>:</td>
        	<td><input type="text" name="Waktu_Akhir"/></td>
        </tr>
        <tr>
        	<td>Tarif</td>
            <td>:</td>
        	<td><input type="text" name="Tarif"/></td>
        </tr>
        <tr>
        	<td></td>
            <td></td>
        	<td><input type="submit" name="Booking" value="Booking"/><input name="reset" type="reset" value="Reset"></td>
        </tr>
    </table>
    </form>
    
    <?php
	$Nama=@$_POST['Nama'];
	$Jenis_Kelamin=@$_POST['Jenis_Kelamin'];
	$Lapangan=@$_POST['Lapangan'];
	$Hari=@$_POST['Hari'];
	$Waktu_Awal=@$_POST['Waktu_Awal'];
	$Waktu_Akhir=@$_POST['Waktu_Akhir'];
	$Tarif=@$_POST['Tarif'];
	
	$Booking=@$_POST['Booking'];
	
	if($Booking){
		if($Nama=="" || $Jenis_Kelamin == "" || $Lapangan == "" || $Hari == "" || $Waktu_Awal == "" || $Waktu_Akhir == "" || $Tarif == ""){
			?>
            <script type="text/javascript">
			alert("Inputan tidak boleh kosong!");
            </script>
            <?php
		}else{
			mysql_query("insert into booking values('$Nama','$Jenis_Kelamin','$Lapangan','$Hari','$Waktu_Awal','$Waktu_Akhir','$Tarif')") or die (mysql_error()) ;	
		?>
            <script type="text/javascript">
			alert("Booking berhasil!");
			window.location.href="";
            </script>
            <?php
		}
	}
	?>
</fieldset>