<div class="container-fluid content-fill" id="formpemesanandiv">
    <div class="container h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <h3>Form Pemesanan Pelanggan</h3>
            <form class="mt-5" id="inputpesanan">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Pemesan</label>
                    <input type="text" class="form-control" id="namapenerima" placeholder="Masukkan nama pemesan">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
                    <select class="form-select" aria-label="Default select example" id="namaproduk">
                        <option selected disabled data-id=''>Pilih Produk...</option>
                        <?php
                        require_once('library/php/koneksi.php');

                        $sql = "SELECT * FROM tb_bubukkopilintong";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='$row[Kode_Bubukkopi]' data-id='$row[Nama_Bubukkopi]'>$row[Nama_Bubukkopi]</option>";
                            }
                        } else {
                            echo "<option disabled data-id=''>No Data Available</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Jumlah Pesanan</label>
                    <input type="text" class="form-control" id="jumlahpesanan" placeholder="Masukkan jumlah pesanan">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Harga</label>
                    <input type="text" readonly class="form-control" id="hargadesc">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Tanggal Pemesanan</label>
                    <input type="text" readonly class="form-control" id="datenow">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Alamat</label>
                    <textarea class="form-control" placeholder="Masukkan Alamat Pengiriman" style="height: 100px" id="alamatpengiriman"></textarea>
                </div>
                <button type="submit" class="btn btn-primary px-3">Simpan</button>
                <button type="reset" class="btn btn-primary mx-4 px-4">Batal</button>
                <button type="button" class="btn btn-primary" id="btncekpesanan">Cek Status Pesanan</button>
            </form>
        </div>
    </div>

    <br><br><br>
</div>



<div class="modal fade" id="cekstatuspesanan" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel">Pencarian Status Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="d-flex mb-3" id="searchstatuspesanan">
                    <input class="form-control me-2" type="search" placeholder="Masukkan Nomor Transaksi" aria-label="Search" id="inputnomortransaksi">
                    <button class="btn btn-outline-success" type="submit">Cari</button>
                </form>
                <table class="table table-success table-striped">
                    <thead>
                        <th>Nama</th>
                        <th>Upload Bukti pembayaran</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="namapesan"></td>
                            <td id="uploadbukti" align="center"></td>
                            <td id="statuspesan" align="center"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="uploadbuktipembayaran" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2">Upload Bukti Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="uploadingfile" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" id="file" name="file">
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                    </div>
                    <div class="mb-3" align="center">
                        <button type="submit" class="btn btn-success">Submit</button>
                        <button class="btn btn-danger mx-3" type="reset">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>