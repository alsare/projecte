@extends('layouts.app')
@include('flash') 
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{ __('File') }}</div>
               <div class="card-body">
                   <table class="table">
                   <thead>
                           <tr>
                               <td scope="col">ID</td>
                               <td scope="col">Image</td>
                               <td scope="col">Filepath</td>
                               <td scope="col">Filesize</td>
                               <td scope="col">Created</td>
                               <td scope="col">Updated</td>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td>{{ $file->id }}</td>
                               <td><img class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}" /></td>
                               <td>{{ $file->filepath }}</td>
                               <td>{{ $file->filesize }}</td>
                               <td>{{ $file->created_at }}</td>
                               <td>{{ $file->updated_at }}</td>
                           </tr>
                       </tbody>
                    </table>
                    <form action="{{ route('files.destroy',$file) }}" method="post">
                        @csrf 
                        @method('DELETE')   
                        <button type="submit">DESTROY</buttton>
                    </form>
                    <form action="{{ route('files.edit',$file) }}" method="post">
                        @csrf 
                        @method('PUT')  
                        <button type="submit">EDIT</buttton>
                    </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
<!-- action="/files/{{ $file->id }}" -->