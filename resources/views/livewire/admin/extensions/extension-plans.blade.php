<div>
    <div class="card-body mb-4">
        <div class="row justify-content-around">
            @if(count($plans) > 0)
                @foreach ($plans as $index => $plan)
                <div class="col-md-4 col-lg-4 col-xl-4 m-0 p-0">
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
                        <div class="ul-pricing__text text-mute p-1">{{ $plan->description }}</div>
                    </div>  
                </div>
                @endforeach
            @else
                <div class="not-found-wrap text-center">
                    <h1 class="text-60 badge badge-primary r-badge">Nenhum plano encontrado</h1>
                    <p class="text-36 subheading mb-3">Essa extensão não esta vinculada a nenhum plano.</p>
                    <p class="mb-2 text-muted text-18">Disponível somente para contratação a parte.</p>
                </div>
            @endif
        </div>
    </div>
</div>