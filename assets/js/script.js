$(document).ready(function () {
	$("input").click(function () {
		$("#alert").addClass("d-none");
	});

	// manipulasi text pada input file gambar bootstrap
	$(".custom-file-input").on("change", function () {
		let fileName = $(this).val().split("\\").pop();
		$(this).next(".custom-file-label").addClass("selected").html(fileName);
	});

	// alert
	$sukses = $(".swalDefaultSuccess").attr("data-id");
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
		}
	});
});
