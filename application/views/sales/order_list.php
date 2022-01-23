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
                Daftar Order
            </div>
            <div class="card-body">
                <div class="scroll">
                    <div class="table-responsive custom-table-responsive">
                        <table id="example" class="table table-striped table-bordered table-lg" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">Nomor Order</th>
                                    <th scope="col">Alamat Pengiriman</th>
                                    <th scope="col">Tanggal Pengiriman</th>
                                    <th scope="col">Harga Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Detail</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($transaksi as $row) : ?>
                                    <tr scope="row">
                                        <td><?= $i; ?></td>
                                        <td><?= $row->order_nomor; ?></td>
                                        <td><?= $row->alamat_pengiriman; ?></td>
                                        <td><?= $row->tgl_pengiriman; ?></td>
                                        <td><?= "Rp " . number_format($row->grand_total  != null ? $row->grand_total : 0, 2, ",", "."); ?></td>
                                        <td><?= $row->status; ?></td>
                                        <td><a href="<?php echo base_url(); ?>sales/order/<?php echo $row->id; ?>" type="button" class="btn btn-primary btn-sm">Detail</a></td>
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


<script src="<?= base_url('assets/js/jquery.3.2.1.min.js'); ?>"></script>
<!-- <script>
    $(document).ready(function() {
        //Only needed for the filename of export files.
        //Normally set in the title tag of your page.
        document.title = 'Simple DataTable';
        // DataTable initialisation
        $('#example').DataTable({
            "dom": '<"dt-buttons"Bf><"clear">lirtp',
            "paging": false,
            "autoWidth": true,
            "columnDefs": [{
                "orderable": false,
                "targets": 5
            }],
            "buttons": [
                'colvis',
                'copyHtml5',
                'csvHtml5',
                'excelHtml5',
                'pdfHtml5',
                'print'
            ]
        });
        //Add row button
        $('.dt-add').each(function() {
            $(this).on('click', function(evt) {
                //Create some data and insert it
                var rowData = [];
                var table = $('#example').DataTable();
                //Store next row number in array
                var info = table.page.info();
                rowData.push(info.recordsTotal + 1);
                //Some description
                rowData.push('New Order');
                //Random date
                var date1 = new Date(2016, 01, 01);
                var date2 = new Date(2018, 12, 31);
                var rndDate = new Date(+date1 + Math.random() * (date2 - date1)); //.toLocaleDateString();
                rowData.push(rndDate.getFullYear() + '/' + (rndDate.getMonth() + 1) + '/' + rndDate.getDate());
                //Status column
                rowData.push('NEW');
                //Amount column
                rowData.push(Math.floor(Math.random() * 2000) + 1);
                //Inserting the buttons ???
                rowData.push('<button type="button" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button><button type="button" class="btn btn-danger btn-xs dt-delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>');
                //Looping over columns is possible
                //var colCount = table.columns()[0].length;
                //for(var i=0; i <script colCount; i++){			}

                //INSERT THE ROW
                table.row.add(rowData).draw(false);
                //REMOVE EDIT AND DELETE EVENTS FROM ALL BUTTONS
                $('.dt-edit').off('click');
                $('.dt-delete').off('click');
                //CREATE NEW CLICK EVENTS
                $('.dt-edit').each(function() {
                    $(this).on('click', function(evt) {
                        $this = $(this);
                        var dtRow = $this.parents('tr');
                        $('div.modal-body').innerHTML = '';
                        $('div.modal-body').append('Row index: ' + dtRow[0].rowIndex + '<br/>');
                        $('div.modal-body').append('Number of columns: ' + dtRow[0].cells.length + '<br/>');
                        for (var i = 0; i < dtRow[0].cells.length; i++) {
                            $('div.modal-body').append('Cell (column, row) ' + dtRow[0].cells[i]._DT_CellIndex.column + ', ' + dtRow[0].cells[i]._DT_CellIndex.row + ' => innerHTML : ' + dtRow[0].cells[i].innerHTML + '<br/>');
                        }
                        $('#myModal').modal('show');
                    });
                });
                $('.dt-delete').each(function() {
                    $(this).on('click', function(evt) {
                        $this = $(this);
                        var dtRow = $this.parents('tr');
                        if (confirm("Are you sure to delete this row?")) {
                            var table = $('#example').DataTable();
                            table.row(dtRow[0].rowIndex - 1).remove().draw(false);
                        }
                    });
                });
            });
        });
        //Edit row buttons
        $('.dt-edit').each(function() {
            $(this).on('click', function(evt) {
                $this = $(this);
                var dtRow = $this.parents('tr');
                $('div.modal-body').innerHTML = '';
                $('div.modal-body').append('Row index: ' + dtRow[0].rowIndex + '<br/>');
                $('div.modal-body').append('Number of columns: ' + dtRow[0].cells.length + '<br/>');
                for (var i = 0; i < dtRow[0].cells.length; i++) {
                    $('div.modal-body').append('Cell (column, row) ' + dtRow[0].cells[i]._DT_CellIndex.column + ', ' + dtRow[0].cells[i]._DT_CellIndex.row + ' => innerHTML : ' + dtRow[0].cells[i].innerHTML + '<br/>');
                }
                $('#myModal').modal('show');
            });
        });
        //Delete buttons
        $('.dt-delete').each(function() {
            $(this).on('click', function(evt) {
                $this = $(this);
                var dtRow = $this.parents('tr');
                if (confirm("Are you sure to delete this row?")) {
                    var table = $('#example').DataTable();
                    table.row(dtRow[0].rowIndex - 1).remove().draw(false);
                }
            });
        });
        $('#myModal').on('hidden.bs.modal', function(evt) {
            $('.modal .modal-body').empty();
        });
    });
</script> -->