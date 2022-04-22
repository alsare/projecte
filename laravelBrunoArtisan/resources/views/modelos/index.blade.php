@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modelos') }}</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <td scope="col">ID</td>
                                    <td scope="col">manufacturer</td>
                                    <td scope="col">model</td>   
                                    <td scope="col">photo_id</td>
                                    <td scope="col">category_id</td>
                                    <td scope="col">price</td>   
   
   

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($modelos as $modelo)
                                <tr>
                                    <td>{{ $modelo->id }}</td>
                                    <td>{{ $modelo->manufacturer }}</td>
                                    <td>{{ $modelo->model }}</td>
                                    <td>{{ $modelo->photo_id }}</td>
                                    <td>{{ $modelo->category_id }}</td>
                                    <td>{{ $modelo->price }}</td>


                                    <td>
                                        <a title="View" href="{{ route('modelos.show', $modelo) }}"></a>
                                        <a title="Edit" href="{{ route('modelos.edit', $modelo) }}"></a>
                                        <a title="Delete" href="{{ route('modelos.show', [$modelo, 'delete' => 1]) }}">🗑️</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <a class="btn btn-primary" href="{{ route('modelos.create') }}" role="button">➕ Add new file</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
