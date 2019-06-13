<?php
    $id = $_SESSION['user'];

    $sql = $koneksi->query("SELECT *, tbl_request.id AS req_id, tblknowledge.knowledge_name, tblknowledge_child.child_name  FROM tbl_request LEFT JOIN tblknowledge ON tblknowledge.id = tbl_request.knowledge_parent_id LEFT JOIN tblknowledge_child ON tblknowledge_child.id = tbl_request.knowledge_child_id WHERE user = '$id'");

    $sql1 = $koneksi->query("SELECT *, tbl_request.id AS req_id, tblknowledge.knowledge_name, tblknowledge_child.child_name  FROM tbl_request LEFT JOIN tblknowledge ON tblknowledge.id = tbl_request.knowledge_parent_id LEFT JOIN tblknowledge_child ON tblknowledge_child.id = tbl_request.knowledge_child_id");

    if($sql->num_rows > 0 || $sql1->num_rows > 0) {
?>

<section class="section">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card ">
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>List Request</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="myTable">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <?php
                                        if($_SESSION['admin']){
                                    ?>
                                        <td>User</td>
                                    <?php
                                        }
                                    ?> 
                                    <td>Nama Kategori</td>
                                    <td>Nama Fungsi</td>
                                    <td>Informasi</td>
                                    <td>Tanggal Request</td>
                                    <?php
                                        if($_SESSION['user']){
                                    ?>
                                        <td>Status</td>
                                    <?php
                                        }
                                    ?> 
                                    <td>Aksi</td>                                
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    if($_SESSION['user']){
                                        while($data = $sql->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?= $no ?></td>
                                    <td>
                                        <?php
                                            if(empty($data['knowledge_parent_name'])){
                                                echo $data['knowledge_name'];
                                            } else {
                                                echo $data['knowledge_parent_name'];
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if(empty($data['knowledge_child_name'])){
                                                echo $data['child_name'];
                                            } else {
                                                echo $data['knowledge_child_name'];
                                            }
                                        ?>
                                    </td>
                                    <td><?= $data['info_name'] ?></td>
                                    <td><?= $data['tgl_request'] ?></td>
                                    <?php
                                        if($data['status_req'] == 0) {
                                            $status = 'On-Process';
                                            $class = 'alert alert-secondary';
                                        } elseif ($data['status_req'] == 1) {
                                            $status = 'Diterima';
                                            $class = 'alert alert-success';
                                        } elseif ($data['status_req'] == -1) {
                                            $status = 'Ditolak';
                                            $class = 'alert alert-danger';
                                        }
                                    ?>
                                    <td>
                                        <span class="<?= $class ?>"><?= $status ?></span>
                                    </td>
                                    <td>
                                    <a class="btn btn-block btn-primary" href="?page=knowledge&aksi=detailReq&id=<?php echo $data['req_id']; ?>">Detail</a>
                                    </td>
                                </tr>
                                <?php
                                           $no++;
                                        }
                                    } elseif ($_SESSION['admin']) {
                                        while($data = $sql1->fetch_assoc()){
                                    ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td>
                                            <?php
                                                if(empty($data['knowledge_parent_name'])){
                                                    echo $data['knowledge_name'];
                                                } else {
                                                    echo $data['knowledge_parent_name'];
                                                }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                                if(empty($data['knowledge_child_name'])){
                                                    echo $data['child_name'];
                                                } else {
                                                    echo $data['knowledge_child_name'];
                                                }
                                            ?>
                                        </td>
                                        <td><?= $data['info_name'] ?></td>
                                        <td><?= $data['tgl_request'] ?></td>
                                        <?php
                                            if($data['status_req'] == 0) {
                                                $status = 'On-Process';
                                                $class = 'btn alert-secondary';
                                            } elseif ($data['status_req'] == 1) {
                                                $status = 'Diterima';
                                                $class = 'btn alert-success';
                                            } elseif ($data['status_req'] == -1) {
                                                $status = 'Ditolak';
                                                $class = 'btn alert-danger';
                                            }
                                        ?>
                                        <td>
                                            <span class="<?= $class ?>"><?= $status ?></span>
                                        </td>
                                        <td>
                                        <a class="btn btn-block btn-primary" href="?page=knowledge&aksi=detailReq&id=<?php echo $data['req_id']; ?>">Detail</a>
                                        </td>
                                    </tr>
                                    <?php
                                        $no++;
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
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