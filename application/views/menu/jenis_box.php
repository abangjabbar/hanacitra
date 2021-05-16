<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">
        <?= $title; ?>
    </h1>


    <div class="row">
        <div class="col-lg-6">

            <?= form_error(
                'jenis',
                '<div class="alert alert-danger" role="alert">',
                '</div>'
            ); ?>

            <?= $this->session->flashdata('message'); ?>

            <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#jenisBaru">Tambah Jenis Box</a>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Jenis Box</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Gambar Box</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($box as $b) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $b['jenis']; ?></td>
                            <td><?= $b['keterangan']; ?></td>
                            <td><img src="<?= base_url('assets/img/jenisbox/') . $b['image']; ?>" width="150"></td>
                            <td>
                                <a href="" class="badge badge-success">edit</a>
                                <a href="" class="badge badge-danger">hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="jenisBaru" tabindex="-1" role="dialog" aria-labelledby="jenisBaruLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="jenisBaruLabel">Tambah Jenis Box</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open_multipart('menu/jenisbox'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Nama Jenis Box">
                    <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan">
                    <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" for="image">
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Menu</button>
            </div>
        </div>
    </div>
</div>