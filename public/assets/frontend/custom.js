$(document).ready(function(){
   // const alert = document.getElementsByClassName(alert);
    setTimeout(function() {
        $('.alert').fadeOut('slow', function() {
            $(this).remove();
        });
    }, 3000);
});