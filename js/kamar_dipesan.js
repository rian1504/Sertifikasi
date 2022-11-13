$(function(){
    $("#tgl_check_in").change(function(){
        var tgl_check_in = $("#tgl_check_in").val();
        var tipe_kamar = $("#tipe_kamar").val();
        var total_kamar = $("#total_kamar").val();

        $("#tipe_kamar").prop('disabled', true);

        $.ajax({
            url: '../autofill/kamar_dipesan.php',
            type: 'POST',
            dataType: 'json',
            data: {
                'tgl_check_in': tgl_check_in,
                'tipe_kamar' : tipe_kamar
            },
            success: function(data){
                $("#sisa_kamar").val(total_kamar-data[0]);            }
        });
    });
})