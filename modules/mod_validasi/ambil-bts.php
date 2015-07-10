	<?php 
	
  mysql_connect('localhost','root','');
  mysql_select_db('db_layanan');
	
	$baca=mysql_query("select * from informasi where jenis_info='".$_POST["md"]."'") or die("gagal".mysql_error());
	while($r=mysql_fetch_array($baca)){
	
	?>
		
		<option name="bts" value="<?php echo $r["tgl_bts"] ?>"><?php echo $r["tgl_bts"] ?></option><br>
	<?php
	}
	
	
	
	?>