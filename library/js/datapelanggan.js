$(document).ready(function() {
    $('#tabledatapelanggan').DataTable();
    $('#btnPrintadm').on('click', function() {
        window.print();
    })
    $.ajax({
        type: "POST",
        url: 'library/php/admin/getdatapelanggan.php',
        success: function(response) {
            var dataSaya = response.split("+");
            var widgetTab = JSON.parse(dataSaya[0]);
            $('#defaultDataPelanggan').html(widgetTab);
            var widgetData = JSON.parse(dataSaya[1]);
            widgetData.forEach((items) => {
                $(`#btnke${items.Kode_Pemesan}`).on('click', function() {
                    if (items.url_buktipembayaran) {
                        $("#myImgShow").attr("src", "library/php/user/upload/" + items.url_buktipembayaran);
                        $('#showimagebukpem').modal('show');
                    } else {
                        alert("Pelanggan belum upload");
                    }
                })

                $(`#btnvrf${items.Kode_Pemesan}`).on('click', function() {
                    $.ajax({
                        type: "POST",
                        url: 'library/php/admin/updatingdata.php',
                        data: {
                            idUser: items.Kode_Pemesan,
                            status: "Sudah Bayar"
                        },
                        success: function(response) {
                            if (response === "Sukses") {
                                window.location.reload(true);
                            } else if (response === "Gagal") {
                                window.location.reload(false);
                            }
                        }
                    });
                })
            });
        }
    });
});