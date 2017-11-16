<?php
	$no_lapang=@$_GET['no_lapang'];
	$sql=mysql_query("delete from tb_lapang where no_lapang='$no_lapang'") or die(mysql_error());
?>
	<script type="text/javascript">
		window.location.href="?page=lapang";
	</script>