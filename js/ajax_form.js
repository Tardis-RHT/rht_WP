$(document).ready(function($){
    $('#callback').submit(function(){
        var str = $(this).serialize();
        $.ajax({
            type:"POST",
            url:"../tel_form.php",
            data:"str",
            success: function(msg){
                resetForm();
                showPopup();
                console.log(str);
                if(msg == 'OK') {
					console.log('ok');
				}
				else{
				    console.log('not ok');
                }
            }            
        });
        return false;
    });
});