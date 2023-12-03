@extends('layouts.app')
@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">Home </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
        <li class="breadcrumb-item"><a href="#">Dailywork_list</a></li>

    </ol>
  </div>
@endsection
@section('content')
<div class="container ">
  {{-- filter--}}
  @if (Auth::user()->role==2)
  <div class="">
    <form action="" method="get">
      @csrf
      <div class="row">
          <div class="col-md-2">
              <input type="date" class="form-control" name="start_date">
          </div>
          <div class="col-md-2">
              <input type="date" class ="form-control" name="end_date">
          </div>
          <div class="col-md-2">
              <input type="search" class="form-control" name="fil_name" placeholder="enter name">
          </div>
          <div class="col-md-2">
              <button type="submit" class="btn btn-info" name="search">Filter</button>
          </div>
      </div>
  </form>
  </div>
  @endif

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info justify-content-between d-flex">
                    <h4> Answer List</h4>
                </div>
                <div class="card-body">
                  <form action="{{route('form.multiple.delete')}}" method="post">
                    @csrf
                    <table class="table table-bordered" style="width:100%">
                      <input class="btn btn-danger" type="submit" name="submit" value="Delete All Selected"/>
                         <br><br>
                      <thead>
                        <tr>
                          <th class="text-center"> <input type="checkbox" id="checkAll">Select All</th>
                          <th >ID</th>
                          <th>Employee Name</th>
                          <th>DailyUpdate Ans</th>
                          <th >Submit Date</th>
                          <th >Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        {{-- {{ $form_list_editt}} --}}
                            @forelse ($dailywork_lists as $key=>$dailywork_list)
                            <tr>
                              <td class="text-center">
                                <input name='id[]' type="checkbox" id="checkItem" 
                                value="<?php echo $dailywork_lists[$key]->id;?>"></td>

                                <td>{{( $key+1)+($dailywork_lists->currentPage()-1)*$dailywork_lists->perPage()}}</td>
                                <td>{{$dailywork_list->user->name??''}}</td>
                                <td>{{$dailywork_list->yesterday}}</td>
                                <td>{{$dailywork_list->created_at->format('m/d/Y')}} - {{$dailywork_list->created_at->diffForHumans()}}</td>
                                
                                <td>
                                  <a class="btn btn-primary btn-sm" onclick="work_edit('{{$dailywork_list->id}}')" type="button" id="" name=""><i class="fa-solid fa-pen-to-square"></i></a>
                                  <a href="{{route('form.list.delete',$dailywork_list->id)}}" type="submit"class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">
                                  <div class="div">
                                    <span class="text-danger text-center">form data List Emty</span>
                                  </div>
                                </td>
                              </tr>
                            @endforelse
                      </tbody>
                  </table>
                </form>
                  {{$dailywork_lists->links()}}
                
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @if (Session::has('success_work'))
    <script>
        toastr.success("{{ Session::get('success_work') }}");
    </script>
@endif --}}
@include('modal.daily_workansedit')
@endsection
@section('scripts')
  <script>
    function work_edit(id) {
       var id;
       $.ajax({
        headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        type: 'get',
        url: '/form_list_edit/' +id,

          success: function (response) {
          $('#id').val(response.id);
          $('#yesterday').val(response.yesterday);
          $('#daily_workedit').modal('show');
        },
        error: function(error){
          console.log(error);
        }
       });
    }

    function form_update() {
    var id = $('#id').val();
    var yesterday = $('#yesterday').val();
    
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'post',
        url: 'list/update',
        data: {
            id: id,
            yesterday: yesterday
        },
        success: function (response) {
            if (response.status === 200) {
                $('#daily_workedit').modal('hide');   
            }
            location.reload();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

  </script>
  <script>
    $("#checkAll").click(function () {
				$('input:checkbox').not(this).prop('checked', this.checked);
			});
  </script>
@endsection