<form method="POST" action="pages/knowledge/ask/noyes/action.php" class="needs-validation" novalidate="">
    <div class="form-group">
        <label for="knowledge">Nama Kategori</label>
        <select name="knowledge" id="" class="form-control" tabindex="1" required autofocus>
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
        <input id="text" type="text" class="form-control" name="child" tabindex="2" required>
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
        <button class="btn btn-primary btn-lg btn-block">Simpan</button>
    </div>
</form>