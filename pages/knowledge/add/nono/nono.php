<form method="POST" action="pages/knowledge/add/nono/action.php" class="needs-validation" novalidate="">
    <div class="form-group">
        <label for="knowledge">Nama Kategori</label>
        <select name="knowledge" id="knowledge" class="form-control" tabindex="1" required autofocus>
            <option value="" selected disabled>Pilih Kategori</option>
            <?php
                while($data = $query->fetch_assoc()){
            ?>
            <option value="<?= $data['id'] ?>"><?= $data['knowledge_name'] ?></option>
            <?php
                }
            ?>
        </select>
        <div class="invalid-feedback">
        Tolong pilih kategori
        </div>
    </div>

    <div class="form-group">
        <div class="d-block">
            <label for="child" class="control-label">Nama Fungsi</label>
        </div>
        <select name="child" id="child" class="form-control" tabindex="2" required autofocus>
            <option value="">Pilih kategori terlebih dahulu</option>
        </select>
        <div class="invalid-feedback">
        Tolong isi nama fungsi
        </div>
    </div>

    <div class="form-group">
        <div class="d-block">
            <label for="info" class="control-label">Informasi</label>
        </div>
        <input id="text" type="text" class="form-control" name="info" tabindex="3" required>
        <div class="invalid-feedback">
        Tolong isi informasi
        </div>
    </div>

    <div class="form-group">
        <div class="d-block">
            <label for="content" class="control-label">Isi</label>
        </div>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control"  tabindex="4" required></textarea>
        <div class="invalid-feedback">
        Tolong isi isian dari knowledge
        </div>
    </div>

    <div class="form-group">
        <!-- <input type="button" value="Simpan" name="save" class="btn btn-primary btn-lg btn-block" tabindex="5"> -->
        <button class="btn btn-primary btn-lg btn-block" onclick="Save()">Simpan</button>
    </div>
</form>