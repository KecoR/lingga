<div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="main-sidebar ">
        <aside id="sidebar-wrapper">
            <ul class="sidebar-menu">
                <li class="menu-header"></li>
                <li class="menu-header">List Knowledge</li>
                <?php
                    $sql = $koneksi->query("SELECT * FROM tblknowledge");

                    while($data = $sql->fetch_assoc()){
                ?>
                <li class="dropdown nav-color">
                    <a href="#" class="nav-link has-dropdown"><span><?= $data['knowledge_name'] ?></span></a>
                    <?php
                        $parrent_id = $data['id'];
                        $get = $koneksi->query("SELECT * FROM tblknowledge_child WHERE parrent = '$parrent_id'");

                        while($child = $get->fetch_assoc()){
                    ?>
                    <ul class="dropdown-menu">
                        <li><a class="nav-link" href="?page=knowledge&aksi=detail&id=<?php echo $child['id']; ?>"><?= $child['child_name'] ?></a></li>
                    </ul>
                    <?php
                        }
                    ?>
                </li>
                <?php
                    }
                ?>
                <?php
                    if($_SESSION['admin']){
                ?>
                    <li class="menu-header">ADD Knowledge</li>
                    <li class="dropdown nav-color">
                        <a href="?page=knowledge&aksi=tambah" class="nav-link"><span>ADD Knowledge</span></a>
                    </li>
                    <li class="menu-header">Request List</li>
                    <li class="dropdown nav-color">
                        <a href="?page=knowledge&aksi=requestList" class="nav-link"><span>Request List</span></a>
                    </li>
                <?php
                    } elseif ($_SESSION['user']) {
                ?>
                    <li class="menu-header">ASK Knowledge</li>
                    <li class="dropdown nav-color">
                        <a href="?page=knowledge&aksi=tambah" class="nav-link"><span>ASK Knowledge</span></a>
                    </li>
                    </li>
                    <li class="menu-header">Request List</li>
                    <li class="dropdown nav-color">
                        <a href="?page=knowledge&aksi=requestList" class="nav-link"><span>Request List</span></a>
                    </li>
                <?php } ?>
            </ul>
       </aside>
      </div>
    </div>
    <div class="main-content">
        <?php
            if($_GET['aksi'] == "detail") {
                include "isi.php";
            } elseif ($_GET['aksi'] == "tambah") {
                include "tambah.php";
            } elseif ($_GET['aksi'] == "requestList") {
                include "request/request.php";
            } elseif ($_GET['aksi'] == "detailReq") {
                include "request/detailreq.php";
            } elseif ($_GET['aksi'] == "detailinfo") {
               include "detail.php";
            } elseif ($_GET['aksi'] == "tolak") {
                include "request/tolak.php";
            } elseif ($_GET['aksi'] == "terima") {
                include "request/terima.php";
            }
        ?>
    </div>
  </div>