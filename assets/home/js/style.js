$('#navbar-brand').hide();
$('#navbar-brand-2').show();
$(function () { 
    $(window).scroll(function () {
        if ($(this).scrollTop() > 150) { 
            $('#navbar-brand-2').hide();
            $('#navbar-brand').show();
        }else{
            $('#navbar-brand-2').show();
            $('#navbar-brand').hide();
        }
    })
});