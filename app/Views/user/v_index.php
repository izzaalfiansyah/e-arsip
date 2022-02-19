<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Pengguna</h3>

                <div class="box-tools pull-right">
                    <a href="<?= base_url('user/add') ?>" class="btn btn-primary btn-sm btn-flat">
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
                            <th width="80px">No</th>
                            <th>Nama Pengguna</th>
                            <th>E-Mail</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Divisi/Instansi</th>
                            <th>Foto</th>
                            <?php if(session()->get('level') == '1'): ?>
                                <th width="100px">Aksi</th>
                            <?php endif ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($user as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nama_user']; ?></td>
                                <td><?= $value['email']; ?></td>
                                <td><?= $value['password']; ?></td>
                                <td><?php if ($value['level']== 1) {
                                        echo 'Admin' ;
                                     } else if ($value['level'] == '2') {
                                         echo 'User' ;
                                     } else {
                                         echo 'Lurah';
                                     }  ?>
                                </td>
                                <td><?= $value['nama_divisi']; ?></td>
                                <td><img src="<?= base_url('foto/'. $value['foto'])?>" style="width: 80px; height: 80px; object-fit: cover;" ></td>
                                <?php if(session()->get('level') == '1'): ?>
                                    <td class="text-center">
                                        <a href="<?= base_url('user/edit/' . $value['id_user']) ?>" class="btn btn-xs btn-warning" >edit</a>
                                        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_user']; ?>">Hapus</button>
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
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_user']; ?>">
        <div class="modal-dialog modal-sm modal-danger">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Pengguna</h4>
                </div>
                <div class="modal-body">
                
                    Apakah Anda Yakin Untuk Menghapus <b><?= $value['nama_user']; ?></b> ..??
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('user/delete/' . $value['id_user'])?>" type="submit" class="btn btn-primary">Yakin</a>
                </div>
               
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
 <!-- /.modal akhir delete kategori -->