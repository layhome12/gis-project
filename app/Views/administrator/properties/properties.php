<?= $this->extend('template/administrator'); ?>

<?= $this->section('content'); ?>
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title d-inline">Properties</h4>
                    <button type="button" class="btn btn-danger mr-3 float-right d-inline" onclick="dt_form(this)" target-id="0">Tambah</button>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nama Properties</th>
                                <th>Layer</th>
                                <th>Tahun</th>
                                <th>Label</th>
                                <th>Legend</th>
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
        <form action="<?= base_url('administrator/properties' . '_save'); ?>" method="post" enctype="multipart/form-data" id="form-data" onsubmit="return false">
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
            'url': '<?php echo base_url('administrator/properties' . '_fetch') ?>',
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

    function dt_detail(t) {
        var id = t.getAttribute('target-id');
        var url = '<?= base_url('/administrator/properties_sub') ?>' + '/' + id;
        window.location.replace(url);
    }

    function dt_form(t) {
        var id = t.getAttribute('target-id');
        $.LoadingOverlay('show');
        $.post('<?php echo base_url('administrator/properties' . '_form') ?>', {
            'id': id
        }, function(result, textStatus, xhr) {
            $.LoadingOverlay('hide');
            $('#modal-content').html(result);
            $('#modal').modal('show');
        });
    }

    function dt_temp(t) {
        var id = t.getAttribute('target-id');
        var url = '<?= base_url('/administrator/properties_temp') ?>' + '/?prop_id=' + id;
        window.location.replace(url);
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
                $.post('<?= base_url('administrator/properties' . '_del') ?>', {
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
</script>
<?= $this->endSection(); ?>