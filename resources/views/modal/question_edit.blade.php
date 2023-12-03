
<div class="modal fade" id="questioneditmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <form action="" method="post">
       @csrf
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="todomodal">Question Edit</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <input type="hidden" id="id" name="id">
            <div class="mb-3">
              <label for="" class="form-label">Title <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="edit_question" value="" id="edit_question">
              <span class="text-danger"></span>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Group</label>
                 <select name="edit_group" id="edit_group" class="form-control form-select" >
                <option value="" selected>Select Please</option>
                 @foreach (App\Models\Group::all() as $group_name)
                  <option value="{{$group_name->id}}" >{{$group_name->name}}</option>
                 @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="" onclick="question_update()">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
</form>
</div>

