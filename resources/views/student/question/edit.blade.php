@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                  <a href="{{ route('dashboard') }}" class="btn btn-sm btn-dark">Back</a>
                </div>

                <div class="card-body">
                  <form action="{{ route('question.update', $question->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                      <div class="form-group">
                          <label for="">Quertion</label>
                          <textarea placeholder="Enter Your Question .. " name="question" class="form-control" id="" cols="30" rows="10">
                            {{$question->question}}
                          </textarea>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
