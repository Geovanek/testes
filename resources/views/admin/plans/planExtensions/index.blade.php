@extends(\Section::get('layout'))

@section('title', "Extensões Vinculadas ao Plano: $plan->name")

@section('page-css')
    <link rel="stylesheet" href="{{asset('gull/assets/styles/vendor/toastr.css')}}">
@endsection

@section('content')
    <div class="breadcrumb">
        <h1>Extensões Vinculadas ao Plano: {{ $plan->name }}</h1>
        <ul>
            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('plans.index') }}">Planos</a></li>
            <li>Vincular/Desvincular extensões</li>
        </ul>
    </div>
    <div class="separator-breadcrumb border-top"></div>

    <section class="ul-widget-stat-s1">
        <div class="row">
            @foreach($extensions as $extension)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card-icon-bg card-icon-bg-{{ $extension->state_color }} o-hidden">
                        <div class="card-body text-center">
                            <i class="{{ $extension->icon }}"></i>
                            <div class="content" style="max-width: 100%">
                                <p class="text-muted text-16 t-font-boldest mt-2 mb-0">{{ $extension->name }}</p>
                                <p class="text-primary text-24 line-height-1 mb-2">R${{ $extension->price }}</p>
                                <small class="text-muted">por mês</small>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row justify-content-around">
                            @livewire('admin.plans.associate-extension-plan', ['planId' => $plan->id, 'planName' => $plan->name, 'extension' => $extension], key($extension->id))
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>


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