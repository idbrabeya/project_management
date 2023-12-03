
<div class="modal fade" id="employeeeditmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <form action="{{route('employee.update')}}" method="post">
       @csrf
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="todomodal">Edit Employee</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <input type="hidden" id="id" name="id">
            <div class="mb-3">
              <label for="" class="form-label">Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" name="edit_name" id="edit_name" value="">
            </div>
            <span class="text-danger" id="emp_name"></span>

            <div class="mb-3">
              <label for="" class="form-label">Email <span class="text-danger">*</span></label>
              <input type="email" class="form-control" name="edit_email"  value="">
              <span class="text-danger"></span>
            </div>

            <div class=" mb-3">
              <label for="password" class="form-label ">{{ __('Password') }} <span class="text-danger">*</span></label>
              <input type="password" class="form-control" name="edit_password" id="edit_password" value="">
              <span class="text-danger" id="vali_pass"></span>

          </div>

            <div class="mb-3">
                <label for="" class="form-label">Designation</label>
                 <select name="edit_designation" id="edit_designation" class="form-control form-select" >
                  <option value="">Select Please</option>
                  <option value="Software Engineer">Software Engineer</option>
                  <option value="Sr. Software Engineer">Sr. Software Engineer</option>
                  <option value="Executive Officer">Chief Executive Officer</option>
                  <option value="Technology Officer">Chief Technology Officer</option>
                  <option value="Project Manager">Project Manager</option>
                  <option value="Sr. Backend Developer">Sr. Backend Developer</option>
                  <option value="Backend Developer">Backend Developer</option>
                  <option value="Sr. Frontend Developer">Sr. Frontend Developer</option>
                  <option value="Frontend Developer">Frontend Developer</option>
                  <option value="Intern">Intern</option>
                </select>
                <span class="text-danger" id="emp_designtion"></span>
                </div>
              <div class="mb-3">
                <label for="" class="form-label">Phone</label>
                <input type="text" class="form-control" name="edit_phone" id="edit_phone" value="">
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Gender</label>
                <select name="gender" class="form-control form-select" value="" >
                    <option value="">Please Selected</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
              </div>
             <div class="mb-3">
                <div class="upload-options">
                    <label title="Upload Photo">
                        <input type="file" class="image-upload"
                            name="cv_picture" accept="image/*" />
                    </label>
                </div>
             </div>

        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="" onclick="emplyee_updates()">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>

    </div>
</form>
</div>

