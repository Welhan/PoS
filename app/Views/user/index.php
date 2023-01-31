<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary btn-sm" id="btnNew">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
            <div class="card-body">

                <?php if (session()->getFlashdata('message')) : ?>
                    <div class="alert <?= session()->getFlashdata('alert'); ?>" role="alert">
                        <?= session()->getFlashdata('message'); ?>
                    </div>
                <?php endif; ?>

                <table class="table table-hover datatable text-center">
                    <thead>
                        <th style="width: 40px;">#</th>
                        <th>Nama</th>
                        <th>Level</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= ucwords($user->nama); ?></td>
                                <td><?= $user->role; ?></td>
                                <td></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="viewModal" style="display: none;"></div>
<?= $this->endSection(); ?>

<?= $this->section('javascript'); ?>

<script>
    $(document).ready(() => {
        $('#btnNew').click(() => {
            $.ajax({
                url: 'user/newUser',
                dataType: 'json',
                beforeSend: function() {
                    $('#btnNew').attr('disabled', 'disabled');
                },
                success: function(response) {
                    $('#btnNew').removeAttr('disabled');
                    if (response.error) {
                        if (response.error.logout) {
                            window.location.href = response.error.logout
                        }
                    } else {
                        $('#viewModal').html(response.data).show();
                        $('#addModal').modal('show');
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
        })

        // For Allert Purpose
        window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                $(this).remove();
            });
        }, 5000);
    })
</script>

<?= $this->endSection(); ?>