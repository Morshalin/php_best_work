$(document).ready(function(){
    $('#subscribeBtn').on('click', function(){
        // Remove previous status message
        $('.status').html('');
		
        // Email and name regex
        var regEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
		
        // Get input values
        var name = $('#name').val();
        var email = $('#email').val();
		
        // Validate input fields
        if(name.trim() == '' ){
            alert('Please enter your name.');
            $('#name').focus();
            return false;
        }else if (!regName.test(name)){
            alert('Please enter a valid name (first & last name).');
            $('#name').focus();
            return false;
        }else if(email.trim() == '' ){
            alert('Please enter your email.');
            $('#email').focus();
            return false;
        }else if(email.trim() != '' && !regEmail.test(email)){
            alert('Please enter a valid email.');
            $('#email').focus();
            return false;
        }else{
            // Post subscription form via Ajax
            $.ajax({
                type:'POST',
                url:'subscription.php',
                dataType: "json",
                data:{subscribe:1,name:name,email:email},
                beforeSend: function () {
                    $('#subscribeBtn').attr("disabled", "disabled");
                    $('.content-frm').css('opacity', '.5');
                },
                success:function(data){
                    if(data.status == 'ok'){
                        $('#subsFrm')[0].reset();
                        $('.status').html('<p class="alert alert-success">'+data.msg+'</p>');
                    }else{
                        $('.status').html('<p class="alert alert-danger">'+data.msg+'</p>');
                    }
                    $('#subscribeBtn').removeAttr("disabled");
                    $('.content-frm').css('opacity', '');
                }
            });
        }
    });
});
