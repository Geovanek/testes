@extends(\Section::get('layout'))

@section('title', 'Editar Detalhe')

@section('content')
    <div class="breadcrumb">
        <h1>Editar detalhe: {{ $detail->description }}</h1>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('plans.index') }}">Planos</a></li>
            <li><a href="{{ route('details.index', $plan->slug) }}">Detalhes do Plano</a></li>
            <li>Editar detalhe</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="2-columns-form-layout">
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ route('details.update', [$plan->slug, $detail->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        @include('admin.plans.planDetails._partials.form')
                    </form>
                </div>
            </div>
            <!-- end of main row -->
        </div>
    </div>
@endsection