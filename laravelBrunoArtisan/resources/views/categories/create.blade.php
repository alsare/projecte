@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add category') }}</div>
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
                    <form method="post" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="upload">Category:</label>
                            <input type="text" class="form-control" name="name"/>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
