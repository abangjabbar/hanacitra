<div class="container">
    <div class="row mt-3">
        <div class="col-sm-12">
            <h3>Single Upload</h3>
            <h4 class="text-danger"><?= $this->session->flashdata('status'); ?></h4>
            <div class="card">
                <div class="card-header">
                    Upload Image
                </div>
                <div class="card-body">
                    <?= form_open_multipart('client/upload'); ?>
                    <div class="form-group row">
                        <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-8">
                            <input type="hidden" name="id" value="">
                            <div class="input-group mb-3">
                                <input type="file" for="image" class="form-control" id="image" name="image[]" multiple>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>
            </div>

            <div class="col-sm-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        Hasil Upload
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($groupImage as $group) : ?>
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="<?= base_url('assets/drawing_client/' . $group['image']); ?>" alt="<?= $group['image']; ?>" class="img-thumbnail">
                                        </div>
                                        <div class="card-footer">
                                            <a href="<?= base_url('client/detail/' . $group['group_image']); ?>" class="btn btn-primary">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>