@extends('layouts.app')
@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">Home </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="">Question</a></li>

    </ol>
  </div> 
@endsection
@section('content')
<div class="container">
  {{-- <div class="row">
    <div class="col-md-12 justify-content-end d-flex">
        <div class="mr-2 mb-3">
            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#questionmodal">Question Create</a>
        </div>
        <div class=" mb-3">
            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#questionmodal">Group Create</a>
        </div>
    </div>
</div> --}}
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">create</div>
        <div class="card-body">
            <form class="form-horizontal" action="{{route('question_insert')}}" method="post">
                @csrf
                <fieldset>
                <!-- Text input-->
                <div id="items" class="form-group">
                  <label class="col-md-12 control-label" for="textinput">Title</label>
                <div class="col-md-12 margin-bottom">
                  <input id="textinput" name="ques[]" type="text" placeholder="Enter question title" class="form-control">
                
                </div>
                </div>
                <div class="form-group">
                  <label class="col-md-12 control-label" for="">Group Name</label>
                <div class="col-md-12 margin-bottom">
                  <select name="group_id" class="form-select form-control" value="" >
                    <option value="">Please Selected</option>
                    @foreach (App\Models\Group::all() as $group_name)
                    <option value="{{$group_name->id}}">{{$group_name->name}}</option>
                    @endforeach
                    
                </select>
              </div>
                </div>
                
                </fieldset>
                <button class="btn btn-info btn-sm mb-2" type="submit">submit</button>
                </form>
                
                  <button id="add" class="btn add-more button-yellow uppercase" type="button">+ Add ques</button> <button class="delete btn button-white uppercase">- Remove</button>
              
        </div>
       
      </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                   <h5>Create Group</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('group.create')}}" method="post">
                        @csrf
                        <!-- Text input-->
                        <div class="form-group">
                        <label class="col-md-12 control-label" for="textinput">Group Name</label>
                        <div class="col-md-12 margin-bottom">
                          <input name="group_name" type="text" placeholder="Enter group name" class="form-control">
                          @if($errors->has('group_name'))
                          <span class="text-danger">
                            {{$errors->first('group_name')}}
                          </span>
                           @endif
                        </div>
                        
                        </div>
                        <button class="btn btn-info btn-sm mb-2" type="submit">Save</button>
                        </form>
                </div>
            </div>
        </div>
  
    </div>
  </div>
 
@endsection
@section('scripts')
    <script>
  $(document).ready(function() {
  $(".delete").hide();
  //when the Add Field button is clicked
  $("#add").click(function(e) {
    $(".delete").fadeIn("1500");
    //Append a new row of code to the "#items" div
    $("#items").append(
      '<div class="next-referral col-12 mt-2"><input id="textinput" name="ques[]" type="text" placeholder="Enter question tital" class="form-control"></div>'
    );
  });
  $("body").on("click", ".delete", function(e) {
    $(".next-referral").last().remove();
  });
});
  </script>
@endsection