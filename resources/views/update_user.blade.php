<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<form action="{{route('user_update',$users['id'])}}" method="post" id="updateUser">
    <div class="form-control">
        <input type="hidden" id="id" name="id" value="{{$users['id']}}">
    <div class="mb-3">
        <label  class="form-label">Name</label>
        <input type="text" class="form-control" id="up_name" name="up_name" value="{{$users['name']}}">
    </div>
    <div class="mb-3">
        <label  class="form-label">Surname</label>
        <input type="text" class="form-control" id="up_surname" name="up_surname" value="{{$users['surname']}}">
    </div>
    <div class="mb-3">
        <label  class="form-label">Email</label>
        <input type="email" class="form-control" id="up_email" name="up_email" value="{{$users['email']}}">
    </div>
    <div class="mb-3">
        <label  class="form-label">Phone</label>
        <input type="text" class="form-control" id="up_phone" name="up_phone" value="{{$users['phone']}}">
    </div>
    <button type="submit" class="btn btn-primary">Update User</button>
    </div>
</form>



<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
        crossorigin="anonymous"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
</script>

<script>
    $(document).ready(function () {
        $(document).on("click", ".updateUser", function (e) {
            let up_name = $('#up_name').val()
            let up_surname = $('#up_surname').val()
            let up_email = $('#up_email').val()
            let up_phone = $('#up_phone').val()


            $.ajax({
                url: {{route('user_update',$users['id'])}},
                method: 'post',
                data: {up_name: up_name, up_surname: up_surname, up_email: up_email, up_phone: up_phone},
                success: function (res) {

                }, error: function (err) {
                    let error = err.responseJson;
                    $.each(error.erros, function (index, value) {
                        $('.errMsgContainer').append('<span class="text-danger">' + value + '</span>' + '<br>')
                    })
                }

            })
        })
    });
</script>

</body>
</html>
