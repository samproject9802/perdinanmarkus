<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form id="forminputnamaproduk" method="POST">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" id="inputnamaproduk">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="inputharga">
                        </div>
                        <button type="submit" class="btn btn-success">Proses</button>
                        <button type="reset" class="btn btn-danger">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col">
            <table id="tabledatabubukkopi" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <th>No.</th>
                    <th>Nama Bubuk Kopi</th>
                    <th>Harga (/pcs)</th>
                </thead>
                <tbody id="showdatabubukkopi"></tbody>
            </table>
        </div>
    </div>
</div>