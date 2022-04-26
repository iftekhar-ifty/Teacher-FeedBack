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
                <div class="card-header">{{ __('Student Dashboard') }}

                    <div class="customBtn text-right">
                        <button class="btn btn-sm btn-dark"  data-toggle="modal" data-target="#exampleModal">Create</button>
                    </div>
                </div>

                <div class="card-body">
                   <div class="table-responsive">
                       <table class="table table-hover table-sm">
                           <tr>
                               <th>SL</th>
                               <th>Question</th>
                               <th>Status</th>
                               <th>Action</th>
                           </tr>
                           @foreach($questions as $key => $question)
                           <tr id="product_id_{{$question->id}}">
                               <td>{{$key+1}}</td>
                               <td>{{$question->question}}</td>
                               <td>
                                   @if($question->status == 1)
                                        <span class="badge bg-danger">Not Answered</span>
                                   @else
                                        <span class="badge bg-primary">Answered</span>
                                   @endif
                               </td>
                               <td>
                                   <a href="{{ route('question.show', $question->id) }}" class="btn btn-sm btn-dark">view</a>

                                   <a href="{{ route('question.edit', $question->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                   <button data-id="{{$question->id}}" class="deleteProduct btn btn-sm btn-danger">Delete</button>
                               </td>
                           </tr>
                           @endforeach
                       </table>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('question.store') }}" method="post">
          @csrf
          <div class="modal-body">
            <div class="form-group">
                <label for="">Quertion</label>
                <textarea placeholder="Enter Your Question .. " name="question" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
      </form>
    </div>
  </div>
</div>



@endsection
@push('js')

    <script>


        $('.deleteProduct').on('click', function(){
            if(!confirm("Do You Really Want To Delete This?")) {
               return false;
             }
            let que_id = $(this).data('id');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'DELETE',
                url:'/student/question/'+que_id,
                data:{que_id:que_id},
                success:function(res){
                    $("#product_id_" + que_id).remove();
                },
            })
        })
    </script>

@endpush
