$(document).ready(function(){
    $('#profile-form').submit(function(event){
        event.preventDefault();

        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var mobile_number = $('#mobile_number').val();
        var country = $('#country').val();
        var state = $('#state').val();
        $.ajax({
            url: 'http://localhost/guvi-r2/php/profile.php',
            type:'POST',
            data:{
                "firstname": firstname,
                "lastname": lastname,
                "mobile_number":mobile_number,
                "country":country,
                "state":state
            },
            success: function(response){
                console.log(response);
            },
            error: function(){
                $('#message').text("An error occured while processing.");
            }
        });
    });
});