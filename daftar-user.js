$(document).ready(function() {
    $("#cek_nim").click(function() {
        // fungsi untuk mengecek total nilai mahasiswa
        $("#pesan").html("<img src='style/img/ajax-loader1.gif' />");
//        $("#pesan").hide();
        var nim = $("#inputNim").val();
        $.ajax({
            type: "GET",
            url: "modules/mod_validasi/ambil-nim.php",
            data: "inputNim=" + nim,
            success: function(data) {
                if (data === '') {
                    $("#pesan").fadeIn(300);
                    $("#pesan").html("<div class='alert alert-danger alert-dismissable'><button type='button' class='close' data-dismiss='alert'>×</button><i class='fa fa-ban fa-fw'></i> NIM Tidak Ditemukan, Hubungi Bagian PusTIK untuk NIM Anda.</div>");
                    
                    $("#pesan").fadeOut(5000);
                }
                else {
                    $("#pesan").fadeIn(300);
                    $("#pesan").html(" <div class='alert alert-info alert-dismissable'><i class='fa fa-info'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><b>Info</b> Data Telah Ditemukan ...</div>");
                    $("#inputNama").val(data);
                    $("#pesan").fadeOut(2500);
                }
            }
        });

        // fungsi untuk mengecek email mahasiswa
        $.ajax({
            type: "GET",
            url: "modules/mod_validasi/ambil-prodi.php",
            data: "inputNim=" + nim,
            success: function(data) {
                if (data !== ''){
                    $("#inputProdi").val(data);
                }
            }
        });
        // fungsi untuk mengecek gender mahasiswa
        $.ajax({
            type: "GET",
            url: "modules/mod_validasi/ambil-angkatan.php",
            data: "inputNim=" + nim,
            success: function(data) {
                if (data !== ''){
                    $("#inputAngkatan").val(data);
                }
            }
        });
    });
});


