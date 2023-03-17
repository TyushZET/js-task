<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Users</title>
</head>
<body>
<div class="container mt-3">
    <h2>Users</h2>
    <a class="btn btn-success my-3" data-bs-toggle="modal" data-bs-target="#addModal">Add User</a>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($user as $users)
            <tr>
                <td>{{$users['name']}}</td>
                <td>{{$users['surname']}}</td>
                <td>{{$users['email']}}</td>
                <td>{{$users['phone']}}</td>

                <td>
                    <a href="{{route('user_edit',$users['id'])}}">
                        <button class="btn btn-info">Edit</button>
                    </a>
                </td>

                <td>
                    <a href=""
                       class="btn btn-danger delete_user"
                       data-id="{{$users['id']}}"
                    >
                        <button class="btn btn-danger">Delete</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@include('user_modal')


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
        $(document).on("click", ".add_user", function (e) {
            e.preventDefault();
            let name = $('#name').val()
            let surname = $('#surname').val()
            let email = $('#email').val()
            let phone = $('#phone').val()

            $.ajax({
                url: "/api/users/add",
                method: 'post',
                data: {name: name, surname: surname, email: email, phone: phone},
                success: function (res) {
                    if (res.status == 'success') {
                        $('#addModal').modal('hide');
                        $('#addUser')[0].reset();
                        $('.table').load(location.href + ' .table');
                    }
                }, error: function (err) {
                    let error = err.responseJson;
                    $.each(error.errors, function (index, value) {
                        $('.errMsgContainer').append('<span class="text-danger">' + value + '</span>' + '<br>')
                    })
                }

            })
        })
    });

    // Delete user
    $(document).ready(function () {
        $(document).on("click", ".delete_user", function (e) {
            e.preventDefault();
            let id = $(this).data('id');
            if (confirm('Are you sure to delete user ??')) {
                $.ajax({
                    url: '/api/users/delete/{id}',
                    method: 'post',
                    data: {id: id},
                    success: function (res) {
                        if (res.status == 'success') {
                            $('.table').load(location.href + ' .table');
                        }
                    }
                })
            }
        })
    });
</script>

</body>
</html>
