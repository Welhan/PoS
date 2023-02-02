<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="user/update" class="formSubmit">
                <div class="modal-body">
                    <?= csrf_field(); ?>

                    <input type="hidden" name="id" value="<?= $user->id; ?>">

                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label col-form-label-sm">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?= $user->nama; ?>">
                            <div id="errNama" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="username" class="col-sm-2 col-form-label col-form-label-sm">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="username" name="username" value="<?= $user->username; ?>">
                            <div id="errUsername" class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control form-control-sm" id="password" name="password">
                            <div id="errPassword" class="invalid-feedback"></div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="level" class="col-sm-2 col-form-label col-form-label-sm">Level</label>
                        <div class="col-sm-10">
                            <select id="level" class="form-control" name="level">
                                <option value="">Choose</option>
                                <?php foreach ($levels as $level) : ?>
                                    <option value="<?= $level->id; ?>" <?= ($level->id == $user->level) ? 'selected' : ''; ?>> <?= $level->role; ?> </option>
                                <?php endforeach; ?>
                            </select>
                            <div id="errLevel" class="invalid-feedback"></div>
                        </div>
                    </div>
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="aktif" name="aktif" value="1" <?= ($user->aktif == 1) ? 'checked' : ''; ?>>
                        <label class="custom-control-label" for="aktif">Aktif</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-primary" id="btnProcess">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        $('.formSubmit').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                beforeSend: function() {
                    $('#btnProcess').attr('disabled', 'disabled');
                    $('#btnProcess').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                success: function(response) {
                    if (response.error) {
                        $('#btnProcess').removeAttr('disabled');
                        $('#btnProcess').html('Save');
                        if (response.error.logout) {
                            window.location.href = response.error.logout
                        }

                        if (response.error.nama) {
                            $('#nama').addClass('is-invalid');
                            $('#errNama').html(response.error.nama);
                        } else {
                            $('#nama').removeClass('is-invalid');
                            $('#errNama').html('');
                        }

                        if (response.error.username) {
                            $('#username').addClass('is-invalid');
                            $('#errUsername').html(response.error.username);
                        } else {
                            $('#username').removeClass('is-invalid');
                            $('#errUsername').html('');
                        }

                        if (response.error.level) {
                            $('#level').addClass('is-invalid');
                            $('#errLevel').html(response.error.level);
                        } else {
                            $('#level').removeClass('is-invalid');
                            $('#errLevel').html('');
                        }

                        if (response.error.password) {
                            $('#password').addClass('is-invalid');
                            $('#errPassword').html(response.error.password);
                        } else {
                            $('#password').removeClass('is-invalid');
                            $('#errPassword').html('');
                        }
                    } else {
                        window.location.reload()
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        })
    })
</script>