<section id="top">
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <h3>Detail Desain</h3>

                <div class="col-sm-12 mt-2">
                    <div class="card">
                        <div class="card-header">
                            Hasil Upload Desain
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <?php foreach ($images as $image) : ?>
                                        <div class="card">
                                            <div class="card-body">
                                                <embed src="<?= base_url('assets/drawing_client/' . $image->image); ?>" width="400" height="500" alt="<?= $image->image; ?>">
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
    </div>
</section>