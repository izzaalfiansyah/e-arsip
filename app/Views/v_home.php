<div class="row">
<div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?= $tot_arsip?></h3>
              <p>Arsip</p>
            </div>
            <div class="icon">
              <i class=" fa fa-file-pdf-o"></i>
            </div>
            <a href="<?= base_url('arsip') ?>" class="small-box-footer">View Detail <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

<div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?= $tot_kategori?></h3>
              <p>Kategori</p>
            </div>
            <div class="icon">
              <i class="fa fa-clipboard"></i>
            </div>
            <?php if (session()->get('level') !== '2'): ?>
              <a href="<?= base_url('kategori') ?>" class="small-box-footer">View Detail <i class="fa fa-arrow-circle-right"></i></a>
            <?php endif ?>
          </div>
        </div>

<div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?= $tot_divisi?></h3>

              <p>Divisi/Instansi</p>
            </div>
            <div class="icon">
              <i class="fa fa-building-o"></i>
            </div>
            <?php if (session()->get('level') !== '2'): ?>
              <a href="<?= base_url('divisi') ?>" class="small-box-footer">View Detail <i class="fa fa-arrow-circle-right"></i></a>
              <?php endif ?>
          </div>
        </div>

<div class="col-lg-3 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?= $tot_user?></h3>

              <p>Pengguna</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            
            <?php if (session()->get('level') !== '2'): ?>
              <a href="<?= base_url('user') ?>" class="small-box-footer">View Detail <i class="fa fa-arrow-circle-right"></i></a>
            <?php endif ?>
          </div>
        </div>
</div>