$(document).ready(function(){
    let first_friend = $('.friends:first-of-type');
    let $friends = $('.friends');
    first_friend.attr('class','friends checked');
    $friends.click(function(){
        $('.friends').attr('class','friends');
        $(this).attr('class','friends checked');

    });
    $friends.click(function(){
       let userName = $(this).html();
       $.ajax({
           url: 'getMessages.php',
           method: 'POST',
           data:{
               userName: userName
           },
           success:function () {

           }

       });
    });
    $('#send').click(function () {
       let message = $('#sms').val().trim();
       if(!message){
           return;

       }
       let userName = $('.checked').html();

       $.ajax({
           url: 'addMessage.php',
           method: 'POST',
           data:{
               message: message,
               username:userName
           },
           success:function () {
               $('#sms').val('');
           }

       });

    });

});