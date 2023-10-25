<?php 

$id = $_GET['id'];

$sql = $koneksi->query("delete from tb_laundry where id_laundry='$id'");

if ($sql) {
	?>

       					<script type="text/javascript">
       						alert ("Data Berhasil Dihapus");
       						window.location.href="?page=laundry";

       					</script>


       					<?php
}

?>