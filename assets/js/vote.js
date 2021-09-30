$(document).ready(function(){

    //==============================================================================================//

    // alert toast
	$sukses = $(".sukses").attr("data-id");
	$flash = $(".gagal").attr("data-id");
	$(function () {
		const Toast = Swal.mixin({
			toast: true,
			position: "top-end",
			showConfirmButton: false,
			timer: 4000,
		});

		if ($sukses) {
			Toast.fire({
				icon: "success",
				title: $sukses,
			});
		} else if ($flash) {
			Toast.fire({
				icon: "error",
				title: $flash,
			});
		}
	});
    
    //==============================================================================================//
    // alert ketika kandidat RT dipilih
    $('.kandidat').on('click', function(){
        var data_kandidat = $(this).attr('data-id');
        var pemilih       = $('.data').attr('data-id');
            Swal.fire({
                icon: 'warning',
                text: 'Apakah anda yakin memilih kandidat ini?',
                allowOutsideClick: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'vote/insert',
                        type: 'post',
                        data: {
                            data_kandidat:data_kandidat,
                            pemilih: pemilih
                        },
                        success: function(data){
                            // console.log(data);
                            if (data == 'true') {
                            window.location.href = 'vote/hasil';
                        }
                    }
                })
            }
        })  
    })

    //==============================================================================================//
    // button uintuk logout
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
    // button untuk memulai pemilu
    $('.mulai_pemilu').click(function(e){
	e.preventDefault();
    var link = $(this).attr("href");
    var id   = $('.data').attr("data-id");
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

            // setInterval(getdata, 5000);
            setInterval(alert, 5000);
            getdata();
            alert()
            sum()

            // untuk mendapatkan data hasil pemilu
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

            // untuk mendapatkan status data terbaru untuk mengeluarkan alert dan suara
            function alert(){
                $.ajax({
                    url: 'ajax_alert',
                    type: 'post',
                    success: function(data){
                        // console.log(data);
                        var obj = JSON.parse(data)
                        var nilai = obj.hasil;

                        var cek_local = localStorage.getItem('nilai');
                        var set_local = localStorage.setItem('nilai', nilai);

                        if (cek_local != nilai) {

                            set_local;
                            
                            playMusic()

                            const Toast = Swal.mixin({
                                toast: true,
                                position: "top-end",
                                showConfirmButton: false,
                                timer: 4000,
                            });

                            Toast.fire({
                                icon: "success",
                                title: 'Perolehan Data Kandidat Berubah',
                            });                        
                        }else{
                            //'data sama';
                        }
                    }
                })
            }

            // untuk menghitung total suara yg sudah diambil
            function sum(){
                $.ajax({
                    url: 'ajax_sum',
                    type: 'post',
                    // dataType: 'json',
                    success: function(data){
                        console.log(data);
                        var obj = JSON.parse(data)
                        var total_pemilih = obj[0].total_pemilih
                        var pemilih_sah = obj[1].pemilih_sah
                        var tidak_sah = obj[2].tidak_sah
                        var golput = obj[3].golput

                        $('#jumlah_pemilih').html('Jumlah pemilih Sementara : ' + '<b>' + total_pemilih + '</b>')
                        $('#sah').html('Jumlah pemilih Sah : ' + '<b>' + pemilih_sah + '</b>')
                        $('#tidak_sah').html('Jumlah Pemilih Tidak Sah : ' + '<b>' +tidak_sah + '</b>')
                    }
                })
            }

    }else{
    // bukan halaman vote/hasil 
    // console.log('beda');
    };

    function playMusic() {
    $("#myAudio")[0].play();
    }


    //==============================================================================================//





    //==============================================================================================//

})