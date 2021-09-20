$(document).ready(function () {
	$("input").click(function () {
		$(".errors").addClass("d-none");
	});

	// manipulasi text pada input file gambar bootstrap
	$(".custom-file-input").on("change", function () {
		let fileName = $(this).val().split("\\").pop();
		$(this).next(".custom-file-label").addClass("selected").html(fileName);
	});

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

	$('.edit').click(function(){
		var data_id = $(this).attr('data-id');

		$.ajax({
			url : 'edit_kandidat',
			type: 'post',
			data: {data_id : data_id},
			success: function (response) {
				var obj = JSON.parse(response);
				console.log(obj);
				$('#nama').val(obj.nama)
				$('#nik').val(obj.nik)
				$('#handphone').val(obj.handphone)
				$('#alamat').val(obj.alamat)
				$('#no_kandidat').val(obj.no_urut)
				$('#id').val(obj.id)
			}
		})
	})

	$('#simpan').click(function () {
		var gambar 		= $('#label_gambar').val().replace(/C:\\fakepath\\/i, '');
		var nama		= $('#nama').val()
		var nik			= $('#nik').val()
		var handphone	= $('#handphone').val()
		var alamat		= $('#alamat').val()
		var no_urut		= $('#no_kandidat').val()
		var id			= $('#id').val()

		$.ajax({
			url : 'proses_edit',
			type: 'post',
			data : {
				id : id,
				gambar : gambar,
				nama : nama,
				nik : nik,
				handphone : handphone,
				alamat : alamat,
				no_urut : no_urut
			},
			success :  function (response) {

				if(response == 'true'){
					$('#modal_kandidat').modal('hide');
				}
			}
		})
	})
});
