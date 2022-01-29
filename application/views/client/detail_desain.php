<section id="top">
    <div class="container">
        <div class="row mt-3">
            <div class="col-sm-12">
                <h3>Detail Desain</h3>

                <div class="col-sm-12 mt-2">
                    <div class="card"">
                        <div class=" card-header">
                        Hasil Upload Desain
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <?php foreach ($images as $image) : ?>
                                <div class="col-sm-8">
                                    <div class="card">
                                        <div class="card-body" style="float: center;">
                                            <embed src="<?= base_url('assets/drawing_client/' . $image->image); ?>#toolbar=0" width="700" height="600" </embed>
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
</section>