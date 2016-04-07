$(document).ready(function () {
    $(document).on("click", "#delete", function () {
        var url = $("input[name='url']").val();
        var selected = new Array();
        $("input:checkbox[name='status']:checked").each(function () {
            selected.push($(this).val());
        });
        $.ajax({
            url:url,
            type:'post',
            dataType:'json',
            data:{
                data:selected
            },
            success:function(data){
                alert(data.message);
                window.location = "http://localhost/dev/mk/delete.html";
            }
        })
    });
});