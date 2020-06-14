function confirmCity() {
	var selectedCountry = $("[name='citySelect']").children("option:selected").val();
	alert(window.location.href + "index.php/checkResult");
}
