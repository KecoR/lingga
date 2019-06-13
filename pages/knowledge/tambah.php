<?php
    $query = $koneksi->query("SELECT * FROM tblknowledge");
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
                        <h4>Add Knowledge</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" class="needs-validation" novalidate="" id="form">
                            <div class="form-group" id="cat1">
                                <label for="knowledge">Kategori Baru ?</label>
                                <br><input type="radio" name="cat1" id="" value="cat_yes"> Ya
                                <br><input type="radio" name="cat1" id="" value="cat_no"> Tidak, Pilih kategori yang sudah ada.  
                            </div>
                            <div class="form-group" id="child1">
                                <label for="knowledge">Nama Fungsi Baru ?</label>
                                <br><input type="radio" name="child1" id="" value="child_yes"> Ya
                                <br><input type="radio" name="child1" id="" value="child_no"> Tidak, Pilih fungsi yang sudah ada.  
                            </div>
                            <input type="submit" id="send" value="Send" name="send" class="btn btn-block btn-primary">
                            <?php
                                if($_POST['send']) {
                            ?>
                                    <script type="text/javascript">
                                        document.getElementById("form").style.display = "none";
                                    </script>
                            <?php  
                                    $cat1 = $_POST['cat1'];
                                    $child1 = $_POST['child1'];
                                }
                            ?>
                        </form>
                        <?php
                        if($_SESSION['admin']){
                            if($cat1 == "cat_no" && $child1 == "child_yes"){
                                include "add/noyes/noyes.php";
                            } elseif ($cat1 == "cat_yes" && $child1 == "child_yes") {
                                include "add/yesyes/yesyes.php";
                            } elseif ($cat1 == "cat_no" && $child1 == "child_no") {
                                include "add/nono/nono.php";
                            } elseif ($cat1 == "cat_yes" && $child1 == "child_no") {
                                ?>
                                    <script>
                                        alert("Maaf proses gagal. Tolong pilih opsi lain");
                                        window.location.href="?page=knowledge&aksi=tambah";
                                    </script>
                                <?php
                            }
                        } elseif ($_SESSION['user']) {
                            if($cat1 == "cat_no" && $child1 == "child_yes"){
                                include "ask/noyes/noyes.php";
                            } elseif ($cat1 == "cat_yes" && $child1 == "child_yes") {
                                include "ask/yesyes/yesyes.php";
                            } elseif ($cat1 == "cat_no" && $child1 == "child_no") {
                                include "ask/nono/nono.php";
                            } elseif ($cat1 == "cat_yes" && $child1 == "child_no") {
                                ?>
                                    <script>
                                        alert("Maaf proses gagal. Tolong pilih opsi lain");
                                        window.location.href="/lingga/?page=knowledge&aksi=tambah";
                                    </script>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
