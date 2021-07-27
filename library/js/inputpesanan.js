$(document).ready(function() {
    var today = new Date();
    var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var datetrx = today.getFullYear().toString() + (today.getMonth() + 1).toString() + today.getDate().toString();
    var timetrx = today.getHours().toString() + today.getMinutes().toString() + today.getSeconds().toString();
    var trxformat = "BKL" + datetrx + timetrx;
    $('#datenow').val(date + " " + time);

    $('#namaproduk').on('change', function() {
        var namaproduk = $('#namaproduk').val();
        $.ajax({
            type: "POST",
            url: 'library/php/user/getdataproduk.php',
            data: { idproduk: namaproduk },
            success: function(response) {
                $('#hargadesc').val("Rp. " + response);
            }
        });
    });

    $("#inputpesanan").submit(function(e) {
        e.preventDefault();

        var data = [];

        var namapenerima = $('#namapenerima').val();
        var namaproduk = $('#namaproduk').find(':selected').attr('data-id');
        var jumlahpesanan = $('#jumlahpesanan').val();
        var harga = $('#hargadesc').val();
        var alamat = $('#alamatpengiriman').val();

        if (namapenerima, namaproduk, jumlahpesanan, harga, alamat === "") {
            data.push();
        } else {
            data.push(namapenerima, namaproduk, jumlahpesanan, harga, alamat);
        }

        var realprice = harga.split(" ");
        var totalbayar = realprice[1] * jumlahpesanan;

        $('.modal-body #totalbayar').html("Rp. " + totalbayar);
        $('.modal-body #namapenerima').html(namapenerima);
        $('.modal-body #namaproduk').html(namaproduk);
        $('.modal-body #jumlahpesanan').html(jumlahpesanan);
        $('.modal-body #harga').html(harga);
        $('.modal-body #tanggalpesanantab').html(date + " " + time);
        $('.modal-body #alamat').html(alamat);

        if (data.length == 0) {
            alert("Anda belum mengisi semua data");
        } else {
            $('#exampleModal').modal('show');
        }

        $('.modal-footer #prosesdata').on('click', function() {
            window.print();
            $.ajax({
                type: "POST",
                url: 'library/php/user/inputdatapesanan.php',
                data: {
                    kodetrx: trxformat,
                    namapenerima: namapenerima,
                    alamatpenerima: alamat,
                    kodekopi: $('#namaproduk').val(),
                    tanggalpesanan: date + " " + time,
                    jumlahpesanan: jumlahpesanan
                },
                success: function(response) {
                    $('#exampleModal').modal('hide');
                    var bodyResponse = response.split(" ");
                    if (bodyResponse[0] == "Sukses") {
                        Swal.fire(
                            'Transaksi Berhasil!',
                            'Nomor Transaksi Anda : ' + bodyResponse[1],
                            'success').then((result) => {
                            if (result.isConfirmed) {
                                $("#inputpesanan").trigger("reset");
                            }
                        });
                    } else if (bodyResponse[0] == "Error") {
                        Swal.fire('Transaksi Gagal!', '', 'error');
                    } else {
                        Swal.fire(response, '', 'error');
                    }
                }
            });
        })
    });
})