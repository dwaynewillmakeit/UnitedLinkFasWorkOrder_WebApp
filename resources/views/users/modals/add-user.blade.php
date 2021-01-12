<div class="modal fade " id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="addUserModalLabel">Add User</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body " >
            <form action="{{route('user.store')}}" method="POST" autocomplete="off">
                {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                        </div>



                       <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" name="email" class="form-control" id="email" placeholder="Email" >
                       </div>

                       <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" name="password" class="form-control" id="password" placeholder="Password" >
                       </div>


                       {{-- <div class="form-group">
                          <label for="">Assign Roles</label>
                          <select class="form-control" id="" name="role">
                            <option value="0">Select Role</option>
                            @foreach ($roles as $role)
                               <option value="{{$role->id}}">{{$role->name}} </option>
                            @endforeach

                          </select>
                      </div> --}}


            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Create User Account</button>
            </div>
          </form>
          </div>
        </div>
      </div>
</div>
