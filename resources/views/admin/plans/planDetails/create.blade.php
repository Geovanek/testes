@extends(\Section::get('layout'))

@section('title', 'Cadastrar Novo Detalhe')

@section('content')
    <div class="breadcrumb">
        <h1>Cadastrar Novo Detalhe ao Plano {{ $plan->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('plans.index') }}">Planos</a></li>
            <li><a href="{{ route('details.index', $plan->slug) }}">Detalhes do Plano</a></li>
            <li>Cadastrar Novo Detalhe</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="2-columns-form-layout">
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Pode ser um detalhe específico ou o nome de uma extensão.</h4>
                    <p>No caso de uma extensão, se a mesma faz parte do pacaote do plano marcar o checkbox. Extensões que estão em inclusas no pacote de algum outro plano, mas não estão nesse, adicionar o detalhe também, mas deixar o checkbox desmarcado.</p>
                    <p>Para o plano que oferece desconto no pacote de extensões adicionais, marcar o checkbox de desconto.</p>
                    <form action="{{ route('details.store', $plan->slug) }}" method="POST">
                        @csrf
                        
                        @include('admin.plans.planDetails._partials.form')
                    </form>
                </div>
            </div>
            <!-- end of main row -->
        </div>
    </div>
@endsection