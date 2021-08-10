@extends(Section::get('layout'))

@section('content')
<div class="container">
    <div class="row justify-content-center">

        @include('app.includes.alerts')

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Coach ID</th>
                        <th>Company ID</th>
                        <th colspan="2">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($athletes as $athlete)
                    <tr>
                        <td>{{ $athlete->user->name }}</td>
                        <td>{{ $athlete->coach_id }}</td>
                        <td>{{ $athlete->company_id }}</td>
                        <td>
                            <a href="{{route('athletes.edit', $athlete->id)}}" class="btn btn-default btn-sm">
                                Editar
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('athletes.unlink', ['athlete' => $athlete->id]) }}">
                                @csrf
                                {{ method_field('PUT') }}
                                
                                <input id="coach_id" type="hidden" name="coach_id" value="">
                                <input id="company_id" type="hidden" name="company_id" value="">
                    
                                <button type="submit" onclick="return confirm('Tem certeza que deseja desvincular este atleta da empresa?')">{{ __('Desvincular') }}</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection