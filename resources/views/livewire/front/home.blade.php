<div>
    @auth
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{ __('You are logged in!') }}
        </div>
    @else
        <div class="card-header">Oops!</div>

        <div class="card-body">
            Você não está logado.
        </div>
    @endauth
</div>
