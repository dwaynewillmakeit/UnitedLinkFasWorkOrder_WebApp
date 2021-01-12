@extends('layouts.main')

@section('main-content')


   <div class="card">
     <h1 class="card-header bg-cb">Users</h1>
        <div class="card-body">
          <div class="d-sm-flex align-items-center mb-4">
            <div class="ml-auto text-center mr-5">
              <button href="#" data-toggle="modal" data-target="#addUserModal" class="btn btn-success   mb-3 mb-sm-0 btn-circle ">
                <i class="fas fa-plus fa-10x" style="font-size:2rem"></i>

              </button>
             <p class="font-weight-bolder">Add User</p>

            </div>
          </div>
          <div class="table-responsive border rounded p-1">
            <table class="table mDataTable">
              <thead class="bg-navy">
                <tr>
                  <th class="font-weight-bold">Name</th>
                  {{-- <th class="font-weight-bold">Username</th> --}}
                  <th class="font-weight-bold">Email</th>
                  {{-- <th class="font-weight-bold">Role</th> --}}
                  <th class="font-weight-bold">CB Rep</th>
                  {{-- <th class="font-weight-bold">Account Status</th> --}}
                  <th class="font-weight-bold">Created By</th>
                  <th class="font-weight-bold">Date Creatded</th>
                  <th class="font-weight-bold">Modified By</th>
                  <th class="font-weight-bold">Date Modified</th>

                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                <tr>
                  <td>{{$user->name}} </td>
                  {{-- <td>{{$user->username}}</td> --}}
                  <td>{{$user->email}}</td>
                  {{-- <td>
                    @if (count($user->roles)>0)
                    <span class="font-weight-bolder">{{$user->roles()->first()->name}}</span>
                    @else
                    NOT ASSIGNED
                    @endif
                      {{-- {{$user->roles()->first()}}
                      @foreach ($user->roles as $role)
                          <span class="font-weight-bolder">{{$role->name}}</span>
                      @endforeach

                  </td> --}}
                  <td>
                    {{-- @if ($user->is_cb_farm_rep)
                       <span class="text-success font-weight-bolder"> YES</span>
                    @else
                        NO
                    @endif --}}
                  </td>
                  {{-- <td>
                    @if ($user->active)
                       <span class="font-weight-bolder"> Active</span>
                    @else
                        Inactive
                    @endif
                  </td> --}}
                  <td>{{$user->created_by}}</td>
                  <td>{{date('M d, Y h:m:a',strtotime($user->created_at))}}</td>
                  <td>{{$user->updated_by}}</td>
                  <td>{{date('M d, Y  h:m:a',strtotime($user->updated_at))}}</td>
                  <td><a  href="#"class="btn btn-primary btn-xs" data-target="#editUserModal" data-toggle="modal"  onclick="populateEditModal('{{$user->toJson()}}')">Edit</a>
                  {{-- onclick="populateEditModal('{{$user}}')" --}}

                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
          </div>

        </div>
    </div>

    @include('users.modals.add-user')
    @include('users.modals.edit-user')


@endsection

@section('scripts')

{{-- @include('partials._datatable-scripts') --}}

<script>
  let btnEditUser = document.querySelector('#editUserModal-userID');
  let inputEditName = document.querySelector('#editUserModal-name');
  let inputEditUsername = document.querySelector('#editUserModal-username');
  let inputEditEmail = document.querySelector('#editUserModal-email');
  let inputEditUID = document.querySelector('#editUserModal-userID');

  function populateEditModal(userInfo)
  {
    let user = JSON.parse(userInfo);

    inputEditName.value = user.name;
    inputEditUsername.value = user.username;
    inputEditEmail.value = user.email;
    inputEditUID.value = user.id;

    // const selectRole = document.querySelector('#selectRole');
    // const selectOptions = selectRole.options;
    // const chxboxCbRep = document.querySelector("#cbRep");


    for(i = 0; i<selectAccountStatus.options.length; i++)
    {
        if(selectAccountStatus.options[i].value==user.active)
        {
            selectAccountStatus.options[i].selected = true;
        }

    }


  }
</script>

@endsection
