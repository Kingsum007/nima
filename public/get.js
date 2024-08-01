$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function () {
    $("#department").change(function () {
        var id = $("#department").val();
        $.ajax({
            url:"/getData",
            method:"post",
            data:{id:id},
            cache:false,
            success: function (data){
                $("#sem").html(data);
            }
        })
    })
    })