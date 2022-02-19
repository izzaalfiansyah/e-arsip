<div class="row">
    <div class="col-md-3"> 
        
    </div>
    <div class="col-md-8">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Add Arsip</h3>

               
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

                <?php 
                echo form_open_multipart('arsip/insert'); 
                helper('text');
                $no_arsip = date('Ymd') . '-' . random_string('alnum', 4);
                ?>

                <div class="form-group">
                    <label >No Arsip</label>
                    <input name="no_arsip" class="form-control" value="<?= $no_arsip ?>" readonly >
                </div>

                <div class="form-group">
                    <label >Kategori</label>
                    <select name="id_kategori" class="form-control" onchange="handleKategori()">
                        <option value="">--Pilih Kategori--</option>
                        <?php foreach($kategori as $key => $value) { ?>
                             <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                
                <style>
                    .hide {
                        display: none;
                    }
                </style>

                <div class="form-group hide" id="divisi">
                    <label >Divisi</label>
                    <select name="id_divisi" class="form-control">
                        <option value="">--Pilih Divisi--</option>
                        <?php foreach($divisi as $key => $value) { ?>
                             <option value="<?= $value['id_divisi'] ?>"><?= $value['nama_divisi'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <script>
                    const divisi = document.querySelector('#divisi');
                    const kategori = document.querySelector('[name=id_kategori]');

                    function handleKategori() {
                        const id_kategori = kategori.value;
                        if (id_kategori == '1' || id_kategori == '2') {
                            divisi.classList.remove('hide');
                        } else {
                            divisi.classList.add('hide');
                        }
                    }
                </script>

                <div class="form-group">
                    <label >Nama Arsip</label>
                    <input name="nama_arsip" class="form-control"  placeholder="Nama Arsip" >
                </div>

                <div class="form-group">
                    <label >Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="5"></textarea>
                </div>
                
                <div class="form-group">
                    <label >File Arsip</label>
                    <input type="file" name="file_arsip" class="form-control">
                    <label class="text-danger">* File Harus Format .PDF</label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?= base_url('arsip')?>" class="btn btn-success">Kembali</a>
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
