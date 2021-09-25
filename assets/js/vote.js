$(document).ready(function(){
    //==============================================================================================//
    $('.kandidat').on('click', function(){
        var data_kandidat = $(this).attr('data-id');
            Swal.fire({
                icon: 'warning',
                text: 'Apakah anda yakin memilih kandidat ini?',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'vote/insert',
                        type: 'post',
                        data: {data_kandidat:data_kandidat},
                        success: function(data){
                            if (data=='true') {
                            window.location.href = 'vote/hasil'
                        }
                    }
                })
            }
        })  
    })

    //==============================================================================================//

    $('.logout').click(function(e){
	e.preventDefault();
    var link = $(this).attr("href");
		Swal.fire({
			title: "Yakin?",
			text: "Anda akan keluar dari sistem Pemilu",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#d33",
			cancelButtonColor: "silver",
			confirmButtonText: "Ya, Logout",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
			window.location = link;
			}
		});
	})

    //==============================================================================================//

    $('.mulai_pemilu').click(function(e){
	e.preventDefault();
    var link = $(this).attr("href");
		Swal.fire({
			title: "Yakin?",
			text: "Anda akan masuk ke sistem Pemilu",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#d33",
			cancelButtonColor: "silver",
			confirmButtonText: "Ya, Masuk",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
			window.location = link;
			}
		});
	})

   //==============================================================================================//

    $('#halaman_hasil').ready(function () {
        alert('ambil_data hasil ajax')
    })





    //==============================================================================================//

})