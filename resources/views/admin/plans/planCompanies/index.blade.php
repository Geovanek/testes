@extends(\Section::get('layout'))

@section('title', "Empresas Vinculadas ao Plano: $plan->name")

@section('page-css')
    <link rel="stylesheet" href="{{asset('gull/assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('content')
    <div class="breadcrumb">
        <h1>{{ $plan->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('plans.index') }}">Planos</a></li>
            <li>Empresas vinculadas ao plano</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="card">
        <div class="card-header">
            <h3 class="w-50 float-left card-title m-0">
                Empresas vinculadas ao plano: {{ $plan->name }}
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datables" class="table table-hover" style="border-collapse: collapse !important">
                    <thead>
                        <tr>
                            <th scope="col" class="d-none d-sm-block">Logo</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Responsável</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plan->companies as $company)
                            <tr>
                                <td class="d-none d-sm-block">
                                    <img class="rounded-circle m-0 avatar-sm-table" src="{{ asset('img/companies/logo/'.$company->logo) }}" alt="">
                                </td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->user->name }}</td>
                                <td>
                                    <a href="{{ route('companies.profile', ['slug' => $company->slug]) }}">
                                        <i class="nav-icon fas fa-eye text-18"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection

@section('page-js')
    <script src="{{asset('gull/assets/js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('js/datatables.js')}}"></script>
@endsection

@section('livewire-js')
@endsection