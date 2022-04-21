@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <!-- CRUDs web -->
                    <ul>
                        <li>🗂️ <a title="Files" href="{{ route('files.index') }}">{{ __('Files') }}</a></li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection