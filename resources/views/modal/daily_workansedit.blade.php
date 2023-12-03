<div class="modal fade" id="daily_workedit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <form action="" method="post">
       @csrf
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="daily_workedit">Edit Work Form</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <input type="hidden" id="id" name="id">
           <div class="mb-3">
            <label for="" class="form-label">DailyUpdate Ans <span class="text-danger">*</span></label>
            <textarea value="" name="yesterday" id="yesterday" cols="40" class="form-control" placeholder="Your answer">
          
            </textarea>
            {{-- @if($errors->has('yesterday'))
            <span class="text-danger">
              {{$errors->first('yesterday')}}
            </span>
             @endif --}}
          </div>
         
           
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="" onclick="form_update()">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </form>
  </div>
  
  
    {{-- modal edit show --}}