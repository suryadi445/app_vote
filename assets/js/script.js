$(document).ready(function () {
	// menghapus pesan error dari form validasi ci
	$("input").click(function () {
		$(".errors").addClass("d-none");
		$('.eror').hide()
	});

// =========================================================================================================//

	// manipulasi text pada input file gambar bootstrap
	$(".custom-file-input").on("change", function () {
		let fileName = $(this).val().split("\\").pop();
		$(this).next(".custom-file-label").addClass("selected").html(fileName);
	});

// =========================================================================================================//

	// alert
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

// =========================================================================================================//

	// mendapatkan row untuk edit
	$('.edit').click(function(){
		var data_id = $(this).attr('data-id');
		var data_link = $(this).attr('data-link')

		$.ajax({
			url : data_link,
			type: 'post',
			data: {data_id : data_id},
			success: function (response) {
				var obj = JSON.parse(response);
				$('#nama').val(obj.nama)
				$('#nik').val(obj.nik)
				$('#handphone').val(obj.handphone)
				$('#alamat').val(obj.alamat)
				$('#no_kandidat').val(obj.no_urut)
				$('#id').val(obj.id)
				$('#jenis_kelamin').val(obj.jenis_kelamin).change()
			}
		})
	})

// =========================================================================================================//

	// proses edit
	$('#proses_edit').click(function () {
		var form_data = new FormData($("#form")[0]);
		var data_link = $(this).attr('data-link')

		$.ajax({
			url : data_link,
			type: 'post',
			enctype : 'multipart/form-data',
			cache: false,
			contentType: false,
			processData: false,
			data : form_data,
			success :  function (response) {
				var obj = JSON.parse(response)

				if(response == 'true'){
					// edit sukses
					$('#modal_pengurus').modal('hide');
					location.reload()
				}else{
					// edit gagal
					var error_nama = obj.nama
					var error_nik = obj.nik
					var error_alamat = obj.alamat
					var error_no_kandidat = obj.no_kandidat
					var error_handphone = obj.handphone
					var error_gambar = obj.gambar

					$('.eror').show()
					$('.error_nama').html(error_nama)
					$('.error_nik').html(error_nik)
					$('.error_alamat').html(error_alamat)
					$('.error_no_kandidat').html(error_no_kandidat)
					$('.error_handphone').html(error_handphone)
					$('.error_gambar').html(error_gambar)
				}
			}
		})
	})

// =========================================================================================================//

	// hapus data
	$('.hapus').click(function(e){
	e.preventDefault();
    var link = $(this).attr("href");
		Swal.fire({
			title: "Data yang dihapus tidak dapat dikembalikan",
			text: "Apakah anda setuju?",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#d33",
			cancelButtonColor: "silver",
			confirmButtonText: "Ya, Hapus",
			cancelButtonText: "Batal",
		}).then((result) => {
			if (result.isConfirmed) {
			window.location = link;
			}
		});
	})

// =========================================================================================================//

	

// =========================================================================================================//

})
