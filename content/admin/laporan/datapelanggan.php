<div class="container-fluid">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-4">
        <button class="btn btn-primary me-md-2" type="button" id="btnPrintadm">Print</button>
    </div>
    <div class="printableArea">
        <table id="tabledatapelanggan" class="table table-striped table-bordered">
            <thead>
                <th>No.</th>
                <th>Kode Trx</th>
                <th>Nama Pelanggan</th>
                <th>Alamat Pelanggan</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Tanggal Pemesanan</th>
                <th id="buktibayaradm">Bukti Pembayaran</th>
                <th id="statusbayaradm">Status</th>
            </thead>
            <tbody id="defaultDataPelanggan" align="center">
            </tbody>
        </table>
    </div>
</div>

<div class="modal fade" id="showimagebukpem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <img id="myImgShow" class="img-fluid">
            </div>
        </div>
    </div>
</div>