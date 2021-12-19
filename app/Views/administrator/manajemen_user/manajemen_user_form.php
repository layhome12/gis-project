<style>
    .user_img {
        width: 200px !important;
        height: 160px !important;
        object-fit: cover;
    }

    .cursor_pointer {
        cursor: pointer;
    }
</style>
<div class="row">
    <div class="col-md-4">
        <label>User Image</label>
        <div class="fileinput text-center fileinput-new">
            <div class="card card-body" style="border: solid 1px #e9e9e9;">
                <input type="hidden" name="user_id" value="<?= isset($user['user_id']) ? $user['user_id'] : '' ?>">
                <input type="file" name="user_img" class="d-none" id="user_img">
                <img src="<?= base_url('/public/users_img') ?>/<?= isset($user['user_img']) ? img_check($user['user_img']) : 'no-image.png' ?>" alt="..." class="user_img cursor_pointer" id="user_img_show">
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="user_nama" value="<?= isset($user['user_nama']) ? $user['user_nama'] : '' ?>" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="text" class="form-control datepicker" name="user_tanggal_lahir" value="<?= isset($user['user_tanggal_lahir']) ? $user['user_tanggal_lahir'] : '' ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" class="form-control" name="user_tempat_lahir" value="<?= isset($user['user_tempat_lahir']) ? $user['user_tempat_lahir'] : '' ?>" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" value="<?= isset($user['username']) ? $user['username'] : '' ?>" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" name="user_alamat" id="user_alamat" rows="4"><?= isset($user['user_alamat']) ? $user['user_alamat'] : '' ?></textarea>
        </div>
    </div>
</div>
<script>
    $('.datepicker').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#user_img_show').click(
        function() {
            $('#user_img').trigger('click');
        }
    );
    $('#user_img').change(
        function() {
            var img = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#user_img_show').attr('src', e.target.result);
            }
            reader.readAsDataURL(img);
        }
    );
</script>