<?php  

		$kode = $_GET['id'];

		$sql = $koneksi->query("select * from tb_pelanggan where kode_pelanggan ='$kode'");

		$data = $sql->fetch_assoc();

		

?>




<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Data Pelanggan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method ="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode Pelanggan</label>
                  <input type="text" class="form-control" value="<?php echo $data['kode_pelanggan'] ?>" readonly name="kode">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" value="<?php echo $data['nama'] ?>" name="nama">
                </div>

             	<div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="3" placeholder="masukkan alamat ..." name="alamat"><?php echo $data['alamat']; ?></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">No Telepon</label>
                  <input type="text" class="form-control" value="<?php echo $data['telepon'] ?>" name="telepon">
                </div>

                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
       


       	<?php  

       			if (isset($_POST['simpan'])) {
       				
       				$kode = $_POST['kode'];
       				$nama = $_POST['nama'];
       				$alamat = $_POST['alamat'];
       				$telepon = $_POST['telepon'];

       				$sql = $koneksi->query("update tb_pelanggan set nama='$nama', alamat='$alamat', telepon='$telepon' where kode_pelanggan='$kode'");

       				if ($sql) {
       					?>

       					<script type="text/javascript">
       						alert ("Data Berhasil Disimpan");
       						window.location.href="?page=pelanggan";

       					</script>


       					<?php
       				}

       			}

       	?>