function followingFunc(userId, authId, csrf_token){
	var urlPassed = '/following/'+userId;
	$.ajax({
		url: urlPassed,
		method: 'POST',
		data: {
			"userId": userId, 
			"authId": authId,
			"_token": csrf_token
		},
		success: function(result){
			console.log(result);
			if($('#followBtn').text() == 'Follow'){
				$('#followBtn').text("Following");
			}else{
				$('#followBtn').text("Follow");
			}
		}
	})	
}	

if(document.getElementById('iconChangeImage')){
	document.getElementById('iconChangeImage').addEventListener('click', function(){
		document.getElementById('profileimageFld').click();
	})
}
if(document.getElementById("profileimageFld")){
	document.getElementById("profileimageFld").onchange = function() {
	    document.getElementById("updateImgForm").submit();
	};
}

if(document.getElementById("iconDeleteImage")){
	document.getElementById("iconDeleteImage").onclick = function() {
		document.getElementById("deleteImgForm").submit();
	}
}
