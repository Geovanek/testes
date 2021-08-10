@extends(Section::get('layout'))

@section('content')
<div class="breadcrumb">
    <h1>Treinalise</h1>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @livewire('front.home')
            </div>
        </div>
    </div>
</div>
    <section class="ul-pricing-table">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-body mb-4">
                        <div class="row justify-content-around">
                            @foreach ($plans as $index => $plan)
                            <div class="col-md-4 col-lg-4 col-xl-4 m-0 p-0">
                                <div class="ul-pricing__table-2 @if($loop->last) border-right-0 @endif">
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
                                    <div class="ul-pricing__text text-mute">{{ $plan->description }}</div>
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
                                    <a href="{{ route('subscription.plan', $plan->uuid) }}" class="btn btn-lg btn-{{ $plan->state_color }} btn-rounded m-1">Assinar</a>
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
