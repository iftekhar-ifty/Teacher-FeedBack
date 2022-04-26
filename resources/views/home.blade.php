@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Teacher Dashboard') }}</div>

                <div class="card-body">
                    <table class="table table-hover table-sm">
                           <tr>
                               <th>SL</th>
                               <th>Student Name</th>
                               <th>Question</th>
                               <th>Status</th>
                               <th>Action</th>
                           </tr>
                           @foreach($questions as $key => $question)
                           <tr id="product_id_{{$question->id}}">
                               <td>{{$key+1}}</td>
                               <td>{{$question->student->name ?? 'N/A'}}</td>
                               <td>{{$question->question}}</td>
                               <td>
                                   @if($question->status == 1)
                                        <span class="badge bg-danger">Not Answered</span>
                                   @else
                                        <span class="badge bg-primary">Answered</span>
                                   @endif
                               </td>
                               <td>
                                   <a href="{{ route('create', $question->id) }}" class="btn btn-sm btn-primary">view</a>
                               </td>
                           </tr>
                           @endforeach
                       </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
