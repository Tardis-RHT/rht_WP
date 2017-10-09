$(document).ready(function($){
    $('#callback').submit(function(){
        var str = $(this).serialize();
        console.log(str);
        $.ajax({
            type:"POST",
            // url:"/tel_form.php",
            data:"str",
            error: function( xhr,err ) {
                console.log( 'Sample of error data:', err );
                console.log("readyState: "+xhr.readyState+"\nstatus: "+xhr.status+"\nresponseText: "+xhr.responseText);
            },
            success: function(data, textStatus, jqXHR){
            if (jqXHR.status == 200){
                resetForm();
                showPopup();
            }
                
                // if (console && console.log) {
                //     console.log( 'Sample of data:', data.slice(0,100) );
                //     console.log('textStatus: ', textStatus);
                //     console.log('jqXHR: ', jqXHR);
                //     console.log('statusText: ', jqXHR.statusText);
                // }
            }            
        });
        return false;
    });
});