$(document).ready(function () {
    let form1 = $('#form1');
    let form2 = $('#form2');
    $('#reg').click(function(){
        form1.hide();
        form2.show();
    });
    $('#sign').click(function() {
        form2.hide();
        form1.show();
    });
});