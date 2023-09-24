document.getElementById('iconChangeImage').addEventListener('click', function(){
	document.getElementById('profileimageFld').click();
})
document.getElementById("profileimageFld").onchange = function() {
    document.getElementById("updateImgForm").submit();
};
document.getElementById("iconDeleteImage").onclick = function() {
	document.getElementById("deleteImgForm").submit();
}