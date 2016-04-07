$(document).ready(function () {
    $(document).on('click', '#submit', function (e) {
        e.preventDefault();
        
        var yourip = $("#yourip").val();
        var url = $("#ipform").attr("action")+'/'+yourip;
        $.ajax({
            type: 'get',
            url: url,
            dataType: 'json',
            data: {
//                yourip: yourip
            },
            success: function (data) {
                console.log(data);
            }
        });
    });
});

