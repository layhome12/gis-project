<?= $this->extend('template/administrator'); ?>

<?= $this->section('content'); ?>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-inline">Detail Properties</h4>
                    <button type="button" class="btn btn-danger mr-3 float-right d-inline" onclick="dt_form(this)" target-id="0">Tambah</button>
                    <button type="button" class="btn btn-success mr-3 float-right d-inline" id="btn-import">Import</button>
                    <form action="<?= base_url('/administrator/properties_sub_import') ?>" method="post" id="form-import-exel" onsubmit="return false">
                        <input type="file" name="file_import" class="d-none" id="import-exel" accept=".xls, .xlsx">
                    </form>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Kelurahan</th>
                                <th>LCODE</th>
                                <th>Label</th>
                                <th>Value</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div><!-- end content-->
            </div><!--  end card  -->
        </div> <!-- end col-md-12 -->
    </div> <!-- end row -->
</div>

<!-- Modal -->
<div class="modal fade" id="modal">
    <div class="modal-dialog" role="document">
        <form action="<?= base_url('administrator/properties_sub' . '_save'); ?>" method="post" enctype="multipart/form-data" id="form-data" onsubmit="return false">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Properties Form</h5>
                </div>
                <div class="modal-body" id="modal-content">

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('custom_js'); ?>
<script>
    var table = $('table').DataTable({
        'ajax': {
            'url': '<?php echo base_url('administrator/properties_sub' . '_fetch') ?>',
            'data': function(e) {
                e.properties_id = '<?= $properties_id; ?>'
            },
            'dataSrc': 'data',
            'type': 'POST'
        },
        'processing': true,
        'serverSide': true,
        'paging': true,
        'lengthChange': true,
        'searching': true,
        'ordering': false,
        'info': true,
        'autoWidth': true,
        'responsive': true
    });

    function dt_form(t) {
        var id = t.getAttribute('target-id');
        $.LoadingOverlay('show');
        $.post('<?php echo base_url('administrator/properties_sub' . '_form') ?>', {
            'id': id,
            'properties_id': '<?= $properties_id; ?>'
        }, function(result, textStatus, xhr) {
            $.LoadingOverlay('hide');
            $('#modal-content').html(result);
            $('#modal').modal('show');
        });
    }
    $('#form-data').submit(
        function() {
            $.LoadingOverlay('show');
            $.ajax({
                url: this.action,
                type: 'post',
                data: new FormData(this),
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(result, textStatus, xhr) {
                    $.LoadingOverlay('hide');
                    if (result.status > 0) {
                        $('#modal').modal('hide');
                        Swal.fire({
                            type: 'success', //'warning', 'error', 'info', 'question',
                            title: 'Success',
                            text: result.msg,
                            confirmButtonColor: '#ef8157'
                        });
                        table.ajax.reload();
                    } else {
                        Swal.fire({
                            type: 'error', //'warning', 'error', 'info', 'question',
                            title: 'Error',
                            text: result.msg,
                            confirmButtonColor: '#ef8157'
                        });
                    }
                }
            });
        }
    );

    function dt_del(t) {
        Swal.fire({
            title: 'Warning !',
            text: 'Hapus Properties Ini ??',
            type: 'warning', //'success', 'error', 'info', 'question'
            showCancelButton: true,
            confirmButtonColor: '#ef8157',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                $.LoadingOverlay('show');
                $.post('<?= base_url('administrator/properties_sub' . '_del') ?>', {
                    'id': t.getAttribute('target-id')
                }, function(result, textStatus, xhr) {
                    $.LoadingOverlay('hide');
                    if (result.status > 0) {
                        Swal.fire({
                            title: 'Success',
                            text: result.msg,
                            type: 'success',
                            confirmButtonColor: '#ef8157'
                        }).then(
                            function() {
                                table.ajax.reload();
                            }
                        );
                    }
                }, 'json');
            }
        });
    }
    $('#btn-import').click(
        function() {
            $('#import-exel').trigger('click');
        }
    );
    $('#import-exel').change(
        function() {
            $('#form-import-exel').trigger('submit');
        }
    );
    $('#form-import-exel').submit(
        function() {
            $.LoadingOverlay('show');
            $.ajax({
                url: this.action,
                type: 'post',
                data: new FormData(this),
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(result, textStatus, xhr) {
                    $.LoadingOverlay('hide');
                    $('#form-import-exel').trigger('reset');
                    if (result.status > 0) {
                        Swal.fire({
                            title: 'Success',
                            text: result.msg,
                            type: 'success',
                            confirmButtonColor: '#ef8157'
                        }).then(
                            function() {
                                table.ajax.reload();
                            }
                        );
                    } else {
                        Swal.fire({
                            type: 'error', //'warning', 'error', 'info', 'question',
                            title: 'Error',
                            text: result.msg,
                            confirmButtonColor: '#ef8157'
                        });
                    }
                }
            });
        }
    );
</script>
<?= $this->endSection(); ?>