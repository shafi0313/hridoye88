<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">User Update</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.user.update', $user->id) }}" method="post" onsubmit="ajaxStoreModal(event, this, 'editModal')" enctype="multipart/form-data" class="form-horizontal">
            @csrf @method('PUT')
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-sm-6">
                        <div class="form-group">
                            <label for="permission">Permission Level <span class="t_r">*</span></label>
                            <select name="permission" class="form-control">
                                <option value="0" @selected($user->permission == 0)>No Login</option>
                                <option value="1" @selected($user->permission == 1)>Super Admin</option>
                                <option value="2" @selected($user->permission == 2)>Admin</option>
                                <option value="3" @selected($user->permission == 3)>User</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name <span class="t_r">*</span></label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Enter name" required>
                            @if ($errors->has('name'))
                            <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                        @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="designation">Designation </label>
                            <input type="text" name="designation" class="form-control" value="{{ $user->designation }}" placeholder="Designation">
                            @if ($errors->has('designation'))
                                <div class="alert alert-danger">{{ $errors->first('designation') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email address <span class="t_r">*</span></label>
                            <input type="email" name="" class="form-control" value="{{ $user->email }}" placeholder="Enter Email" required>
                            @if ($errors->has('email'))
                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" oninput="this.value = this.value.replace(/[a-zA-z\-*/]/g,'');" class="form-control" value="{{ $user->phone }}" placeholder="Enter phone">
                            @if ($errors->has('phone'))
                                <div class="alert alert-danger">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image">Image </label>
                            <input type="file" name="image" class="form-control">
                            @if ($errors->has('image'))
                                <div class="alert alert-danger">{{ $errors->first('image') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="comment">Address <span class="t_r">*</span></label>
                            <textarea name="address" class="form-control" id="comment" rows="2" required>{{ $user->address }}</textarea>
                            @if ($errors->has('address'))
                                <div class="alert alert-danger">{{ $errors->first('address') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password <span class="t_r">*</span></label>
                            <input type="password" name="password" class="form-control" id="password" autocomplete="new-password">
                            @if ($errors->has('password'))
                                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confirmpassword">Confirm Password <span class="t_r">*</span></label>
                            <input class="form-control" type="password" name="password_confirmation" autocomplete="new-password">
                            @if ($errors->has('password'))
                                <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                    </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
        </form>
      </div>
    </div>
  </div>
