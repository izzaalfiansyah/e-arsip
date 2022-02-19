<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered ">
            <tr>
                <th width="100px">No Arsip</th>
                <th width="30px">:</th>
                <td><?= $arsip['no_arsip'] ?></td>
                <th width="140px">Tanggal Upload</th>
                <th width="30px">:</th>
                <td><?= $arsip['tanggal_upload'] ?></td>
            </tr>
            <tr>
                <th>Nama Arsip</th>
                <th>:</th>
                <td><?= $arsip['nama_arsip'] ?></td>
                <th width="140px">Tanggal Update</th>
                <th width="30px">:</th>
                <td><?= $arsip['tanggal_update'] ?></td>
            </tr>
            <tr>
                <th width="100px">Deskripsi</th>
                <th>:</th>
                <td><?= $arsip['deskripsi'] ?></td>
                <th width="140px">Ukuran File</th>
                <th width="30px">:</th>
                <td><?= $arsip['ukuran_file'] ?> Byte</td>
            </tr>
            <tr>
                <th width="100px">Divisi/Instansi</th>
                <th>:</th>
                <td><?= $arsip['nama_divisi'] ?></td>
                <th width="140px">Nama Pengguna</th>
                <th width="30px">:</th>
                <td><?= $arsip['nama_user'] ?></td>
            </tr>
        </table>    
    </div>

    <div class="col-sm-12">
        <iframe src="<?= base_url('file_arsip/' . $arsip['file_arsip']) ?>" style="border:3px solid blue;" height="1000px" width="100%" ></iframe>
    </div>

</div>