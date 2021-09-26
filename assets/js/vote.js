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
                            if (data == 'true') {
                            window.location.href = 'vote/hasil';
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

    var get_url      = window.location.href;     // Returns full URL (https://example.com/path/example.html)
    var url          = 'http://localhost:8080/app_vote/vote/hasil'
    if(get_url == url){
        // $('#halaman_hasil').ready(function () {

            setInterval(getdata, 5000);
            getdata();
    
            function getdata() {
                $.ajax({
                    url: 'hasil_ajax',
                    type: 'post',
                    dataType: 'json',
                    success: function (response) {
                        var output = '';
                        $.each(response, function(key, value){
                        // console.log(value);
                            $('#output').empty();
                            output += '<div class="card mb-3" style="max-width: 540px;">';
                                output += '<div class="row no-gutters">';
                                    output += '<div class="col-md-4">';
                                        output += '<img src="../assets/upload_kandidat/'+response[key].foto+'" class="img-thumbnail" style="width: 120px; height:198px">';
                                    output += '</div>';
                                    output += '<div class="col-md-8">';
                                        output += '<div class="font-weight-bold text-danger text-capitalize card-header text-center data_ajax">'+response[key].hasil+ ' Suara' +'</div>';
                                        output += '<div class="card-body">';
                                            output += '<p class="text-center font-weight-bold text-capitalize">'+response[key].no_urut+'</p>';
                                            output += '<h5 class="font-weight-bold card-title">'+response[key].nama+'</h5>';
                                            output += '<p class="card-text text-capitalize">'+response[key].alamat+'</p>';
                                        output += '</div>';
                                    output += '</div>';
                                output += '</div>';
                            output += '</div>';
                            return $('#output').append(output);
                        })
                    }
                })
            } 
        }else{
        // bukan halaman vote/hasil 
        // console.log('beda');
    };


    //==============================================================================================//





    //==============================================================================================//

})