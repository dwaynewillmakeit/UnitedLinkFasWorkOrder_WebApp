<div class="modal fade " id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="editUserModalLabel">Edit User</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body " >
            <form action="{{route('user.update')}}" method="POST" autocomplete="off">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" id="editUserModal-userID" value="0">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="editUserModal-name" name="name" placeholder="Enter Name" required>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-12">
                              <label for="editUserModal-userName">Username</label>
                              <input type="text" name="username" class="form-control" id="editUserModal-username" placeholder="Username" required>
                          </div>
                          {{-- <div class="form-group col-md-6">
                              <label for="contactNumber">Contact Number</label>
                              <input type="text" name="contact_number" class="form-control" id="contactNumber" placeholder="Contact Number">
                          </div> --}}
                        </div>

                        <div class="form-group">
                            <div class="row">
                              <div class="col-7">
                                  <label for="cbRep">Technical Field Officer / CB Farm Rep</label>
                              </div>
                              <div class="col-3">
                                  <input type="checkbox" name="cb_farm_rep" id="cbRep"  value="true">
                              </div>
                            </div>
                            
                            
                          </div>
                  
                       

                       <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" name="email" class="form-control" id="editUserModal-email" placeholder="Email" >
                       </div>

                     
                          <div class="form-group">
                              <label for="selectRole">Roles</label>
                              <select class="form-control" id="selectRole" name="role">
                                <option value="0">Select Role</option>
                                {{-- @foreach ($roles as $role)
                                   <option value="{{$role->id}}">{{$role->name}} </option> 
                                @endforeach --}}
                                
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="selectAccountStatus">Account Status</label>
                              <select class="form-control" id="selectAccountStatus" name="acount_status">                            
                                   <option value="0">Inactive</option> 
                                   <option value="1">Active</option> 
                                
                                
                              </select>
                          </div>
                          <div class="form-group">
                            <div class="row">
                              <div class="col-4">
                                  <b><label for="cbRep" class="customRed">Reset Password</label></b>
                              </div>
                              <div class="col-3">
                                  <input type="checkbox" name="reset_password" id="cbRep"  value="true">
                              </div>
                            </div>
                            
                            
                          </div>
                       

                      
                        {{-- <div class="form-group">
                            <label for="email">Role</label>
                            <select name="parish" id="" class="form-control">
                              <option value="">Select Parish</option>
                              <option value="">Admin</option>
                              <option value="">TFO</option>
                              <option value="">Farmer</option>

                            </select>
                         </div> --}}
                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                   
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update User Account</button>
            </div>
          </form>
          </div>
        </div>
      </div>