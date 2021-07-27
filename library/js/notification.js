$(document).ready(function(){

    var down = false;
    
    $('#dropdownbutton #btnAlertPopup').on('click',function(e){
        var color = $(this).text();
        if(down){
        $('#box').css('height','0px');
        $('#box').css('opacity','0');
        down = false;
        } else{
            $('#box').css('height','auto');
            $('#box').css('opacity','1');
            down = true;
        }
    });

    $.ajax({
        method: 'GET',
        url: 'library/php/admin/hitungdata.php',
        success: function(response){
            let widgetCard = `<div class='notifications' id='box'>
                        <h2 id='after-content'>Notifications - <span>${response}</span></h2>
                        </div>`

            $('#btnAlertPopup').after(widgetCard);
            $('#sumnotifdata').html(response);
        }
    });

    $.ajax({
        method: 'GET',
        url: 'library/php/admin/selectnotif.php',
        success: function(response){
            $('#after-content').after(response);
        }
    });
});

function notifPesanan() {
    window.location.href = "index.php?page=data-pemesanan&tab=data-pelanggan";
}