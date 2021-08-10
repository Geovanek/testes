@extends(Section::get('layout'))

@section('title', 'Extensões')

@section('page-css')
    <link rel="stylesheet" href="{{asset('gull/assets/styles/vendor/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('gull/assets/styles/vendor/toastr.css')}}">
@endsection

@section('content')
    <div class="breadcrumb">
        <h1>Extensões</h1>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li>Extensões</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    @livewire('admin.extensions.extensions')
    
@endsection

@section('page-js')
    <script src="{{asset('gull/assets/js/vendor/sweetalert2.min.js')}}"></script>
    <script src="{{asset('gull/assets/js/sweetalert.script.js')}}"></script>
@endsection

@section('livewire-js')
    <script src="{{asset('js/livewireToastr.js')}}"></script>
    <script src="{{asset('js/livewireSweetAlert.js')}}"></script>
    <script type="text/javascript">
        window.livewire.on('closeModalStoreUpdate', () => {
            $('#modal').modal('hide');
        });
    </script>
@endsection