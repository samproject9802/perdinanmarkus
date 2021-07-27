$(document).ready(function() {

    $('#inputpesanan #btncekpesanan').on('click', function() {
        $('#cekstatuspesanan').modal('show');
    })

    $("#cekstatuspesanan").on("hidden.bs.modal", function(){
        $("#inputnomortransaksi").val("");
        $("#namapesan").html("");
        $("#uploadbukti").html("");
        $("#statuspesan").html("");
    });

    $('#searchstatuspesanan').submit(function(e) {
        e.preventDefault();

        var nomortrx = $('#inputnomortransaksi').val();
        
        $.ajax({
            type: "POST",
            url:'library/php/user/getdatapesanan.php',
            data: {
                kodetrx:nomortrx
            },
            success: function(response) {
                var dataPesan = JSON.parse(response);
                var dataPesanan = dataPesan[0];
                html = "<button class='btn btn-success' id='btnuploadbp' data-id='"+dataPesanan['Kode_Pemesan']+"' onClick='UploadBukti();'>Upload</button>";
                $('#namapesan').html(dataPesanan['Nama_Pemesan']);
                $('#statuspesan').html(dataPesanan['status']);
                if (dataPesanan['status'] === "Belum Bayar") {
                    if (!dataPesanan['url_buktipembayaran']) {
                        $('#uploadbukti').html(html);
                    } else {
                        $('#uploadbukti').html("Sudah Upload");
                    }
                } else if (dataPesanan['status'] === "Sudah Bayar") {
                    
                }
                
            }
        });
    })

});

function UploadBukti() {
    var idPesan = $('#btnuploadbp').data("id");
    $('#cekstatuspesanan').modal('hide');
    $('#uploadbuktipembayaran').modal("show");

    $('#uploadingfile').submit(function(e) {
        e.preventDefault();

        var fd = new FormData();
        var files = $('#file')[0].files;

        // Check file selected or not
        if(files.length > 0 ){
            fd.append('file',files[0]);
            fd.append('idPesan',idPesan);

            $.ajax({
                url: 'library/php/user/uploadimage.php',
                type: 'post',
                data: fd,
                processData: false,
                contentType: false,
                success: function(response){
                    if(response != 0){
                        Swal.fire(
                                'Berhasil Upload!',
                                'File berhasil diupload',
                                'success'
                                ).then((result) => {
                                                    if (result.isConfirmed) {
                                                        $('#uploadingfile').trigger("reset");
                                                        $('#uploadbuktipembayaran').modal('hide');
                                                        $('#cekstatuspesanan').modal('show');
                                                    }
                                                })
                    }else{
                        Swal.fire(
                                'Failed!',
                                'File gagal diupload',
                                'error'
                                ).then((result) => {
                                                    if (result.isConfirmed) {
                                                        $('#uploadingfile').trigger("reset");
                                                        $('#uploadbuktipembayaran').modal('hide');
                                                        $('#cekstatuspesanan').modal('show');
                                                    }
                                                })
                    }
                },
            });
        }else{
            alert("Please select a file.");
        }
    })
}