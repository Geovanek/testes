@extends(Section::get('layout'))

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('athletes.update', ['athlete' => $athlete->id]) }}">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $athlete->user->name }}">
                    @error('name')

                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection