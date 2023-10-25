  <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Transaksi Laundry</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="?page=transaksi&aksi=tambah" class="btn btn-info" style="margin-bottom: 10px" title="tambah">Tambah</a>

              <a href="page/transaksi/cetak.php" class="btn btn-default" style="margin-bottom: 10px" title="tambah"><i class="fa fa-print"></i>Cetak</a>
              <table id="example1" class="table table-bordered ta9ble-striped">
                <thead>
                <tr>
                  <th>No</th>
                  
                  <th>Tanggal Transaksi</th>
                  <th>Keterangan</th>
                  <th>Catatan</th>
                  <th>Kasir</th>
                  <th>Pemasukan</th>
                  <th>Pengeluaran</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                	<?php 

                		$no = 1;

                		$sql = $koneksi->query("select * from tb_transaksi, tb_user where tb_transaksi.kode_user=tb_user.id");

                		while ($data = $sql->fetch_assoc()){

                	 ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['tgl_transaksi'] ?></td>
                  <td><?php echo $data['keterangan'] ?></td>
                  <td><?php echo $data['catatan'] ?></td>
                  <td><?php echo $data['nama_user'] ?></td>
                  <td><?php echo number_format($data['pemasukan']) ?></td>
                  <td><?php echo number_format($data['pengeluaran']) ?></td>
                  <td>
                    
                    <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')" href="?page=transaksi&aksi=hapus&id=<?php echo $data['kode_transaksi']; ?>" class="btn btn-danger" title="ubah"><i class="fa fa-trash"></i>Hapus</a>

                  </td>
                </tr>

                	<?php 

                		$masuk = $masuk+$data['pemasukan'];
                		$keluar = $keluar+$data['pengeluaran'];
                		$saldo = $masuk - $keluar;

                		} 

                	?>
             

               </tbody>

                <tfoot>
               <tr>
               		<th colspan="5" style="text-align: center"> Total Pemasukan dan Pengeluaran</th>
               		<td> <?php  echo number_format($masuk) ?> </td>
               		<td> <?php  echo number_format($keluar) ?> </td>
               </tr>

                <tr>
               		<th colspan="5" style="text-align: center"> Saldo Akhir</th>
               		<td> <?php  echo number_format($saldo) ?> </td>
               </tr>
			   </tfoot>
			   
              </table>
             </div>
            </div>
          </div>
        </section>
