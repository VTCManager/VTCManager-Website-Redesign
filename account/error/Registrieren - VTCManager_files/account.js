$('#password').keyup(function(e) {
    var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
    var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
	
    var enoughRegex = new RegExp("(?=.{5,}).*", "g");
    if (false == enoughRegex.test($(this).val())) {
        $('#pwstrength').css({ 'color': "black" });
        $('#pwstrength').html('Passwort zu kurz! (min.5 Zeichen)');
		$('#submitbtn').prop('disabled', true);
    } else if (strongRegex.test($(this).val())) {
        $('#pwstrength').css({ 'color': "green" });
        $('#pwstrength').html('Passwort ist sicher!');
		$('#submitbtn').prop('disabled', false);
    } else if (mediumRegex.test($(this).val())) {
        $('#pwstrength').css({ 'color': "red" });
        $('#pwstrength').html('Mach dein Passwort mit Zahlen, Sonderzeichen & Großbuchstaben sicher!');
		$('#submitbtn').prop('disabled', true);
    } else {
        $('#pwstrength').css({ 'color': "red" });
        $('#pwstrength').html('Passwort ist unsicher');
		$('#submitbtn').prop('disabled', true);
    }
    return true;
});
$('#email').keyup(function(e)
{
    var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if ($(this).val().match(re)){
		$('#emailinfo').html('');
	}else {
		$('#emailinfo').css({ 'color': "red" });
		$('#emailinfo').html('Email ungültig');
    };
});

