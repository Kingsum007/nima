$(document).ready(function () {
    $("#department").change(function () {
        var id = $("#department").val();
        $.ajax({
            url: "/getData",
            method: "post",
            data: { _token: "{{ csrf_token() }}", id: id },
          
            cache: false,
            success: function (data) {
                $("#sem").html(data);
            },
        });
    });
});
