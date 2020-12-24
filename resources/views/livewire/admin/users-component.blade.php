<div>
    <div class="card">
        <div class="card-header">
            <h5>Users Manage</h5>
        </div>
        <div class="card-block">
            <div class="table-responsive dt-responsive">
                <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $data)
                          <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->user_type }}</td>
                            <td>
                                <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#edit_modalBox"
                                wire:click="setData({{ $data->id }})">Edit</button>
                                <button class="btn btn-danger btn-round" wire:click="deleteData({{ $data->id }})">Delete</button>
                            </td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


      {{-- edit Modal --}}
      <div wire:ignore.self class="modal fade" id="edit_modalBox" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Create</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form wire:submit.prevent="updateData()" >
              <div class="modal-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" wire:model.lazy="name" class="form-control" id="name">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                  </div>
                   <div class="form-group">
                    <label for="user_type">Give Role</label>
                    <select name="user_type" wire:model.lazy="user_type" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="vendor">Vendor</option>
                    </select>
                    @error('user_type') <span class="error">{{ $message }}</span> @enderror
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <script>
         Livewire.on('done',  (type,msg) =>{
               $('#edit_modalBox').modal('hide');
              type=="success"?toastr.success(msg, 'Success!'):toastr.error(msg, 'Fail!')

          });
        </script>




</div>
