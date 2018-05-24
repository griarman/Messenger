$(document).ready(function(){
    let first_friend = $('.friends:first-of-type');
    let $friends = $('.friends');
    first_friend.attr('class','friends checked');
    $friends.click(function(){
        $('.friends').attr('class','friends');
        $(this).attr('class','friends checked');

    });
    first_friend.click(getMessage);
    first_friend.trigger('click');
    first_friend.off('click');

    $friends.click(getMessage);
    function getMessage(){
        $('.friends').attr('class','friends');
        $(this).attr('class','friends checked');
        let userName = $(this).html();
        $.ajax({
            url: 'getMessages.php',
            method: 'POST',
            dataType: 'json',
            data:{
                userName: userName
            },
            success:function (data) {
                console.log(data);
                let field = $('#messageFirst');
                field.empty();
                let count = Object.keys(data).length;
                let sec;
                let userName = $('.checked').html();
                for(let i = 0; i < count; i++){
                    if(data[i].senderId === userName){
                        sec = $(`<section class="left" title="${data[i].date}">${data[i].message}</section>`);
                    }
                    else if(data[i].getterId === userName){
                        sec = $(`<section class="right" title="${data[i].date}">${data[i].message}</section>`);
                    }
                    field.append(sec);
                }
            }
        });
    }


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
    // setInterval(getMessage,1000);

});