@extends('layouts.app')
@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">Home </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">home</a></li>
        <li class="breadcrumb-item"><a href="{{route('employee')}}">Employee</a></li>

    </ol>
  </div>
@endsection
@section('content')
    <div class="container ">
        <div class="row mt-4">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header bg-info ">
                    <h4>Employee List</h4>
                    <h6>Total Employee- {{(APP\Models\User::where('role', 1)->count())}}</h6>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th >ID</th>
                          <th > Name</th>
                          <th >Email</th>
                          <th >Designation</th>
                          <th >Phone</th>
                          <th >Gender</th>
                          <th >Image</th>
                          @if (Auth::user()->role==2)
                          <th >Action</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                            @forelse ($user_lists as $user_list)
                            <tr>
                                <td>{{$user_list->id  }}</td>
                                <td>{{ $user_list->name }}</td>
                                <td>{{ $user_list->email }}</td>
                                <td>{{ $user_list->designation }}</td>
                                <td>{{ $user_list->Phone }}</td>
                                <td>{{ $user_list->gender }}</td>
                                <td><img style="height: 50px" src="{{ asset('dashboard/assets/images').'/'.$user_list->profile_photo }}" alt=""></td>
                            @if (Auth::user()->role==2)
                             <td>
                            {{-- <a class="btn btn-primary btn-sm" type="button" data-target="#employeeeditmodal" data-toggle="modal" href="{{ route('employee.edit',$user_list->id) }}"><i class="fa-solid fa-pen-to-square"></i></a> --}}

                            <a href="{{ route('employee.delete', ['id' => $user_list->id]) }}" class="btn btn-danger btn-sm">
                            
                           <div class="text-danger">
                            <i class="fa-solid fa-trash-can"></i>
                           </div>
                          </a></td>
                           @endif
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
                  {{$user_lists->appends(['user_list_deletedItem'=>$user_list_deletedItem->currentPage()])->links()}}
                </div>
            </div>
                @if (Auth::user()->role==2)
                <div class="card mt-5">
                  <div class="card-header bg-danger justify-content-between d-flex">
                      <h4>Trashed List</h4>
                  </div>

                  <div class="card-body">
                    @if (session('error'))
                    <div class="alert alert-danger">
                      {{session('error')}}
                    </div>
                    @endif
                      <table class="table table-bordered" style="width:100%">
                        <thead>
                          <tr>
                            <th >ID</th>
                            <th > Name</th>
                            <th >Email</th>
                            <th >Designation</th>
                            <th >Phone</th>
                            <th >Gender</th>
                            <th >Image</th>
                            <th >Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          
                          @forelse ($user_list_deletedItem as $user_store)
                          <tr>
                              <td>{{$user_store->id  }}</td>
                              <td>{{ $user_store->name }}</td>
                              <td>{{ $user_store->email }}</td>
                              <td>{{ $user_store->designation }}</td>
                              <td>{{ $user_store->Phone }}</td>
                              <td>{{ $user_store->gender }}</td>
                              <td><img style="height: 50px" src="{{ asset('dashboard/assets/images').'/'.$user_store->profile_photo }}" alt=""></td>
                        
                         <td>
                          <a class="btn btn-primary btn-sm" type="button" title="restore" href="{{route('restore.employee',$user_store->id)}}"><i class="fa-solid fa-store"></i></a>
                          <a href="{{ route('delete.employe', ['id' => $user_store->id ]) }}" title="fourch delete" class="btn btn-danger btn-sm">
                            <i class="fa-solid fa-trash-can"></i>
                        </a>
                      </td>
                        
                           </tr>
                           @empty
                           <tr>
                            <td colspan="8">
                              <div class="div">
                                <span class="text-danger text-center">No Data Found</span>
                              </div>
                            </td>
                          </tr>
                          @endforelse
                        </tbody>
                    </table>
                  </div>
              </div>
                  @endif
            </div>
        </div>
    </div>

@endsection
