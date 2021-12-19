<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <label>Nama Properties</label>
            <input type="hidden" class="form-control" name="properties_id" value="<?= isset($properties['properties_id']) ? $properties['properties_id'] : '' ?>">
            <input type="text" class="form-control" name="properties_nama" value="<?= isset($properties['properties_nama']) ? $properties['properties_nama'] : '' ?>" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Tahun</label>
            <input type="text" class="form-control datepicker" name="properties_tahun" value="<?= isset($properties['properties_tahun']) ? $properties['properties_tahun'] : '' ?>" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="form-group">
            <label>Layer</label>
            <select class="select2 form-control" name="geojson_id" id="geojson_id" style="width: 100%;" required>
                <?php new \App\Libraries\SelectBuilder([
                    'table' => 'geojson',
                    'val_id' => 'geojson_id',
                    'val_text' => 'geojson_nama',
                    'id' => isset($properties['geojson_id']) ? $properties['geojson_id'] : '0'
                ]); ?>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Label</label>
            <input type="text" class="form-control" name="properties_label" value="<?= isset($properties['properties_label']) ? $properties['properties_label'] : '' ?>" required>
        </div>
    </div>
    <div class="col-md-3">
        <label>Legend</label>
        <select class="select2 form-control" name="is_legend" id="is_legend" style="width: 100%;" required>
            <option value="0" <?= isset($properties['is_legend']) ? selected($properties['is_legend'], 0) : '' ?>>No</option>
            <option value="1" <?= isset($properties['is_legend']) ? selected($properties['is_legend'], 1) : '' ?>>Yes</option>
        </select>
    </div>
</div>
<script>
    $('.select2').select2({
        minimumResultsForSearch: -1
    });
    $('.datepicker').datetimepicker({
        format: 'YYYY'
    });
    $('#properties_file').change(
        function() {
            var name = $(this).val().replace(/C:\\fakepath\\/i, '');
            $('#label_upload').empty().text(name);
        }
    );
</script>