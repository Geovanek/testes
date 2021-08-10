@extends(Section::get('layout'))

@section('title', 'Planos a qual a extensão esta vinculada')

@section('page-css')
    <link rel="stylesheet" href="{{asset('gull/assets/styles/vendor/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('gull/assets/styles/vendor/toastr.css')}}">
@endsection

@section('content')
    <div class="breadcrumb">
        <h1>Planos ao qual a extensão esta vinculada</h1>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('extensions.index') }}">Extensões</a></li>
            <li>Planos</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    @livewire('admin.extensions.extension-plans')
    
@endsection

@section('page-js')
    <script src="{{asset('gull/assets/js/vendor/sweetalert2.min.js')}}"></script>
    <script src="{{asset('gull/assets/js/sweetalert.script.js')}}"></script>
@endsection

@section('livewire-js')
@endsection