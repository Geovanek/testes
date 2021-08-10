@extends(\Section::get('layout'))

@section('title', "Detalhes do plano: $plan->name")

@section('page-css')
    <link rel="stylesheet" href="{{asset('gull/assets/styles/vendor/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('gull/assets/styles/vendor/toastr.css')}}">
@endsection

@section('content')
    <div class="breadcrumb">
        <h1>Plano: {{ $plan->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('plans.index') }}">Planos</a></li>
            <li>Detalhes do plano</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <div class="card">
        <div class="card-header">
            <div class="text-right w-50 float-right">
                <a href="{{ route('details.create', $plan->slug) }}" class="btn btn-outline-secondary">
                    <i class="nav-icon i-Add"></i> 
                    Adicionar Novo Detalhe
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless table-hover">
                    <thead>
                        <tr>
                            <th scope="col" style="width:10px; vertical-align: middle;" rowspan="2">#</th>
                            <th scope="col" rowspan="2" style="width:50%; vertical-align: middle;">
                                Descrição
                            </th>
                            <th scope="col" colspan="2" class="text-center">
                                Se o detalhe refere-se a uma extensão:
                            </th>
                            <th scope="col" rowspan="2" class="text-center" style="vertical-align: middle;">
                                Ações
                            </th>
                        </tr>
                        <tr>
                            <th class="text-center">Inclusa no plano?</th>
                            <th class="text-center">Desconto no pacote?</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1 @endphp
                        @foreach($plan->details as $detail)
                            <tr>
                                <th scope="row">{{ $i }}</th>
                                <td>{{ $detail->description }}</td>
                                <td class="text-center"> 
                                    @if ($detail->plan_package == 'Y')
                                        <i class="nav-icon i-Yes text-info text-20"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($detail->plan_package == 'Y' && $detail->plan_discount == 'Y')
                                        <i class="nav-icon i-Yes text-success text-20"></i>
                                    @elseif ($detail->plan_package == 'Y')
                                        <i class="nav-icon i-Close text-warning text-20"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('details.edit', [$plan->slug, $detail->id]) }}" class="btn btn-outline-success btn-icon mr-2" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar detalhe">
                                        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
                                    </a>
                                    <form action="{{ route('details.destroy', [$plan->slug, $detail->id]) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-icon m-0 m-0 alert-confirm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Excluir detalhe">
                                            <i class="nav-icon i-Close-Window font-weight-bold"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @php $i++ @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
@endsection

@section('page-js')
    <script src="{{asset('gull/assets/js/vendor/sweetalert2.min.js')}}"></script>
    <script src="{{asset('gull/assets/js/sweetalert.script.js')}}"></script>
    @include('admin.includes.toastr')
@endsection