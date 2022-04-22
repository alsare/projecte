@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add modelo') }}</div>
                <div class="card-body">
                    <!--
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    -->
                    <form method="post" action="{{ route('modelos.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="upload">Manufacturer:</label>
                            <input type="text" class="form-control" name="manufacturer"/>
                        </div>
                        <div class="form-group">
                            <label for="upload">Modelo:</label>
                            <input type="text" class="form-control" name="model"/>
                        </div>
                        <div class="form-group">
                            <label for="upload">Categoria:</label>
                            <input type="text" class="form-control" name="category_id"/>
                        </div>
                        <div class="form-group">
                            <label for="upload">Precio:</label>
                            <input type="text" class="form-control" name="price"/>
                        </div>
                        <label>
            <span class="sr-only">Select a category: </span>
            <br>
            <select name="category_id" value>
                @foreach($categories as $category )
                <option value={{$category->id}}>
                    {{$category->name}}
                </option>
                @endforeach
            </select>
        </label>
        <label>
            <span class="sr-only">Select a file: </span>
            <input type="file" name="photo_id">
        </label>


                        <button type="submit" class="btn btn-primary">Create</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
