@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Categories') }}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <td scope="col">ID</td>
                                    <td scope="col">name</td>   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>

                                    <td>
                                        <a title="View" href="{{ route('categories.show', $category) }}"></a>
                                        <a title="Edit" href="{{ route('categories.edit', $category) }}"></a>
                                        <a title="Delete" href="{{ route('categories.show', [$category, 'delete' => 1]) }}">🗑️</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-primary" href="{{ route('categories.create') }}" role="button">➕ Add new file</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection