<fieldset>
	<legend>Tampil Data Lapangan</legend>
    
    <div style="margin-bottom:15px;" align="right">
        <form action="" method="post">
            <input type="text" name="inputan_pencarian" placeholder="Masukkan Kode Lapang/Jadwal.." style="width:200px; padding:5px;" />
            <input type="submit" name="cari_lapang" value="Cari" style="padding:3px;" />
         </form>
     </div>
    
    <table width="100%" border="1px" style="border-collapse:collapse;">
    <tr style="background-color:#3CC;">
    	<th>Nomor</th>
        <th>Kode Lapangan</th>
        <th>Tanggal</th>
        <th>Waktu Awal</th>
        <th>Waktu Akhir</th>
        <th>Tarif</th>
        <th>Opsi</th>
        </tr>
        <?php
		
		$inputan_pencarian=@$_POST['inputan_pencarian'];
		$cari_lapang=@$_POST['cari_lapang'];
		if($cari_lapang){
			if($inputan_pencarian !=""){
			$sql=mysql_query("select* from tb_lapang where kode_lapang like '%$inputan_pencarian%' or tanggal like '%$inputan_pencarian%' or waktu_awal like '%$inputan_pencarian%' or waktu_akhir like '%$inputan_pencarian%' or tarif like '%$inputan_pencarian%'") or die(mysql_error());
		}else{
			$sql=mysql_query("select* from tb_lapang") or die(mysql_error());
		}
		}else{
		$sql=mysql_query("select* from tb_lapang") or die(mysql_error());
		} 
		$cek=mysql_num_rows($sql);
		if($cek<1){ 
			?>
            <tr>
            	<td colspan="7" align="center" style="padding::10px;">Data tidak ditemukan!</td>
            </tr>
            <?php
		}else{
		
		while($data=mysql_fetch_array($sql)){
		?>
        <tr>
        	<td align="center"><?php echo $data['no_lapang'];?></td>
            <td align="center"><?php echo $data['kode_lapang'];?></td>
            <td align="center"><?php echo $data['tanggal'];?></td>
            <td align="center"><?php echo $data['waktu_awal'];?></td>
            <td align="center"><?php echo $data['waktu_akhir'];?></td>
            <td align="center"><?php echo $data['tarif'];?></td>
            <td align="center">
            	<a href="?page=lapang&action=edit&no_lapang=<?php echo$data['no_lapang'];?>"><button>Edit</button></a>
            	<a onclick="return confirm ('Anda yakin ingin menghapus data ini?')" href="?page=lapang&action=hapus&no_lapang=<?php echo$data['no_lapang'];?>"><button>Hapus</button></a>
            </td>
        </tr>
        <?php
			}
		}
		?>
        </table>
</fieldset>