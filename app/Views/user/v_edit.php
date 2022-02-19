<div class="row">
    <div class="col-md-3"> 
        
    </div>
    <div class="col-md-8">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Pengguna</h3>

               
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

                <?php echo form_open_multipart('user/update/'. $user['id_user']); ?>

                <div class="form-group">
                    <label >Nama Pengguna</label>
                    <input name="nama_user" value="<?= $user['nama_user']?>" class="form-control"  placeholder="Nama Pengguna" >
                </div>
                <div class="form-group">
                    <label >E-mail</label>
                    <input name="email" value="<?= $user['email']?>" class="form-control"  placeholder="E-mail" readonly >
                </div>
                <div class="form-group">
                    <label >Password</label>
                    <input name="password" value="<?= $user['password']?>" class="form-control"  placeholder="Password" >
                </div>
                <div class="form-group">
                    <label >Level</label>
                    <select name="level" class="form-control">
                        <option value="<?= $user['level']?>"><?php if ($user['level'] == 1) {
                                                                    echo 'Admin';
                                                                    }else if ($user['level'] == '2'){
                                                                    echo 'User';
                                                                    } else { echo 'Lurah'; }?></option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                        <option value="3">Lurah</option>
                    </select>
                </div>
                <div class="form-group">
                    <label >Divisi/Instansi</label>
                    <select name="id_divisi" class="form-control">
                        <option value="<?= $user['id_divisi']?>"><?= $user['nama_divisi']?></option>
                        <?php foreach($divisi as $key => $value) { ?>
                             <option value="<?= $value['id_divisi'] ?>"><?= $value['nama_divisi'] ?></option>
                        <?php } ?>
                       
                    </select>
                </div>
                

                <div class="row">
                    <div class="col-sm-4">
                        <img src="<?= base_url('foto/' .$user['foto']) ?>" width="100px">
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                             <label >Ganti foto</label>
                        <input type="file" name="foto" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <br>

                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
