<section id="top">
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <h3>Single Upload</h3>

                <div class="col-sm-12 mt-2">
                    <div class="card">
                        <div class="card-header">
                            Hasil Upload Image
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php foreach ($drawing as $image) : ?>
                                    <div class="col-sm-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <img src="<?= base_url('assets/drawing_client/' . $image['image']); ?>" alt="<?= $image['image']; ?>" class="img-thumbnail">
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
</section>