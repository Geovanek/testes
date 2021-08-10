@extends(Section::get('layout'))

@section('title', "Empresas")

@section('content')
    <div class="breadcrumb">
        <h1>Empresas</h1>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li>Empresas</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    @livewire('admin.companies.companies-table')

@endsection