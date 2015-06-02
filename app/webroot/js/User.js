/**
 * Created by Kudo Shinichi on 5/27/2015.
 */
var User = {
    addUser:function(myself){

        that = this;
        var form = $('#admin_adduser')[0];
        formData = new FormData(form);
        $.ajax({
            url:'/Web/signup',
            data:formData,
            type:'POST',
            contentType: false,
            processData: false,
            beforeSend:function(){
                $(myself).button('loading');
            },
            success:function(result){
                console.log(result);
                if(result.error == 1){
                    $(myself).button('reset');
                }
                $(myself).button('reset');

                $('#createUserAdmin').modal('hide')
                $('#admin_adduser')[0].reset();
            },
            error:function(result){
                $('#admin_content').html(result.responseText);
            }
        })
    }
}