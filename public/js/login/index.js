$('#acceder').on('click',function(){
    $.ajax({
        url:BASE_URL +'acceder',
        method:'post',
        dataType:'json',
        data:{
            username:$('#username').val(),
            password:$('#password').val(),
            _token:$('input[name=_token]').val()
        }
    }).done(function(result){
        if(result.status > 0)
            {
                window.location.href = BASE_URL +'agenda';
                return false;
            }
            toastr.warning(result.msn, 'Advertencia');
    });
});