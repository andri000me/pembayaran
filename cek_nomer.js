$(document).ready(function() {
    $("#cek_nim").click(function() {
        // fungsi untuk mengecek total nilai mahasiswa
        $("#pesan").html("<img src='style/img/loader2.gif' />");
//        $("#pesan").hide();
        var nim = $("#inputNim").val();
        $.ajax({
            type: "GET",
            url: "modules/mod_kirimPesan/ambil-nomer.php",
            data: "inputNim=" + nim,
            success: function(data) {
                if (data === '') {
                    $("#pesan").fadeIn(300);
                    $("#pesan").html("<div class='alert alert-dismissable alert-warning'><button type='button' class='close' data-dismiss='alert'>×</button><i class='fa fa-ban fa-fw'></i> NIM Tidak Ditemukan, Hubungi Bagian PusTIK untuk NIM Anda.</div>");
                    
                    $("#pesan").fadeOut(5000);
                }
                else {
                    $("#pesan").fadeIn(300);
                    $("#pesan").html(" <div class='alert alert-success alert-dismissable'><i class='fa fa-check'></i><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><b>Info</b> Data Telah Ditemukan...</div>");
                    $("#inputNomer").val(data);
                    $("#pesan").fadeOut(2500);
                }
            }
        });
        });
        });