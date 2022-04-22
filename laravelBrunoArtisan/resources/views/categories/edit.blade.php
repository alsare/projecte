@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Category') . " " . $category->id }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('categories.update', $category) }}" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <input type="text" class="form-control" name="category"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection