<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Nama</label>
            <input type="hidden" name="info_landing_id" value="<?= isset($info['info_landing_id']) ? $info['info_landing_id'] : '' ?>" required>
            <input type="text" class="form-control" name="info_landing_nama" value="<?= isset($info['info_landing_nama']) ? $info['info_landing_nama'] : '' ?>" required>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Keterangan</label>
            <input type="text" class="form-control" name="info_landing_keterangan" value="<?= isset($info['info_landing_keterangan']) ? $info['info_landing_keterangan'] : '' ?>" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Isi Landing</label>
            <textarea class="form-control" name="info_landing_isi" id="summernote" rows="4"><?= isset($info['info_landing_isi']) ? $info['info_landing_isi'] : '' ?></textarea>
        </div>
    </div>
</div>
<script>
    $('#summernote').summernote({
        height: 200,
        toolbar: [
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['view', ['fullscreen', 'codeview', 'help']],
        ]
    });
</script>