
<div class="col-md-9">
	<div class="pull-right">
	<button class="btn btn-info hp" onclick="window.print()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Cetak</button>
	</div>	
</div>

<?php if (!empty($proyek)): ?>
	<div class="col-md-9">
           <div class="box box-primary">
                      <div class="box-header">
                         <h4 class="text-center">PROYEK</h4>
                      </div>

                      <div class="box-body table-responsive">
                        <table id="rab" class="table table-bordered table-striped ">
                          <thead>
                          <tr>
 							  <th>No</th>
			                  <th>ID PROYEK</th>
			                  <th>NAMA ANGGOTA</th>
			                  <th>NAMA PROYEK</th>
			                  <th>LAMA PROYEK</th>
			                  <th>MULAI PROYEK</th>
			                  <th>SELESAI PROYEK</th>
			                  <th>NILAI PROYEK</th>
			                  <th width="10%">STATUS PROYEK</th>
                          </tr>
                          </thead>
                          <tbody>
					<?php 
                     $count = 0;           
                     foreach ($proyek->result() as $row) : 
                      $count++; 
                  	?> 
			                <tr>
			                  <th scope="row"><?php echo $count;?></th> 
			                  <td>
			                    <?php echo $row->id_proyek;?>
			                  </td>
			                  <td>
			                    <?php echo $row->nama_anggota;?>
			                  </td>
			                  <td>
			                    <?php echo $row->nama_proyek;?>
			                  </td>
			                  <td>
			                    <?php echo $row->lama_proyek." Hari";?>
			                  </td>
			                  <td>
			                    <?php echo $row->mulai_proyek;?>
			                  </td>
			                  <td>
			                    <?php echo $row->selesai_proyek;?>
			                  </td>
			                  <td>
			                    <?php echo "Rp. ".number_format($row->nilai_proyek);?>
			                  </td>
			                  <td>
			                    <?php if($row->status_proyek == "pending" ) :?>
			                      <span class="label label-warning">Pending</span>
			                    <?php elseif ($row->status_proyek == "proses") : ?>
			                      <span class="label label-primary">Proses</span>
			                   <?php elseif ($row->status_proyek == "selesai") : ?>
			                      <span class="label label-success">Selesai</span>
			                    <?php endif ?>
			                  </td>

			                </tr>
                		<?php endforeach; ?>
                        </tbody>
                        </table>
                    </div>
        	</div>
      	</div>
<?php endif ?>

<?php if (!empty($rab)): ?>
	<div class="col-md-9">
           <div class="box box-primary">
                      <div class="box-header">
                         <h4 class="text-center">RAB</h4>
                      </div>
                      <div class="box-body table-responsive">
                        <table id="rab" class="table table-bordered table-striped ">
                          <thead>
                          <tr>
 							  <th>No</th>
			                  <th>ID RAB</th>
			                  <th>NAMA RAB</th>
			                  <th>DANA RAB</th>
			                  <th>STATUS RAB</th>
			                  <th width="10%">LAPORAN KEGIATAN</th>
			                  <th width="10%">LAPORAN KEUANGAN</th>
			                  <th width="10%">FOTO KEGIATAN</th>
                          </tr>
                          </thead>
                          <tbody>
					<?php 
                     $count = 0;           
                     foreach ($rab as $row) : 
                      $count++; 
                  	?> 
			                <tr>
			                  <th scope="row"><?php echo $count;?></th> 
			                  <td>
			                    <?php echo $row->id_rab;?>
			                  </td>
			                  <td>
			                    <?php echo $row->nama_rab;?>
			                  </td>
			                  <td>
			                    <?php echo "Rp. ".number_format($row->dana_rab);?>
			                  </td>
			                  <td>
			                    <?php if($row->status_rab == "pending" ) :?>
			                      <span class="label label-warning">Pending</span>
			                    <?php elseif ($row->status_rab == "proses") : ?>
			                      <span class="label label-primary">Proses</span>
			                   <?php elseif ($row->status_rab == "selesai") : ?>
			                      <span class="label label-success">Selesai</span>
			                    <?php endif ?>
			                  </td>
			                  <td>
			                    <?=(!empty($row->bukti_kegiatan)) ? '' : "&minus;";?>
			                        <?php if (!empty($row->bukti_kegiatan)) { ?>
			                        <a class="btn btn-primary btn-xs hp" href="<?=site_url('upload/rab/bukti_kegiatan/'.$row->bukti_kegiatan)?>">Lihat</a>
			                        <?php } ?>
			                  </td>
			                  <td>
			                    <?=(!empty($row->bukti_keuangan)) ? '' : "&minus;";?>
			                        <?php if (!empty($row->bukti_keuangan)) { ?>
			                        <a class="btn btn-primary btn-xs hp" href="<?=site_url('upload/rab/bukti_keuangan/'.$row->bukti_keuangan)?>">Lihat</a>
			                        <?php } ?>
			                  </td>
			                  <td>
			                    <?=(!empty($row->bukti_foto)) ? '' : "&minus;";?>
			                        <?php if (!empty($row->bukti_foto)) { ?>
			                        <a class="btn btn-primary btn-xs hp" href="<?=site_url('upload/rab/bukti_foto/'.$row->bukti_foto)?>">Lihat</a>
			                        <?php } ?>
			                  </td>
			                </tr>
                		<?php endforeach; ?>
                        </tbody>
                        </table>
                    </div>
        	</div>
      	</div>
<?php endif ?>


