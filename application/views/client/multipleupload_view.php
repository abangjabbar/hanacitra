<div class="container">
    <div class="row mt-3">
        <div class="col-sm-12">
            <h3>Single Upload</h3>
            <h4 class="text-danger"><?= $this->session->flashdata('status'); ?></h4>
            <div class="card">
                <div class="card-header">
                    <div class="card-body">
                        <?= form_open_multipart('client/multipleupload'); ?>
                        <div class="form-group row">
                            <label for="image" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-8">
                                <input type="hidden" name="id" value="">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image">
                                    <label for="image" class="custom-file-label">Pilih gambar</label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <button type="cubmit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        Hasil Upload
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="" alt="" class="img-thumbnail">
                                    </div>
                                    <div class="card-footer">
                                        <a href="" class="btn btn-primary">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>