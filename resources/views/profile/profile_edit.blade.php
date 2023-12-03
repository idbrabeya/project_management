@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Change Your Profile Name</h5>
                <div class="card-body">
                   @if ( session('success') )
                   <div class="alert alert-success">
                    {{ session('success') }}
                   </div>
                   @endif
                    <form method="post" action="{{ route('profile.info.change')}}">
                        @csrf
                        <div class="mb-3">
                          <label for="" class="form-label">Your Name</label>
                          <input type="text" class="form-control" name="name" id="" value="{{ Auth()->user()->name }}">
                          @if($errors->has('name'))
                          <span class="text-danger">
                            {{$errors->first('name')}}
                          </span>
                           @endif
                        </div>
                      
                        <button type="submit" class="btn btn-info" id="">Name Update</button>
                      </form>
                </div>
              </div>
              <div class="card mt-3">
                <h5 class="card-header">Change Your Profile Photos</h5>
                <div class="card-body">
                   @if ( session('success_photo') )
                   <div class="alert alert-success">
                    {{ session('success_photo') }}
                   </div>
                   @endif
                    <form method="post" action="{{ route('profile.photo.change') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                          <div class="upload-options">
                              <label title="Upload Photo" class="form-label">Your Photo </label><br>
                                <img style="height: 100px" src="{{asset('dashboard/assets/images').'/'.Auth::user()->profile_photo}}" alt="">  
                          </div>
                       </div>
                        <div class="mb-2">
                                <label title="Upload Photo" class="form-label">Your Photo </label>
                                    <input type="file" class="image-upload form-control"
                                        name="new_photo" accept="image/*"/>
                                        @if($errors->has('new_photo'))
                                        <span class="text-danger">
                                          {{$errors->first('new_photo')}}
                                        </span>
                                         @endif
                         </div>
                        
                        <button type="submit" class="btn btn-info" id="">Photo Change</button>
                      </form>
                </div>
              </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Change Password</h5>
                <div class="card-body">
                    @if ( session('success_pass') )
                    <div class="alert alert-success">
                     {{ session('success_pass') }}
                    </div>
                    @endif
                    <form method="post" action="{{ route('profile.change.password') }}" id="">
                        @csrf
                        <div class="mb-3">
                          <label for="" class="form-label">Your Old Password</label>
                          <input type="password" class="form-control" value="" name="old_password">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">New Password</label>
                            <input type="password" class="form-control" name="new_password">
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label"> Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password">
                          </div>
                        <button type="submit" class="btn btn-info" id="">Password Update</button>
                      </form>
                </div>
              </div>
        </div>
    </div>
    
</div>
@endsection
