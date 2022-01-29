<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="col-md-12">
        <h1 class="h3 mb-4 text-gray-800">
            <?= $title; ?>
        </h1>
    </div>

</div>

<section>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Daftar Akun
            </div>
            <div class="card-body">
                <div class="scroll">
                    <div class="table-responsive custom-table-responsive">
                        <table id="example" class="table table-striped table-bordered table-lg" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Nama Perusahaan</th>
                                    <th scope="col">No Telpon</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Is_active</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($akun as $row) : ?>
                                    <tr scope="row">
                                        <td><?= $i; ?></td>
                                        <td><?= $row->name; ?></td>
                                        <td><?= $row->email; ?></td>
                                        <td><?= $row->company_name; ?></td>
                                        <td><?= $row->telp; ?></td>
                                        <td><?= $row->alamat; ?></td>
                                        <td><?= $row->role_id; ?></td>
                                        <td><?= $row->is_active; ?></td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>administrator/editAkun/<?php echo $row->id; ?>" type="button" class="btn btn-primary btn-sm">
                                                Edit</a>
                                            <form action="<?= site_url('administrator/hapusAkun'); ?>" method="post">
                                                <input type="hidden" name="id" value="<?= $row->id; ?>">
                                                <button class="btn btn-danger btn-sm">
                                                    Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>