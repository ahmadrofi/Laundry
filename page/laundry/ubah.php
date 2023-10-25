<?php  

		$id = $_GET['id'];

		$sql = $koneksi->query("select * from tb_laundry where id_laundry ='$id'");

		$data = $sql->fetch_assoc();

		

?>


<script>
	
	function sum() {
		var jumlah_kiloan = document.getElementById('jumlah_kiloan').value;
		var total = parseInt(jumlah_kiloan)*7000;

		if (!isNaN(total)){

			document.getElementById('nominal').value = total;  
		}
	}

</script>



<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Ubah Status</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method ="POST">
              <div class="box-body">

              	<div class="form-group">
                  <label for="exampleInputEmail1">Id Laundry</label>
                  <input type="text" class="form-control" value="<?php echo $data['id_laundry'] ?>" name="id_laundry" readonly="">
                </div>

              	<div class="form-group">
                <label>Pelanggan</label>
                <select class="form-control select2" style="width: 100%;" name="pelanggan" required="">
                  <option value="<?php echo $data['kode_pelanggan'] ?>">- Pilih Pelanggan -</option>
                  
                  <?php  

                  		$sql= $koneksi->query("select * from tb_pelanggan");

                  		while ($data=$sql->fetch_assoc()) {
                  			echo "

                  				<option value='$data[kode_pelanggan]'>$data[nama]</option>

                  			";

                  		}


                  ?>

                </select>
              </div>
               
                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Terima</label>
                  <input type="date" class="form-control" name="tgl_terima" value="<?php echo $data['tgl_terima'] ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Selesai</label>
                  <input type="date" class="form-control" name="tgl_selesai" value="<?php echo $data['tgl_selesai'] ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Kilonan</label>
                  <input type="number" class="form-control" onkeyup="sum();" id="jumlah_kiloan" name="jml_kiloan" required="" value="<?php echo $data['jml_kiloan'] ?>">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Total</label>
                  <input type="number" class="form-control" name="total" id="nominal" readonly="">
                </div>


                <div class="form-group">
                <label>Status</label>
                <select class="form-control select2" style="width: 100%;" name="status" required="">
                  <option value="<?php echo $data['status'] ?>">- Pilih Status -</option>
                  
                  <option value="Lunas"> Lunas </option>

                  <option value="Belum Lunas"> Belum Lunas </option>

                </select>
              </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Catatan</label>
                  <textarea class="form-control" rows="3" name="catatan" value="<?php echo $data['catatan'] ?>"></textarea>
                </div>

                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
       


       	<?php  

       			if (isset($_POST['simpan'])) {
       				
       				$id_laundry = $_POST['id_laundry'];
       				$pelanggan = $_POST['pelanggan'];
       				$tgl_terima = $_POST['tgl_terima'];
       				$tgl_selesai = $_POST['tgl_selesai'];
       				$jml_kiloan = $_POST['jml_kiloan'];
       				$total = $_POST['total'];
       				$status = $_POST['status'];
       				$catatan = $_POST['catatan'];

       				
       				$sql = $koneksi->query("update tb_pelanggan set id_laundry='$id_laundry' ,id_pelanggan='$id_laundry', kode_user='$kode_user', tanggal_terima='$tgl_terima', tanggal_selesai='$tgl_selesai', jumlah_kiloan='$jml_kiloan', nominal, total='$total' ,status='$status', catatan='$catatan' where id_laundry='$id_laundry'");

       				if ($sql) {
       					?>

       					<script type="text/javascript">
       						alert ("Data Berhasil Disimpan");
       						window.location.href="?page=laundry";

       					</script>


       					<?php
       				}


       				if ($status="Lunas") {
	       				$sql = $koneksi->query("insert into tb_transaksi (kode_user ,tgl_transaksi, pemasukan, catatan, keterangan)values('$id_user', '$tgl_terima', '$total', '$catatan',  'pemasukan') ");

       					if ($sql) {
       						?>

       						<script type="text/javascript">
       						alert ("Data Berhasil Disimpan");
       						window.location.href="?page=laundry";

       						</script>


       						<?php
       				}
       				}


       			}

       	?>
