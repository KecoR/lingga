<?php
    $id = $_GET['id'];

    $sql = $koneksi->query("SELECT *, tbl_request.id AS req_id, tblknowledge.knowledge_name, tblknowledge_child.child_name  FROM tbl_request LEFT JOIN tblknowledge ON tblknowledge.id = tbl_request.knowledge_parent_id LEFT JOIN tblknowledge_child ON tblknowledge_child.id = tbl_request.knowledge_child_id WHERE tbl_request.id = '$id'");

    $tampil = $sql->fetch_assoc();
    
    if(empty($tampil['knowledge_parent_name'])){
        $kategori = $tampil['knowledge_name'];
    } else {
        $kategori = $tampil['knowledge_parent_name'];
    }

    if(empty($tampil['knowledge_child_name'])){
        $fungsi = $tampil['child_name'];
    } else {
        $fungsi = $tampil['knowledge_child_name'];
    }

    $info = $tampil['info_name'];
    $isi = $tampil['content'];
    $date = $tampil['tgl_request'];
    $dateacc = $tampil['tgl_accept'];

    if($data['status_req'] == 0) {
        $status = 'On-Process';
    } elseif ($data['status_req'] == 1) {
        $status = 'Diterima';
    } elseif ($data['status_req'] == -1) {
        $status = 'Ditolak';
    }
?>

<form method="POST" class="needs-validation" novalidate="">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="d-block">
                    <label for="knowledge" class="control-label">Nama Kategori</label>
                </div>
                <input id="text" type="text" class="form-control" name="knowledge" tabindex="1" value="<?= $kategori ?>" readonly required>
                <div class="invalid-feedback">
                Tolong isi nama kategori
                </div>
            </div>

            <div class="form-group">
                <div class="d-block">
                    <label for="child" class="control-label">Nama Fungsi</label>
                </div>
                <input id="text" type="text" class="form-control" name="child" value="<?= $fungsi ?>" tabindex="2" required readonly>
                <div class="invalid-feedback">
                Tolong isi nama fungsi
                </div>
            </div>

            <div class="form-group">
                <div class="d-block">
                    <label for="info" class="control-label">Informasi</label>
                </div>
                <input id="text" type="text" class="form-control" name="info" tabindex="3" value="<?= $info ?>" readonly required>
                <div class="invalid-feedback">
                Tolong isi informasi
                </div>
            </div>

            <div class="form-group">
                <div class="d-block">
                    <label for="tgl_request" class="control-label">Tanggal Request</label>
                </div>
                <input id="text" type="text" class="form-control" name="date" tabindex="3" value="<?= $date ?>" readonly required>
                <div class="invalid-feedback">
                Tanggal Request
                </div>
            </div>

            <?php
                if(!empty($tampil['tgl_accept'])){
            ?>
            <div class="form-group">
                <div class="d-block">
                    <label for="tgl_accept" class="control-label">Tanggal Diterima/Ditolak</label>
                </div>
                <input id="text" type="text" class="form-control" name="dateacc" tabindex="3" value="<?= $dateacc ?>" readonly required>
                <div class="invalid-feedback">
                Tanggal Request
                </div>
            </div>
                <?php } ?>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <div class="d-block">
                    <label for="status" class="control-label">Status</label>
                </div>
                <input id="text" type="text" class="form-control" name="info" tabindex="3" value="<?= $status ?>" readonly required>
                <div class="invalid-feedback">
                Status
                </div>
            </div>

            <div class="form-group">
                <div class="d-block">
                    <label for="content" class="control-label">Isi</label>
                </div>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"  tabindex="4" readonly required><?= $isi ?></textarea>
                <div class="invalid-feedback">
                Tolong isi isian dari knowledge
                </div>
            </div>
            <?php
                if($_SESSION['admin']){
                    if($tampil['status_req'] == 0){
            ?>
            <div class="form-group">
            <a href="?page=knowledge&aksi=terima&id=<?php echo $tampil['req_id']; ?>" class="btn btn-info col-md-5" >Terima</a>

            <a href="?page=knowledge&aksi=tolak&id=<?php echo $tampil['req_id'];?>" onClick="return confirm('Tolak Permohonan?')" class="btn btn-danger col-md-5" >Tolak</a>
            </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</form>