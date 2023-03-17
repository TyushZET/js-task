<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <form  action = " " method="POST" id="updateUser">
        @csrf
        <input type="hidden" id="up_id" name="up_id" value="{{$users['id']}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="errMsgContainer">

                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" min="2" class="form-control" name="up_name" id="up_name" required>
                    </div>
                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" name="up_surname" id="up_surname" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="up_email" id="up_email" required>
                    </div>
                    <div class="form-group">
                        <label for="number">Phone</label>
                        <input type="number" min="1" class="form-control" name="up_phone" id="up_phone" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary update_user_form">Update</button>
                </div>
            </div>
        </div>
    </form>
</div>
