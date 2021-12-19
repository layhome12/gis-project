<div class="row">
    <div class="col-md-9">
        <div class="form-group">
            <label>Nama Layer</label>
            <input type="hidden" class="form-control" name="geojson_id" value="<?= isset($layer['geojson_id']) ? $layer['geojson_id'] : '' ?>">
            <input type="text" class="form-control" name="geojson_nama" value="<?= isset($layer['geojson_nama']) ? $layer['geojson_nama'] : '' ?>" required>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>Urutan</label>
            <input type="number" class="form-control" name="geojson_urutan" value="<?= isset($layer['geojson_urutan']) ? $layer['geojson_urutan'] : '' ?>" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label>Tipe</label>
            <select class="select2 form-control" name="geojson_type_id" id="geojson_type_id" style="width: 100%;" required>
                <?php new \App\Libraries\SelectBuilder([
                    'table' => 'geojson_type',
                    'val_id' => 'geojson_type_id',
                    'val_text' => 'geojson_type_nama',
                    'id' => isset($layer['geojson_type_id']) ? $layer['geojson_type_id'] : '0'
                ]); ?>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Color Type</label>
            <select class="select2 form-control" id="color_type_id" style="width: 100%;" required>
                <?php if (!isset($layer['color_type_id'])) : ?>
                    <option value="">-</option>
                <?php endif; ?>
                <?php new \App\Libraries\SelectBuilder([
                    'table' => 'color_type',
                    'val_id' => 'color_type_id',
                    'val_text' => 'color_type_nama',
                    'id' => isset($layer['color_type_id']) ? $layer['color_type_id'] : '0'
                ]); ?>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Color</label>
            <select class="select2 form-control" name="color_id" id="color_id" style="width: 100%;" required>
                <?php if (isset($layer['color_id'])) : ?>
                    <?php new \App\Libraries\SelectBuilder([
                        'table' => 'color',
                        'val_id' => 'color_id',
                        'val_text' => 'color_nama',
                        'where' => ['color_type_id' => isset($layer['color_type_id']) ? $layer['color_type_id'] : '0'],
                        'id' => isset($layer['color_id']) ? $layer['color_id'] : '0'
                    ]); ?>
                <?php else : ?>
                    <option value="">-</option>
                <?php endif; ?>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <label>GEOJSON File</label>
        <div class="custom-file">
            <input type="file" name="geojson_file" class="custom-file-input" id="geojson_file" <?= isset($layer['geojson_file']) ? '' : 'required' ?>>
            <label class="custom-file-label" for="geojson_file" id="label_upload"><?= isset($layer['geojson_file']) ? $layer['geojson_file'] : 'Choose File..' ?></label>
        </div>
    </div>
</div>
<script>
    $('.select2').select2({
        minimumResultsForSearch: -1
    });
    $('#geojson_file').change(
        function() {
            var name = $(this).val().replace(/C:\\fakepath\\/i, '');
            $('#label_upload').empty().text(name);
        }
    );
    $('#color_type_id').change(
        function() {
            var id = $(this).val();
            $.LoadingOverlay('show');
            $.post('<?= base_url('utils/get_select2') ?>', {
                'id': id,
                'table': 'color',
                'key': 'color_type_id'
            }, function(result, textStatus, xhr) {
                $.LoadingOverlay('hide');
                $('#color_id').empty().select2({
                    data: result.data,
                    minimumResultsForSearch: -1
                });
            }, 'json');
        }
    );
</script>