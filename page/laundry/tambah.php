<?php  

		$sql = $koneksi->query("select id_laundry from tb_laundry order by id_laundry desc");

		$data = $sql->fetch_assoc();

		$id_laundry = $data['id_laundry'];

		$urut = ($id_laundry);

		$tambah = (int) $urut+1;

		if (strlen($tambah) == 1) {
			$format=" ".$tambah;
		}elseif (strlen($tambah) == 2) {
			$format=" ".$tambah;
		}else{
			$format=" ".$tambah;
		}

?>


<script>
	
	function sum2() {
		var jumlah_kiloan = document.getElementById('jumlah_kiloan').value;
		var total = parseInt(jumlah_kiloan)*7000;

		if (!isNaN(total)){

			document.getElementById('nominal').value = total;  
		}
	}

</script>


<script>
  
  function sum1() {
    var jumlah_satuan = document.getElementById('jumlah_satuan').value;
    var jenis_satuan = document.getElementById('jenis_satuan').value;
    if (jenis_satuan=="Baju") {
    var total = parseInt(jumlah_satuan)*7000;

    if (!isNaN(total)){

      document.getElementById('nominal').value = total;  
    }
   }
   else if (jenis_satuan=="Kemeja/jas") {
    var total = parseInt(jumlah_satuan)*15000;

    if (!isNaN(total)){

      document.getElementById('nominal').value = total;  
    }
   }
   else if (jenis_satuan=="Handuk") {
    var total = parseInt(jumlah_satuan)*10000;

    if (!isNaN(total)){

      document.getElementById('nominal').value = total;  
    }
   }
   else if (jenis_satuan=="Gaun") {
    var total = parseInt(jumlah_satuan)*25000;

    if (!isNaN(total)){

      document.getElementById('nominal').value = total;  
    }
   }
   else if (jenis_satuan=="Kebaya") {
    var total = parseInt(jumlah_satuan)*25000;

    if (!isNaN(total)){

      document.getElementById('nominal').value = total;  
    }
   }
   else if (jenis_satuan=="Jaket") {
    var total = parseInt(jumlah_satuan)*15000;

    if (!isNaN(total)){

      document.getElementById('nominal').value = total;  
    }
   }
   else if (jenis_satuan=="Sprei") {
    var total = parseInt(jumlah_satuan)*10000;

    if (!isNaN(total)){

      document.getElementById('nominal').value = total;  
    }
   }
  }

</script>


<div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Status</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method ="POST">
              <div class="box-body">

              	<div class="form-group">
                  <label for="exampleInputEmail1">Id Laundry</label>
                  <input type="text" class="form-control" value="<?php echo $format ?>" name="id_laundry" readonly="">
                </div>

              	<div class="form-group">
                <label>Pelanggan</label>
                <select class="form-control select2" style="width: 100%;" name="pelanggan" required="">
                  <option value="selected">- Pilih Pelanggan -</option>
                  
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
                  <input type="date" class="form-control" name="tgl_terima">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Tanggal Selesai</label>
                  <input type="date" class="form-control" name="tgl_selesai">
                </div>

                   <div class="form-group">
                <label>Jenis Satuan</label>
                <select class="form-control select2" style="width: 100%;" name="jns_satuan" id="jenis_satuan" required="">
                  <option value="selected">- Pilih Jenis -</option>
                  
                  <option value="Baju"> Baju </option>
                  <option value="Kemeja/jas"> Kemeja/jas </option>
                  <option value="Handuk"> Handuk </option>
                  <option value="Gaun"> Gaun </option>
                  <option value="Kebaya"> Kebaya </option>
                  <option value="Jaket"> Jaket </option>
                  <option value="Sprei"> Sprei </option>

                </select>
              </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Satuan</label>
                  <input type="number" class="form-control" onkeyup="sum1();" id="jumlah_satuan" name="jml_satuan" required="">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Jumlah Kilonan</label>
                  <input type="number" class="form-control" onkeyup="sum2();" id="jumlah_kiloan" name="jml_kiloan" required="">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Total</label>
                  <input type="number" class="form-control" name="total" id="nominal" readonly="">
                </div>


                <div class="form-group">
                <label>Status</label>
                <select class="form-control select2" style="width: 100%;" name="status" required="">
                  <option value="selected">- Pilih Status -</option>
                  
                  <option value="Lunas"> Lunas </option>

                  <option value="Belum Lunas"> Belum Lunas </option>

                </select>
              </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Catatan</label>
                  <textarea class="form-control" rows="3" name="catatan"></textarea>
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
              $jns_satuan = $_POST['jns_satuan'];
       				$jml_satuan = $_POST['jml_satuan'];
              $jml_kiloan = $_POST['jml_kiloan'];
       				$total = $_POST['total'];
       				$status = $_POST['status'];
       				$catatan = $_POST['catatan'];

       				$sql = $koneksi->query("insert into tb_laundry (id_laundry ,id_pelanggan, kode_user, tanggal_terima, tanggal_selesai, jenis_satuan, jumlah_satuan, jumlah_kiloan, nominal, status, catatan)values('$id_laundry', '$pelanggan', '$id_user', '$tgl_terima', '$tgl_selesai', '$jns_satuan', '$jml_satuan', '$jml_kiloan', '$total', '$status', '$catatan') ");

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