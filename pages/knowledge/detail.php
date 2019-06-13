<?php
    $id = $_GET['id'];

    $query = $koneksi->query("SELECT * FROM tblknowledge_info JOIN tblknowledge_content ON tblknowledge_info.id = tblknowledge_content.info_id WHERE tblknowledge_info.id = '$id'");

    $detail = $query->fetch_assoc();
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
                        <h4><?= $detail['info_name'] ?></h4>
                    </div>
                    <div class="card-body">
                        <?= nl2br($detail['content']) ?>
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