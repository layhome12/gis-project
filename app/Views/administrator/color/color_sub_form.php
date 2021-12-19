<style>
    .square .clr-field button,
    .circle .clr-field button {
        width: 22px;
        height: 22px;
        left: 5px;
        right: auto;
        border-radius: 5px;
    }

    .square .clr-field input,
    .circle .clr-field input {
        padding-left: 36px;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="form-group square">
            <label>Color Fill</label>
            <input type="hidden"name="color_id" value="<?= $color_id ?>">
            <input type="hidden"name="color_fill_id" value="<?= isset($color['color_fill_id']) ? $color['color_fill_id'] : '' ?>">
            <input type="text" class="form-control coloris" style="width: 100%;" name="color_fill_hexa" value="<?= isset($color['color_fill_hexa']) ? $color['color_fill_hexa'] : '' ?>" required>
        </div>
    </div>
    <?php if (isset($is_legend['is_legend'])) : ?>
        <div class="col-md-6">
            <div class="form-group">
                <label>Min Value</label>
                <input type="number" class="form-control" name="color_legend" value="<?= isset($color['color_legend']) ? $color['color_legend'] : '' ?>" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Max Value</label>
                <input type="number" class="form-control" name="color_legend_max" value="<?= isset($color['color_legend_max']) ? $color['color_legend_max'] : '' ?>" required>
            </div>
        </div>
    <?php endif; ?>
</div>

<script>
    $('.select2').select2({
        minimumResultsForSearch: -1
    });
    Coloris({
        el: '.coloris',
        swatches: [
            '#264653',
            '#2a9d8f',
            '#e9c46a',
            '#f4a261',
            '#e76f51',
            '#d62828',
            '#023e8a',
            '#0077b6',
            '#0096c7',
            '#00b4d8',
            '#48cae4'
        ]
    });
</script>