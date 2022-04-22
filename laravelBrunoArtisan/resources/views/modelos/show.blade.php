@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Category') . " " . $category->id }}</div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                                <td><strong>ID<strong></td>
                                <td>{{ $modelo->id }}</td>
                            </tr>
                            <tr>
                                <td><strong>Manufacturer<strong></td>
                                <td>{{ $modelo->manufacturer }}</td>
                            </tr>
                            <tr>
                                <td><strong>Model<strong></td>
                                <td>{{ $modelo->model }}</td>
                            </tr>
                            <tr>
                                <td><strong>Photo_id<strong></td>
                                <td>{{ $modelo->photo_id }}</td>
                            </tr>
                            <tr>
                                <td><strong>Category_id<strong></td>
                                <td>{{ $modelo->category_id }}</td>
                            </tr>
                            <tr>
                                <td><strong>Price<strong></td>
                                <td>{{ $modelo->price }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <a class="btn btn-warning" href="{{ route('modelos.edit', $modelo) }}" role="button">📝 Edit</a>
            
            <form id="form" method="POST" action="{{ route('modelos.destroy', $modelo) }}">
                @csrf
                @method("DELETE")
                <button id="destroy" type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal">🗑️ Delete</button>
            </form>

            <!-- Modal -->
            <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            This action cannot be undone
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="confirm" type="button" class="btn btn-primary">Confirm</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit confirm -->
            <script type="text/javascript">                
                const submit = document.getElementById('destroy')
                const  confirm = document.getElementById('confirm')

                // Disable form submit button
                submit.addEventListener("click", function( event ) {
                    event.preventDefault()
                    return false
                })

                // Enable submit via modal confirmation
                confirm.addEventListener("click", function( event ) {
                    document.getElementById("form").submit(); 
                })
            </script>

        </div>
    </div>
</div>
@endsection
