<?php  

		$sql = $koneksi->query("select id from tb_user order by id desc");

		$data = $sql->fetch_assoc();

		$id = $data['id'];

		$urut = ($id);

		$tambah = (int) $urut+1;

		if (strlen($tambah) == 1) {
			$format=" ".$tambah;
		}elseif (strlen($tambah) == 2) {
			$format=" ".$tambah;
		}else{
			$format=" ".$tambah;
		}

?>

<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Pengguna</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method ="POST" enctype="multipart/form-data">
              <div class="box-body">
              	<div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Id</label>
                  <input type="text" class="form-control" value="<?php echo $format ?>" name="id">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Username</label>
                  <input type="text" class="form-control" name="username">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" name="nama">
                </div>

             	<div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password">
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
       				
       				$id = $_POST['id'];
       				$username = $_POST['username'];
       				$nama = $_POST['nama'];
       				$password = $_POST['password'];
       				

       				$foto = $_FILES['foto']['name'];
       				$lokasi = $_FILES['foto']['tmp_name'];

       				$upload = move_uploaded_file($lokasi, "images/".$foto);


       			if ($upload) {

       				$sql = $koneksi->query("insert into tb_user (id, username, nama_user, password, level, foto)values('$id', '$username', '$nama', '$password', 'kasir', '$foto') ");

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