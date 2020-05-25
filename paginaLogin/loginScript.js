$(document).ready(function(){
    $('.login-info-box').fadeOut();
    $('.login-show').addClass('show-log-panel');
    $('.login-reg-panel input[type="radio"]').on('change', function() {
        if($('#log-login-show').is(':checked')) {
            $('.register-info-box').fadeOut(); 
            $('.login-info-box').fadeIn();
            
            $('.white-panel').addClass('right-log'); 
            $('.white-panel').addClass('down-log'); 
            

            $('.register-show').addClass('show-log-panel');
            $('.login-show').removeClass('show-log-panel');
            
        }
        else if($('#log-reg-show').is(':checked')) {
            $('.register-info-box').fadeIn();
            $('.login-info-box').fadeOut();
            
            $('.white-panel').removeClass('right-log');
            $('.white-panel').removeClass('down-log');
            
            $('.login-show').addClass('show-log-panel');
            $('.register-show').removeClass('show-log-panel');
        }
    });

    $('#regioni > option').each(function(){
        $(this).addClass('select-items');
    });

    $('#first_pass, #confirm_pass').on('keyup', function(){
        var pass1 = $('#first_pass').val();
        var pass2 = $('#confirm_pass').val();
        if(pass1 == pass2){
            $('.register-show input[type="password"]').css('border', '1px solid green');
            $('.register-show input[type="password"]').css('border', '1px solid green');
        }
        else{
            $('.register-show input[type="password"]').css('border', '1px solid red');
            $('.register-show input[type="password"]').css('border', '1px solid red');
        }
    }); 
    $('#error_email').hide();
    $('#error_password').hide();
});

function validaRegistrazione(){
    var pass1 = $('#first_pass').val();
    var pass2 = $('#confirm_pass').val();
    if(pass1 != pass2){
        alert("Errore: le password non coincidono");
        return false;
    }
    return true;
};
    