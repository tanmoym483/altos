$(function () {
	// alert("ok");
});

function ajax_bdo_status_change(userId, status) {
	$.ajax({
		url: base_url + "users/userRegistrationStatusUpdate",
		method: "POST",
		data: {
			userId: userId,
			status: status,
		},
		success: function (data) {
			console.log("data", data);
			window.location.reload();
		},
		error: function (error) {
			console.log("error", error);
		},
	});
}


function intrFunction() {
	var sopnsercode = $("#sopnsercode").val();

	$.ajax({
		url: base_url + "users/introcode" + '/' + sopnsercode,
		type: "GET",
		success: function (response) {
			const arrayValue = JSON.parse(response)
			console.log('==========', arrayValue[0].leftChild)
			if (arrayValue[0].leftChild !== null) {
				$("#leftval").hide()
				console.log('left')
			}
			 if(arrayValue[0].rightChild !== null){
				$("#rightval").hide()
				console.log('right')
			}
			if(arrayValue[0].rightChild == null || arrayValue[0].leftChild == null){
				$("#sideValue").show()
			}
			
			if (arrayValue[0].role != "superAdmin") {
				$("#sideValue").show()
			} else {
				$("#sideValue").hide()
			}
			if (arrayValue.length == 0) {
				console.log("error part")
				$('#SponsorName').val('').prop("readonly", false);


				$('#errorMessage').html(`<div class="alert alert-danger">Sponser Code  Not Found</div>`)
			} else {
				var sponser=JSON.parse(response)[0];
				var membarName = sponser.firstName + sponser.lastName;
                
				$('#SponsorName').val(membarName).prop("readonly", true);
				$('#errorMessage').html('')
				$("#parentId").val(sponser.id)


			}
		},
		error: function (data) {
			$('#name').val('')
			$('#errorMessage').html(`<div class="alert alert-danger">Sponser Code  Not Found</div>`)

		}
	});
}

function registerOn() {
	var bdoregisterId = $("#bdoregisterId").val();
	$.ajax({
		url: base_url + "users/introcode" + '/' + bdoregisterId,
		type: "GET",
		success: function (response) {
			console.log('++++++', JSON.parse(response))
			const arrayValue = JSON.parse(response)
			console.log(arrayValue.length)
			if (arrayValue.length == 0) {
				console.log("error part")
				$('#name').val(membarName).prop("readonly", false);
				$('#mobile').val("").prop("readonly", false);
				$('#email').val("").prop("readonly", false);
				$('#District').val("").prop("readonly", false);

				$('#errorMessage').html(`<div class="alert alert-danger">BDO RegistionId Not Found</div>`)
			} else {
				var membarName = JSON.parse(response)[0].firstName + JSON.parse(response)[0].lastName;
                console.log('membar name',membarName)
				$('#name').val(membarName).prop("readonly", true);
				$('#errorMessage').html('')
				$('#mobile').val(JSON.parse(response)[0].phone).prop("readonly", true);
				$('#errorMessage').html('')
				$('#email').val(JSON.parse(response)[0].email).prop("readonly", true);
				$('#errorMessage').html('')
				$('#District').val(JSON.parse(response)[0].city).prop("readonly", true);
				$('#errorMessage').html('')
				$('#userId').val(JSON.parse(response)[0].id).prop("readonly", true);
				$('#errorMessage').html('')
				$('#pincode').val(JSON.parse(response)[0].postcode).prop("readonly", true);
				$('#errorMessage').html('')

				$('#states').val(JSON.parse(response)[0].state).prop("readonly", true);
				$('#errorMessage').html('')
			}
		},
		error: function (data) {
			$('#name').val('')
			$('#errorMessage').html(`<div class="alert alert-danger">BDO RegistionId Not Found</div>`)

		}
	});
}