@extends(Section::get('layout'))

@section('title', "Planos")

@section('page-css')
    <link rel="stylesheet" href="{{asset('gull/assets/styles/vendor/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('gull/assets/styles/vendor/toastr.css')}}">
@endsection

@section('content')
    <div class="breadcrumb">
        <h1>Planos</h1>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li>Planos</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <section class="ul-pricing-table">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="w-50 float-left card-title m-0">Planos</h3>
                        <div class="dropdown dropleft text-right w-50 float-right">
                            <a href="{{ route('plans.create') }}" class="btn btn-outline-secondary">
                                <i class="nav-icon i-Add"></i> 
                                Adicionar Plano
                            </a>
                        </div>
                    </div>
                    
                    <div class="card-body mb-4">
                        <div class="row justify-content-around">
                            @foreach ($plans as $index => $plan)
                            <div class="col-md-6 col-lg-3 col-xl-3 m-0 p-0">
                                <div class="ul-pricing__table-2 @if($loop->last || $index == 2 ) border-right-0 @endif">
                                    <div class="ul-pricing__header">
                                        <div class="ul-pricing__image text-{{ $plan->state_color }} m-0 pt-1">
                                            <i class="{{ $plan->icon }}"></i>
                                        </div>
                                        <div class="ul-pricing__main-number m-0"> 
                                            <h1 class="heading text-{{ $plan->state_color }} t-font-boldest">R$ {{ number_format($plan->price, 2, ',', '.') }} </h1>
                                        </div>
                                        <div class="ul-pricing__month">
                                            <small>{{ $plan->price_details }}</small>
                                        </div>          
                                    </div>
                                    <div class="ul-pricing__title">
                                        <h2 class="heading text-{{ $plan->state_color }} t-font-u">{{ $plan->name}}</h2>
                                    </div>
                                    <div class="ul-pricing__text text-primary">{{ $plan->description }}</div>
                                    <div class="ul-pricing__table-listing mb-4 pr-3 pl-3">
                                        <ul>
                                            @foreach ($plan->details as $detail)
                                            <li class="{{ $detail->plan_package == 'Y' ? 't-font-bolder' : 'text-mute' }}">
                                                {{ $detail->description}}
                                                @if ($detail->plan_discount == 'Y')
                                                <span class="t-font-bold text-success">
                                                    -{{ $plan->discount }}%
                                                </span>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-success btn-rounded pr-3 pl-3" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Editar plano">
                                        <i class="nav-icon text-white fas fa-pencil-alt {{-- i-Pen-4 --}}"></i>
                                    </a>
                                    <a href="{{ route('details.index', $plan->slug) }}" class="btn btn-info btn-rounded pr-3 pl-3" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Detalhes do plano">
                                        <i class="nav-icon text-white fas fa-info {{-- i-Check --}}"></i>
                                    </a>
                                    <a href="{{ route('plans.extensions', $plan->slug) }}" class="btn btn-warning btn-rounded pr-3 pl-3" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Adicinoar extensões ao plano">
                                        <i class="nav-icon text-white fas fa-puzzle-piece {{-- i-Financial --}}"></i>
                                    </a>
                                    <a href="{{ route('plans.companies', $plan->id) }}" class="btn btn-primary btn-rounded pr-3 pl-3" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Empresas vinculadas ao plano">
                                        <i class="nav-icon text-white fas fa-building {{-- i-Shop --}}"></i>
                                    </a>
                                    <form action="{{ route('plans.destroy', $plan->id) }}" method="POST" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-rounded pr-3 pl-3 alert-confirm" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Excluir plano">
                                            <i class="nav-icon text-white fas fa-trash-alt {{-- i-Close --}}"></i>
                                        </button>
                                    </form>

                                    <div class="row justify-content-around mt-4">
                                        @livewire('admin.plans.active', ['plan' => $plan], key($plan->id))
                                    </div>
                                </div>  
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection

@section('page-js')
    <script src="{{asset('gull/assets/js/vendor/sweetalert2.min.js')}}"></script>
    <script src="{{asset('js/sweetalert.js')}}"></script>
    @include('admin.includes.toastr')
    
@endsection

@section('livewire-js')
    <script src="{{asset('js/livewireToastr.js')}}"></script>
@endsection