$(document).ready(function() {
    $('#tabledatabubukkopi').DataTable();

    $.ajax({
                type: "POST",
                url: 'library/php/admin/inputdataproduk.php',
                data: {
                    aksi:"Show",
                },
                success: function(response) {
                    $('#showdatabubukkopi').html(response);
                }
            });

    $("#forminputnamaproduk").submit(function(e) {
        e.preventDefault();

        var namaproduk = $('#inputnamaproduk').val();
        var harga = $('#inputharga').val();

        if (namaproduk,harga == "") {
            alert("Isikan Nama Produk dan Harga");
        } else {
            $.ajax({
                type: "POST",
                url: 'library/php/admin/inputdataproduk.php',
                data: {
                    aksi:"Input",
                    namaproduk:namaproduk,
                    hargaproduk:harga
                },
                success: function(response) {
                    if (response == "Sukses") {
                        Swal.fire(
                            'Berhasil!', 
                            'Data anda berhasil dimasukkan', 
                            'success').then((result) => {
                                                        if (result.isConfirmed) {
                                                            window.location.reload(true);
                                                        }
                        });
                    } else if (response == "Gagal") {
                        Swal.fire(
                            'Gagal!', 
                            'Data anda gagal dimasukkan', 
                            'error').then((result) => {
                                                        if (result.isConfirmed) {
                                                            window.location.reload(false);
                                                        }
                        });
                    }
                }
            });
        }
    });
});