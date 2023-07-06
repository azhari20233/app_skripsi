function search(){
	// $("#loading").show(); // Tampilkan loadingnya

	$.ajax({
        type: "POST", // Method pengiriman data bisa dengan GET atau POST
        url: "search.php", // Isi dengan url/path file php yang dituju
        data: {nama : $("#nama").val()}, // data yang akan dikirim ke file proses
        dataType: "json",
        beforeSend: function(e) {
            if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
		},
		success: function(response){ // Ketika proses pengiriman berhasil
            // $("#loading").show(); // Sembunyikan loadingnya

            if(response.status == "success"){ // Jika isi dari array status adalah success
				$("#username").val(response.username); // set textbox dengan id nama
				alert("nama Tidak Ditemukan");
			}
		},
        error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
			alert(xhr.responseText);
        }
    });
}

$(document).ready(function(){

	// $("#loading").show(); // Tampilkan loadingnya

    $("#search").click(function(){ // Ketika user mengklik tombol Cari
        search(); // Panggil function search
    });
});
