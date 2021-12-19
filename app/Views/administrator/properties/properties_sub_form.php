<div class="row">
    <div class="col-md-8">
        <input type="hidden" name="properties_sub_id" value="<?= isset($properties['properties_sub_id']) ? $properties['properties_sub_id'] : '' ?>">
        <input type="hidden" name="properties_id" value="<?= $properties_id ?>">
        <div class="form-group">
            <label>Kelurahan</label>
            <select class="select2 form-control" name="desa_kelurahan_id" id="desa_kelurahan_id" style="width: 100%;" required>
                <?php new \App\Libraries\SelectBuilder([
                    'table' => 'area_desakelurahan',
                    'val_id' => 'desa_kelurahan_id',
                    'val_text' => 'desa_kelurahan_nama',
                    'id' => isset($properties['desa_kelurahan_id']) ? $properties['desa_kelurahan_id'] : '0'
                ]); ?>
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label>Value</label>
            <input type="number" class="form-control" name="properties_value" value="<?= isset($properties['properties_value']) ? $properties['properties_value'] : '' ?>" required>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Properties LCODE</label>
            <input type="text" class="form-control" name="properties_lcode" value="<?= isset($properties['properties_lcode']) ? $properties['properties_lcode'] : '' ?>" required>
        </div>
    </div>
</div>

<script>
    $('.select2').select2();
</script>