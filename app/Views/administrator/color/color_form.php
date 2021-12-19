<div class="row">
    <div class="col-md-4">
        <input type="hidden" name="color_id" value="<?= isset($color['color_id']) ? $color['color_id'] : '' ?>">
        <div class="form-group">
            <label>Color Type</label>
            <select class="select2 form-control" name="color_type_id" id="color_type_id" style="width: 100%;" required>
                <?php new \App\Libraries\SelectBuilder([
                    'table' => 'color_type',
                    'val_id' => 'color_type_id',
                    'val_text' => 'color_type_nama',
                    'id' => isset($color['color_type_id']) ? $color['color_type_id'] : '0'
                ]); ?>
            </select>
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group">
            <label>Nama Color</label>
            <input type="text" class="form-control" name="color_nama" value="<?= isset($color['color_nama']) ? $color['color_nama'] : '' ?>" required>
        </div>
    </div>
</div>

<script>
    $('.select2').select2({
        minimumResultsForSearch: -1
    });
</script>