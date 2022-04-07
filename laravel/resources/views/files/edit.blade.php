@extends('layouts.app')
@include('flash') 
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{ __('File') }}</div>
               <div class="card-body">
                   <form action="{{ route('files.update',$file) }}" method="post">
                        @csrf 
                        @method('PUT')  
                       <input type="file" value="{{ $file->filepath }}" name="upload">
                       <input type="submit" value="enviar">
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
