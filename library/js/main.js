function registrationsuccess() {
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
   setTimeout(function () {
                            window.location.href = "./index.php?page=login";
                          }, 3000)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Registrasi Sukses!'
})
};

function loginsuccess() {
                          const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                            setTimeout(function () {
                                                      window.location.href = "./index.php";
                                                    }, 3000)
                            }
                          })

                          Toast.fire({
                            icon: 'success',
                            title: 'Berhasil Login!'
                          })
};

function adminsuccess() {
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
   setTimeout(function () {
                            window.location.href = "./admin/index.php";
                          }, 3000)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Berhasil Login!'
})
};

function registrationfailed() {
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
   setTimeout(function () {
                            window.location.href = "./index.php?page=registrasi";
                          }, 3000)
  }
})

Toast.fire({
  icon: 'error',
  title: 'Registrasi Gagal!'
})
};

function loginfailed() {
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
   setTimeout(function () {
                            window.location.href = "./index.php";
                          }, 3000)
  }
})

Toast.fire({
  icon: 'error',
  title: 'Login Gagal!'
})
};

function logout() {
  window.location.href = "library/php/logout.php";
}

function detailOrder(id) {
  var id = id;
  var tugas = "showdata";
  $.ajax({
        url: "library/php/admin/getdataorder.php",
        type: "post",
        data: {
          kodepemesanan: id,
          tugas: tugas
        },
        success: function (response) {
          var arrData = response;
          var x = JSON.parse(arrData);
          var y = x[0];

          document.getElementById("kodepemesananorder").value = y.kode_pemesanan.toString();
          document.getElementById("namaorder").value = y.nama_penerima.toString();
          document.getElementById("alamatorder").value = y.alamat_penerima.toString();
          document.getElementById("nohporder").value = y.no_hp.toString();
          document.getElementById("pesananorder").value = y.pesanan.toString();
          document.getElementById("hargaorder").value = y.harga.toString();
          document.getElementById("jumlahpesananorder").value = y.jumlah_pesanan.toString();
          document.getElementById("totalpembayaranorder").value = (y.harga.toString()) * (y.jumlah_pesanan.toString());
          validateOrder(y.kode_pemesanan.toString());
           // You will get response from your PHP page (what you echo or print)
        },
        error: function(jqXHR, textStatus, errorThrown) {
           console.log(textStatus, errorThrown);
        }
    });
}

function hapusOrder(id) {
  var id = id;
  var tugas = "deletedata";
  $.ajax({
          url: "library/php/admin/getdataorder.php",
          type: "post",
          data: {
            kodepemesanan: id,
            tugas: tugas
          },
          success: function (response) {
            if (response == "Success") {
              window.location.href = "index.php?page=data-pemesanan";
            } else {
              alert(response);
            }
            // You will get response from your PHP page (what you echo or print)
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
          }
      });
}

function validateOrder(id) {
  var id = id;
  var tugas = "updatedata";
  $('#updateOrder').click(function() {
    $.ajax({
              url: "library/php/admin/getdataorder.php",
              type: "post",
              data: {
                kodepemesanan: id,
                tugas: tugas
              },
              success: function (response) {
                if (response == "Success") {
                  window.location.href = "index.php?page=data-pemesanan";
                }
                // You will get response from your PHP page (what you echo or print)
              },
              error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
              }
          });
  })
}

