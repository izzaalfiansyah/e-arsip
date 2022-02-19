<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Arsip</h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url('arsip/add') ?>" class="btn btn-primary btn-sm btn-flat">
                        <i class="fa fa-plus"></i> Add</a>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo ' <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Sekses! ';
                    echo session()->getFlashdata('pesan');
                    echo '</h4></div>';
            }
            ?>
            <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Arsip</th>
                            <th>Nama Arsip</th>
                            <th>Kategori</th>
                            <th>Upload</th>
                            <th>Update</th>
                            <th>Nama Pengguna</th>
                            <th>Divisi/Instansi</th>
                            <th>File</th>
                            <?php if(session()->get('level') == '1'): ?>
                                <th width="100px">Aksi</th>
                            <?php endif ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($arsip as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['no_arsip']; ?></td>
                                <td><?= $value['nama_arsip']; ?></td>
                                <td><?= $value['nama_kategori']; ?></td>
                                <td><?= $value['tanggal_upload']; ?></td>
                                <td><?= $value['tanggal_update']; ?></td>
                                <td><?= $value['nama_user']; ?></td>
                                <td><?= $value['nama_divisi']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('arsip/viewpdf/' . $value['id_arsip']) ?>">
                                            <i class="fa fa-file-pdf-o fa-2x label-danger"></i></a><br>
                                        <?= number_format($value['ukuran_file'], 0); ?> Byte
                                </td>
                                <?php if(session()->get('level') == '1'): ?>
                                    <td class="text-center">        
                                        <a href="<?= base_url('arsip/edit/' . $value['id_arsip']) ?>" class="btn btn-xs btn-warning" >edit</a>
                                        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_arsip']; ?>">Hapus</button>
                                    </td>
                                <?php endif ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>


<!-- /.modal delete kategori -->
<?php foreach ($arsip as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_arsip']; ?>">
        <div class="modal-dialog modal-sm modal-danger">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Pengguna</h4>
                </div>
                <div class="modal-body">
                
                    Apakah Anda Yakin Untuk Menghapus <b><?= $value['nama_arsip']; ?></b> ..??
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('arsip/delete/' . $value['id_arsip'])?>" type="submit" class="btn btn-primary">Yakin</a>
                </div>
               
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
 <!-- /.modal akhir delete kategori -->