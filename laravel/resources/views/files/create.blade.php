@extends('layouts.app')
@include('flash') 
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header"></div>
               <div class="card-body">
                   <form action="{{ route('files.store') }}" method="post" enctype="multipart/form-data">
                       @csrf
                       <div class="form-group">
                            <label for="upload">File:</label>
                            <input type="file" class="form-control" name="upload"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
