<?php  

		$sql = $koneksi->query("select kode_pelanggan from tb_pelanggan order by kode_pelanggan desc");

		$data = $sql->fetch_assoc();

		$kode_pelanggan = $data['kode_pelanggan'];

		$urut = substr($kode_pelanggan, 4, 4);

		$tambah = (int) $urut+1;

		if (strlen($tambah) == 1) {
			$format="PLG-"."000".$tambah;
		}elseif (strlen($tambah) == 2) {
			$format="PLG-"."000".$tambah;
		}elseif (strlen($tambah) == 3) {
			$format="PLG-"."000".$tambah;
		}else{
			$format="PLG-"."000".$tambah;
		}

?>




<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Pelanggan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method ="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode Pelanggan</label>
                  <input type="text" class="form-control" value="<?php echo $format ?>" name="kode">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" name="nama">
                </div>

             	<div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="3" placeholder="masukkan alamat ..." name="alamat"></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">No Telepon</label>
                  <input type="text" class="form-control" name="telepon">
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

       				$sql = $koneksi->query("insert into tb_pelanggan (kode_pelanggan, nama, alamat, telepon)values('$kode', '$nama', '$alamat', '$telepon') ");

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