<div class="row">
    <div class="col-md-3"> 
        
    </div>
    <div class="col-md-8">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Add Pengguna</h3>

               
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body ">
                <?php
                    $errors = session()->getFlashdata('errors');
                    if (! empty($errors)){ ?>
                    <div class="alert alert-danger alert-dismissible">
                        <h5>Ada Kesalahan !!!</h5>
                        <ul>
                            <?php foreach($errors as $key => $value) { ?>
                                <li><?= esc($value)?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>  

                <?php echo form_open_multipart('user/insert'); ?>

                <div class="form-group">
                    <label >Nama Pengguna</label>
                    <input name="nama_user" class="form-control"  placeholder="Nama Pengguna" >
                </div>
                <div class="form-group">
                    <label >E-mail</label>
                    <input name="email" class="form-control"  placeholder="E-mail" >
                </div>
                <div class="form-group">
                    <label >Password</label>
                    <input name="password" class="form-control"  placeholder="Password" >
                </div>
                <div class="form-group">
                    <label >Level</label>
                    <select name="level" class="form-control">
                        <option value="">--Pilih Level--</option>
                        <option value="1">Admin</option>
                        <option value="3">Lurah</option>
                        <option value="2">User</option>
                    </select>
                </div>
                <div class="form-group">
                    <label >Divisi/Instansi</label>
                    <select name="id_divisi" class="form-control">
                        <option value="">--Pilih Divisi/Instansi--</option>
                        <?php foreach($divisi as $key => $value) { ?>
                             <option value="<?= $value['id_divisi'] ?>"><?= $value['nama_divisi'] ?></option>
                        <?php } ?>
                       
                    </select>
                </div>
                <div class="form-group">
                    <label >Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('user')?>" class="btn btn-success">Kembali</a>
                </div>

                <?php echo form_close() ?>


            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

    <div class="col-md-3"> 

    </div>
</div>
