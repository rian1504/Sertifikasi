$(function(){
    $("#tipe_kamar").change(function(){
        var tipe_kamar = $("#tipe_kamar").val();

        $("#tgl_check_in").prop('disabled', false);
        $("#btn_check_in").prop('disabled', false);

        $.ajax({
            url: '../autofill/tipe_kamar.php',
            type: 'POST',
            dataType: 'json',
            data: {
                'tipe_kamar': tipe_kamar
            },
            success: function(data){
                $("#total_kamar").val(data[0]);
            }
        });
    });
})