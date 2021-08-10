@extends(\Section::get('layout'))

@section('title', 'Cadastrar Novo Plano')

@section('page-css')
    <link rel="stylesheet" href="{{asset('gull/assets/styles/vendor/toastr.css')}}">
@endsection

@section('content')
    <div class="breadcrumb">
        <h1>Cadastrar Novo Plano</h1>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('plans.index') }}">Planos</a></li>
            <li>Cadastrar Novo Plano</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="2-columns-form-layout">
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('plans.store') }}" method="POST">
                        @csrf
                        
                        @include('admin.plans._partials.form')
                    </form>
                </div>
            </div>
            <!-- end of main row -->
        </div>
    </div>


@endsection


@section('page-js')
    <script src="{{asset('gull/assets/js/vendor/toastr.min.js')}}"></script>
    <script src="{{asset('gull/assets/js/toastr.script.js')}}"></script>
@endsection