@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <a href="{{route('teacher.dashboard')}}" class="btn btn-dark btn-sm">Back</a>
            <div class="card">
                <div class="card-header">{{ __('Student Question') }}</div>

                <div class="card-body">
                   <ul>
                     <li> {{$q->question}}</li>
                   </ul>
                </div>
                <div class="card-header">{{ __('Teacher Question') }}</div>
                <div class="card-body">
                  <ul>
                    @foreach($q->comments as $feedback)
                     <li>{{$feedback->body}}</li>
                     @endforeach
                   </ul>
                </div>
            </div>
            <div class="card">
              <div class="card-body">
                <form action="{{ route('feedback.store') }}" method="post">
                  @csrf

                  <input type="hidden" name="question_id" value="{{$q->id}}">
                  <div class="form-group">
                    <label for="">Feed Back</label>
                    <textarea name="body" placeholder="enter you feed back here ..." class="form-control" id="" cols="30" rows="10"></textarea>
                  </div>
                  <button class="btn btn-sm btn-dark btn-block">Feed Back</button>
                </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
