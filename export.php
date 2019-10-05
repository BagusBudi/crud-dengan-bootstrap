<?php 
//disini kita akan mengkoneksikan database
$db_host='localhost'; //nama host
$db_user='root'; //nama user
$db_pass=''; //password
$db_db='mahasiswa'; //database yang akan di hubungkan

$db_conn=mysql_connect($db_host,$db_user,$db_pass,$db_db) or die ('Tidak terhubung ke mysql');
$db_select=mysql_select_db($db_db) or die('Tidak terhubung ke database');
//kita akan menambahkan script export di sini
header("content-type:application/vnd-ms-exel");
//membuat file excel
header("content-disposition:attachment;filename=data-siswa.xls");
//membuat nama file

?>

<table border="1" width="100%">
	<tr align="center" bgcolor="yellow">
		<td>NIM</td>
		<td>NAMA MAHASISWA</td>
		<td>JENIS KELAMIN</td>
		<td>JURUSAN</td>
		<td>FAKULTAS</td>
	</tr>
	<?php
		$query=mysql_query("select * from data");
		while($data=mysql_fetch_array($query)){
	 ?>
	<tr>
		<td><?php echo $data['nim']; ?></td>
		<td><?php echo $data['nama']; ?></td>
		<td><?php echo $data['jenis_kelamin']; ?></td>
		<td><?php echo $data['jurusan']; ?></td>
		<td><?php echo $data['fakultas']; ?></td>
	</tr>
	<?php } ?>
</table>