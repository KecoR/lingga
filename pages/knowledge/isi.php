<?php
    $id = $_GET['id'];

    $query = $koneksi->query("SELECT *, tblknowledge_info.id AS info_id FROM tblknowledge_child JOIN tblknowledge_info ON tblknowledge_child.id = tblknowledge_info.child_id WHERE tblknowledge_child.id = '$id'");

    $child = $koneksi->query("SELECT * FROM tblknowledge_child WHERE id ='$id'");

    $detail = $child->fetch_assoc();
    if($query->num_rows >= 1) {
?>

<section class="section">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card ">
                <!-- <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div> -->
                <div class="card-wrap">
                    <div class="card-header">
                        <h4><?= $detail['child_name'] ?></h4>
                    </div>
                    <div class="card-body">
                        <?php
                            while($data = $query->fetch_assoc()){
                        ?>
                            <a href="?page=knowledge&aksi=detailinfo&id=<?= $data['info_id'] ?>" class="btn btn-primary btn-lg col-lg-12 mb-1"><?= $data['info_name'] ?></a>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
    } else {
?>

<section class="section">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card card-statistic-1">
                <!-- <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div> -->
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Data Tidak ada</h4>
                    </div>
                    <div class="card-body">
                        Tidak ada Data
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    }
?>