@extends(Section::get('layout'))

@section('title', 'Empresas utilizando a extensão')

@section('page-css')
    <link rel="stylesheet" href="{{asset('gull/assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('content')
    <div class="breadcrumb">
        <h1>Empresas</h1>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('extensions.index') }}">Extensões</a></li>
            <li>Empresas</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    @livewire('admin.extensions.extension-companies')
    
@endsection

@section('page-js')
    <script src="{{asset('gull/assets/js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('js/datatables.js')}}"></script>
@endsection

@section('livewire-js')
@endsection