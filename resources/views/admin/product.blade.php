@extends("layouts.admin.default")

@section("content")

  
    <div class="col-6">
        <div>
           @if(isset($success)))
           
                <div class="" style="color: green;">{{$success}}</div>
            @endif

        </div>
    </div>    
 
@endsection