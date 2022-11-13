$(function(){
    $("#btn_check_in").click(function(){
        $("#tgl_check_in").val("");
        $("#tipe_kamar").prop("disabled", false);
        $("#tgl_check_in").prop("disabled", true);
        $("#btn_check_in").prop("disabled", true);
    });
})