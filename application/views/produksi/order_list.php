<section id="top2" class="d-flex align-items-center">
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">
            <?= $title; ?>
        </h1>
    </div>
</section><!-- End top2 -->

<section>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#cari">FILTER</button>
                <?php if ($filter['name'] !== null && $filter['name'] !== '') : ?>
                    <a type="button" class="btn btn-outline-primary" id="filter_name" disabled>Nama Client : <?= $filter['name']; ?> <i class="far fa-times-circle"></i></a>
                <?php endif; ?>
                <?php if ($filter['order_nomor'] !== null && $filter['order_nomor'] !== '') : ?>
                    <a type="button" class="btn btn-outline-primary" id="filter_order_nomor" disabled>Nomor Order : <?= $filter['order_nomor']; ?> <i class="far fa-times-circle"></i></a>
                <?php endif; ?>
                <?php if ($filter['company_name'] !== null && $filter['company_name'] !== '') : ?>
                    <a type="button" class="btn btn-outline-primary" id="filter_company_name" disabled>Nama Perusahaan : <?= $filter['company_name']; ?> <i class="far fa-times-circle"></i></a>
                <?php endif; ?>
                <?php if ($filter['status'] !== null && $filter['status'] !== '') : ?>
                    <a type="button" class="btn btn-outline-primary" id="filter_status" disabled>Status : <?= $filter['status']; ?> <i class="far fa-times-circle"></i></a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="scroll">
                    <div class="table-responsive custom-table-responsive">
                        <table id="example" class="table table-striped table-bordered table-lg" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nomor Order</th>
                                    <th scope="col">Nama Client</th>
                                    <th scope="col">Perusahaan</th>
                                    <th scope="col">Alamat Pengiriman</th>
                                    <th scope="col">Tanggal Pengiriman</th>
                                    <th scope="col">Harga Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = $page + 1; ?>
                                <?php foreach ($transaksi->result() as $row) : ?>
                                    <tr scope="row">
                                        <td><?= $i; ?></td>
                                        <td><?= $row->order_nomor; ?></td>
                                        <td><?= $row->name; ?></td>
                                        <td><?= $row->company_name; ?></td>
                                        <td><?= $row->alamat_pengiriman; ?></td>
                                        <td><?= $row->tgl_pengiriman; ?></td>
                                        <td><?= "Rp " . number_format($row->grand_total  != null ? $row->grand_total : 0, 2, ",", "."); ?></td>
                                        <td><?= $row->status; ?></td>
                                        <td><a href="<?php echo base_url(); ?>produksi/order/<?php echo $row->id; ?>" type="button" class="btn btn-primary btn-sm">Detail</a></td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col">
                                <!--Tampilkan pagination-->
                                <?php echo $pagination; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Search Modal-->
<div class="modal fade" id="cari" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FILTER</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <strong for="inputAddress">Nomor Order</strong>
                    <input type="text" class="form-control" id="order_nomor" name="harga_item" value="<?= $filter['order_nomor']; ?>" placeholder="Nomor Order" required>
                </div>
                <div class="col-md-12">
                    <strong for="inputAddress">Nama Client</strong>
                    <input type="text" class="form-control" id="name" name="harga_item" value="<?= $filter['name'];  ?>" placeholder="Nama Client" required>
                </div>
                <div class="col-md-12">
                    <strong for="inputAddress">Nama Perusahaan</strong>
                    <input type="text" class="form-control" id="company_name" name="harga_item" value="<?= $filter['company_name'];  ?>" placeholder="Nama Perusahaan" required>
                </div>
                <div class="col-md-12">
                    <strong for="inputAddress">Status</strong>
                    <select id="status" value="<?= $filter['status']; ?>" class="form-control input-lg">
                        <option value="">Pilih Status</option>
                        <option value="Pembayaran Terkonfirmasi">Pembayaran Terkonfirmasi</option>
                        <option value="Order Sedang Diproses">Order Sedang Diproses</option>
                        <option value="Order Dikirim">Order Dikirim</option>
                        <option value="Order Selesai">Order Selesai</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" id="search" data-dismiss="modal">Search</button>
            </div>
        </div>
    </div>
</div>

<script src="<?= base_url('assets/js/jquery.3.2.1.min.js'); ?>"></script>
<script type="text/javascript">
    var filterValue = <?= json_encode($filter); ?>;


    function reset(id) {
        $(id).val('');
        filter();
    }

    function filter() {


        $.ajax({
            url: "<?= base_url(); ?>produksi/daftarOrder",
            method: "POST",
            data: {
                updateFilter: true,
                name: $('#name').val(),
                order_nomor: $('#order_nomor').val(),
                company_name: $('#company_name').val(),
                status: $('#status').val()
            },
            success: function(data) {
                // console.log(data);
                document.open();
                document.write(data);
                document.close();
            }
        })
    }
    $(document).ready(function() {
        $('#status').val(filterValue.status);
        $('#search').click(filter);
        $('#filter_name').click(() => reset('#name'));
        $('#filter_order_nomor').click(() => reset('#order_nomor'));
        $('#filter_company_name').click(() => reset('#company_name'));
        $('#filter_status').click(() => reset('#status'));

    });
</script>