<?php  

		$id = $_GET['id'];

		$sql = $koneksi->query("select * from tb_user where id ='$id'");

		$data = $sql->fetch_assoc();

		

?>
<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Data Pengguna</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method ="POST" enctype="multipart/form-data">
              <div class="box-body">
              	<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Id</label>
                  <input type="text" class="form-control" value="<?php echo $data['id']?>" name="id" readonly>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" value="<?php echo $data['username'] ?>" name="username">
                </div>

                  <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control" value="<?php echo $data['nama_user'] ?>" name="nama">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Foto</label>
                  <label> <img src="images/<?php echo $data['foto'] ?>" width="100" height="100" alt=""> </label>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Foto</label>
                  <input type="file"  name="foto">
                </div>

                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>

       	<?php  

       			if (isset($_POST['simpan'])) {
       				
       				$username = $_POST['username'];
       				$nama = $_POST['nama'];
       				$password = $_POST['password'];
       				

       				$foto = $_FILES['foto']['name'];
       				$lokasi = $_FILES['foto']['tmp_name'];


       			if (!empty($lokasi)) {

       				move_uploaded_file($lokasi, "images/".$foto);
       				$sql = $koneksi->query("update tb_user set username='$username', nama_user='$nama', foto='$foto' where id='$id'");

       				if ($sql) {
       					?>

       					<script type="text/javascript">
       						alert ("Data Berhasil Disimpan");
       						window.location.href="?page=pengguna";
       					</script>


       					<?php
       				}

       			}else{
       				$sql = $koneksi->query("update tb_user set username='$username', nama_user='$nama' where id='$id'");

       				if ($sql) {
       					?>

       					<script type="text/javascript">
       						alert ("Data Berhasil Disimpan");
       						window.location.href="?page=pengguna";
       					</script>


       					<?php
       				}
       			}

       		}

       	?>