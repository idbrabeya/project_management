@extends('layouts.app')
@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">Home </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">question_list</a></li>
    </ol>
  </div>
@endsection
@section('content')
<div class="container ">
    <div class="row mt-4">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-info ">
                <h4>Question List</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th >ID</th>
                      <th >Group</th>
                      <th >Title</th>
                      <th >Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($question_lists as $question_list)
                    <tr>
                        <td>{{$question_list->id}}</td>
                        <td>{{$question_list->grouptorelation->name}}</td>
                        <td>{{$question_list->question}}</td>
                   <td>
                  <a href="" class="btn btn-success btn-sm" data-toggle="modal" data-target="#questioneditmodal" onclick="question_edit('{{$question_list->id}}')"><i class="fa-solid fa-pen-to-square"></i></a>
                  <button type="button" class="btn btn-danger btn-sm question_delete" data-ques-id="{{$question_list->id}}">
                    <i class="fa-solid fa-trash-can"></i>
                  </button>
                </td>
                    </tr>
                    @empty  
                    <tr>
                        <td colspan="8">
                          <div class="div">
                            <span class="text-danger text-center">user List Emty</span>
                          </div>
                        </td>
                      </tr>
                    @endforelse
                  </tbody>
              </table>
              {{$question_lists->links()}}
            </div>
        </div>
        </div>
    </div>
</div>
@include('modal.question_edit')
@endsection
@section('scripts')
{{-- question delete ajax --}}
  <script>
    $(document).ready(function () {
      $('.question_delete').click(function(el) {
        el.preventDefault();
        var Id = $(this).data('ques-id');
        $.ajax({
          headers: {
                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                     },
          type: 'GET',
          url: '/question/list/delete/' + Id,
          success: function (response) {
            if(response.success===200){
              // toastr.success('Question deleted successfully');
              location.reload();
              }else{
                toastr.error('Question deletion was not successful');
              }
          },
          error:function(error){
            console.log('error');
          }
        });
        
      })
    });
    </script>
    {{-- question edit and update --}}
    <script>
      function question_edit(id) {
        var id;
       $.ajax({
        headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        type: 'get',
        url: '{{ route('question.edit', '') }}/' + id,

          success: function (response) {
            console.log(response);
          $('#id').val(response.id);
          $('#edit_question').val (response.question);
          $('#edit_group').val (response.group_id);
          $('#questioneditmodal').modal('show');
        },
        error: function(error){
          console.log(error);
        }
       });
      }
      function question_update(){
        var id =$('#id').val();
        var group_id = $('#edit_group').val();
        var edit_question = $('#edit_question').val();
        $.ajax({
          headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
          type: 'post',
          url:  '{{ route('question.update')}}',
          data: {
              id : id,
              group_id : group_id,
              edit_question: edit_question
          },
          success: function (response) {
            if(response.success===200){
              $('#questioneditmodal').modal('hide');
            }
            location.reload();
          },
          error:function(error){
            console.log(error);
          }
        });

      }
    </script>
@endsection