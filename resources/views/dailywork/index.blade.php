@extends('layouts.app')
@section('breadcrumb')
<div class="page-title-box">
    <h4 class="page-title">Home </h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Daily Update</a></li>
    </ol>
  </div>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header " style="border-top: 5px solid #0047ab; ">{{ __('DAILY UPDATE') }}</div>

                <div class="card-body">
                  @if (session('success_form'))
                  <div class="alert alert-info">
                    {{session('success_form')}}
                  </div>
                  @endif
                    <form method="post" action="{{route('dailyform')}}">
      
                        @csrf
                        @foreach ($dailyworks_form as $key=>$dailywork_form)
                        <input type="hidden" value="{{$dailywork_form->id}}" name="question_id[]">
                        <div class="mb-3">
                          <label for="" class="form-label">{{$dailywork_form->question}}<span class="text-danger">*</span></label>
                          <textarea name="yesterday[]" id="" cols="40" class="form-control" placeholder="Your answer"></textarea>
                          @if($errors->has('yesterday.*'))
                          <span class="text-danger">
                            {{$errors->first('yesterday.*')}}
                          </span>
                           @endif
                           
                        </div>
                        @endforeach
                        {{-- <div class="mb-3">
                            <label for="" class="form-label">What are you going to do today? <span class="text-danger">*</span></label>
                            <textarea name="today" id="" cols="40" class="form-control" placeholder="Your answer"></textarea>
                            @if($errors->has('today'))
                          <span class="text-danger">
                            {{$errors->first('today')}}
                          </span>
                           @endif
                          </div>
                          <div class="mb-3">
                            <label for="" class="form-label">Do you have any blocking issue? <span class="text-danger">*</span></label>
                            <textarea name="blocking" id="" cols="40" class="form-control" placeholder="Your answer"></textarea>
                            @if($errors->has('blocking'))
                          <span class="text-danger">
                            {{$errors->first('blocking')}}
                          </span>
                           @endif
                          </div> --}}
                          <button type="submit" class="btn btn-sm" style="background: #0047ab; color:#fff" id="">Submit</button>
                      </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
