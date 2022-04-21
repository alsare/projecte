@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Files') }}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <td scope="col">ID</td>
                                    <td scope="col">Filepath</td>
                                    <td scope="col">Filesize</td>
                                    <td scope="col">Created</td>
                                    <td scope="col">Updated</td>
                                    <td scope="col"></td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($files as $file)
                                <tr>
                                    <td>{{ $file->id }}</td>
                                    <td style="max-width: 150px;">{{ $file->filepath }}</td>
                                    <td>{{ $file->filesize }}</td>
                                    <td>{{ $file->created_at }}</td>
                                    <td>{{ $file->updated_at }}</td>
                                    <td>
                                        <a title="View" href="{{ route('files.show', $file) }}">👁️</a>
                                        <a title="Edit" href="{{ route('files.edit', $file) }}">📝</a>
                                        <a title="Delete" href="{{ route('files.show', [$file, 'delete' => 1]) }}">🗑️</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-primary" href="{{ route('files.create') }}" role="button">➕ Add new file</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
