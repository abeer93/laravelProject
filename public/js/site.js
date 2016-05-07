$(function () {
    $('.updateComment').click(function () {
//        alert("update");
        var comment_id = $(this).val();
//    alert(comment_id);
        $.get('../comment/' + comment_id, function (data) {
            //success data
//            console.log(data);
            $('#task_id').val(data.id);
            $('#description').val(data.content);
            $('#btn-save').val("update");
            $('#myModal').modal('show');
        })

    });

    $("#btn-save").click(function (e) {
        e.preventDefault();
        var formData = {
            '_token': $('#token').val(),
            description: $('#description').val(),
        }
        var comment_id = $('#task_id').val();
        console.log(formData);
        console.log(comment_id);
        $.ajax
                ({
                    async: true,
                    url: "http://localhost:8000/updateComment/" + comment_id,
                    type: 'POST',
                    data: formData,
                    success: function (data)
                    {
                        // console.log('aaaaaaaaaaaaa');
                        console.log(data);
                        $('#myModal').modal('hide');
                        window.location.href = "http://localhost:8000/singlePost/"+data;
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });

    });







})