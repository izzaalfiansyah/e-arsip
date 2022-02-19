<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Data Divisi/Instansi</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#add">
                        <i class="fa fa-plus"></i> Add</button>
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
                            <th>Divisi/Instansi</th>
                            <?php if(session()->get('level') == '1'): ?>
                                <th width="100px">Aksi</th>
                            <?php endif ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($divisi as $key => $value) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $value['nama_divisi']; ?></td>
                                <?php if(session()->get('level') == '1'): ?>
                                    <td class="text-center">
                                        <button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_divisi']; ?>">edit</button>
                                        <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?= $value['id_divisi']; ?>">Hapus</button>
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


        <!-- /.modal add divisi -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Divisi/Instansi</h4>
            </div>
            <div class="modal-body">
            <?php
            echo form_open('divisi/add')
            ?>

            <div class="form-group">
                <label > Nama Divisi/Instansi</label>
                <input name="nama_divisi" class="form-control"  placeholder="Divisi/Instansi" required>
            </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
 <!-- /.modal akhir add divisi -->



<!-- /.modal edit divisi -->
<?php foreach ($divisi as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_divisi']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Divisi/Instansi</h4>
                </div>
                <div class="modal-body">
                <?php
                echo form_open('divisi/edit/'. $value['id_divisi'])
                ?>

                <div class="form-group">
                    <label >Divisi/Instansi</label>
                    <input name="nama_divisi" value="<?= $value['nama_divisi']; ?>" class="form-control"  placeholder="divisi" required>
                </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Perbaharui</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
 <!-- /.modal akhir edit divisi -->


<!-- /.modal delete divisi -->
<?php foreach ($divisi as $key => $value) { ?>
    <div class="modal fade" id="delete<?= $value['id_divisi']; ?>">
        <div class="modal-dialog modal-sm modal-danger">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Hapus Divisi/Instansi</h4>
                </div>
                <div class="modal-body">
                
                    Apakah Anda Yakin Untuk Menghapus <?= $value['nama_divisi']; ?> ..??
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('divisi/delete/' . $value['id_divisi'])?>" type="submit" class="btn btn-primary">Yakin</a>
                </div>
               
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php } ?>
 <!-- /.modal akhir delete divisi -->


