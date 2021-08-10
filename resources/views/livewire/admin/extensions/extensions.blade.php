<div>
    @include('livewire.admin.extensions._partials.modalExtension')

    <div class="card mb-4">
        <div class="card-header">
            <h3 class="w-50 float-left card-title m-0">Extensões</h3>
            <div class="dropdown dropleft text-right w-50 float-right">
                <button type="button" wire:click.prevent="action('create')" class="btn btn-outline-secondary" data-toggle="modal" data-target="#modal">
                    <i class="nav-icon i-Add"></i>
                    Adicionar Nova Extensão
                </button>
            </div>
        </div>
    </div>
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
                    <div class="card-body">
                        @foreach($extension->details as $detail)
                        <div class="ul-widget-notification">
                            <div class="ul-widget-notification-item-div">
                                <a href="#" class="ul-widget-notification-item">
                                    <div class="ul-widget-notification-item-icon text-{{ $detail->state_color}}">
                                        <i class="{{ $detail->icon }}"></i>
                                    </div>
                                    <div class="ul-widget-notification-item-details">
                                        <div class="ul-widget-notification-item-title">
                                            {{ $detail->name }}
                                        </div>
                                        <div class="ul-widget-notification-item-time">
                                            {{ $detail->description }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @php
                        $planCompaniesId = array();
                        $companiesId = array();
                    @endphp

                    @foreach($extension->plans as $plan)
                        @foreach($plan->companies as $company)
                            @php $planCompaniesId[] = $company->id; @endphp
                        @endforeach
                    @endforeach
        
                    @foreach($extension->companies as $company)
                        @php $companiesId[] = $company->id; @endphp
                    @endforeach
                    
                    @php 
                        $companiesCount = count(
                                            array_unique(
                                                array_merge($planCompaniesId, $companiesId)
                                            )
                                        ); 
                    @endphp

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="t-font-bolder">Empresas Vinculadas</h5>
                            </div>
                            <div class="col-5 text-right">
                                <h3 class="t-font-boldest">{{ $companiesCount }}</h3>
                            </div>
                            <div class="col-12">
                                <div class="progress mt-3">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{ round($companiesCount/$companiesTotal*100) }}%" aria-valuenow="{{ round($companiesCount/$companiesTotal*100) }}" aria-valuemin="0" aria-valuemax="100"> {{ round($companiesCount/$companiesTotal*100) }}%</div>
                                </div>
                            </div>
                        </div>
                        <div class="user-profile mb-3 mt-4">
                            <div class="ul-widget-app__profile-footer">
                                <div class="ul-widget-app__profile-footer-font" data-toggle="tooltip" data-trigger="hover" data-original-title="Editar" title="Editar">
                                    <a href="#" wire:click="action('update', '{{ $extension->uuid }}')" data-toggle="modal" data-target="#modal">
                                        <i class="far fa-edit {{-- i-Edit --}} text-20 text-success font-weight-600 mr-1"></i>
                                    </a>
                                </div>
                                <div class="ul-widget-app__profile-footer-font" data-toggle="tooltip" data-trigger="hover" data-original-title="Detalhes" title="Detalhes">
                                    <a href="{{ route('extensions.details', $extension->slug) }}">
                                        <i class="i-Check text-20 text-warning font-weight-600 mr-1"></i>
                                    </a>
                                </div>
                                <div class="ul-widget-app__profile-footer-font" data-toggle="tooltip" data-trigger="hover" data-original-title="Planos Associados" title="Planos Associados">
                                    <a href="{{ route('extensions.plans', $extension->slug) }}">
                                        <i class="fas fa-file-invoice-dollar {{-- i-Billing  --}}text-20 text-info mr-1"></i>
                                    </a>
                                </div>
                                <div class="ul-widget-app__profile-footer-font" data-toggle="tooltip" data-trigger="hover" data-original-title="Empresas com a Extensão" title="Empresas com a Extensão">
                                    <a href="{{ route('extensions.companies', $extension->id) }}">
                                        <i class="far fa-building {{-- i-Shop --}} text-20 text-secondary font-weight-500 mr-1"></i>
                                    </a>
                                </div>
                                <div class="ul-widget-app__profile-footer-font" data-toggle="tooltip" data-trigger="hover" data-original-title="Excluir Extensão" title="Excluir Extensão">
                                    <a href="#" wire:click.prevent="showConfirmation('{{ $extension->uuid }}')">
                                        <i class="fas fa-trash-alt {{-- i-Close-Window --}} text-20 text-danger font-weight-500 mr-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <button type="button" wire:click.self="activating('{{ $extension->uuid }}', {{ $extension->active }})" class="btn {{ $extension->active ? 'btn-primary' : 'btn-outline-primary' }} btn-block m-1" name="{{ $extension->slug }}">
                                {{ $extension->active ? 'Ativada' : 'Desativada' }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</div>
