  <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Transaksi Laundry</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a href="?page=laundry&aksi=tambah" class="btn btn-info" style="margin-bottom: 10px" title="tambah">Tambah</a>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Pelanggan</th>
                  <th>Tanggal Terima</th>
                  <th>Tanggal Selesai</th>
                  <th>Jenis Satuan</th>
                  <th>Jumlah Satuan</th>
                  <th>Jumlah Kiloan</th>
                  <th>Nominal</th>
                  <th>Catatan</th>
                  <th>Status</th>
                  <th>User</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                	<?php 

                		$no = 1;

                		$sql = $koneksi->query("select * from tb_laundry, tb_pelanggan, tb_user where tb_laundry.id_pelanggan=tb_pelanggan.kode_pelanggan and tb_laundry.kode_user=tb_user.id");

                		while ($data = $sql->fetch_assoc()){

                	 ?>
                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['nama'] ?></td>
                  <td><?php echo $data['tanggal_terima'] ?></td>
                  <td><?php echo $data['tanggal_selesai'] ?></td>
                  <td><?php echo $data['jenis_satuan'] ?></td>
                  <td><?php echo $data['jumlah_satuan'] ?></td>
                  <td><?php echo $data['jumlah_kiloan'] ?></td>
                  <td><?php echo $data['nominal'] ?></td>
                  <td><?php echo $data['catatan'] ?></td>
                  <td><?php echo $data['status'] ?></td>
                  <td><?php echo $data['nama_user'] ?></td>
                  <td>
                    
                      <!-- <a href="?page=laundry&aksi=ubah&id=<?php echo $data['id_laundry']; ?>" class="btn btn-success" title="ubah"><i class="fa fa-edit"></i> Ubah</a> -->

                       <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')" href="?page=laundry&aksi=hapus&id=<?php echo $data['id_laundry']; ?>" class="btn btn-danger" title="ubah"><i class="fa fa-trash"></i>Hapus</a>

                      <!-- <a onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ?')" href="?page=laundry&aksi=hapus&id=<?php #echo $data['kode_pelanggan']; ?>" class="btn btn-danger" title="ubah"><i class="fa fa-trash"></i>Hapus</a> -->

                      <?php 

                        if ($data['status']=="Belum Lunas") {
                           

                        ?>

                            <a href="?page=laundry&aksi=lunas&id=<?php echo $data['id_laundry']; ?>" class="btn btn-primary" title=""><i class="fa fa-money"></i> Lunaskan</a>


                        <?php   } ?>

                        <a target="blank" href="page/laundry/cetak.php?ubah&id=<?php echo $data['id_laundry']; ?>" class="btn btn-default" title="ubah"><i class="fa fa-print"></i> Cetak</a>

                       

                  </td>

                </tr>
                	<?php } ?>
               </tbody>
              </table>
             </div>
            </div>
          </div>
        </section>
