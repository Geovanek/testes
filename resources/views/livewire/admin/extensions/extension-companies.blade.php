<div>
    <div class="card">
        <div class="card-header">
            <h3 class="w-50 float-left card-title m-0">
                Empresas utilizando a extensão {{ $extension->name }}
            </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="datables" class="table table-hover" style="border-collapse: collapse !important">
                    <thead>
                        <tr>
                            <th scope="col" class="d-none d-sm-block">Logo</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Responsável</th>
                            <th scope="col">Via plano?</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($extension->plans as $plan)
                            @foreach($plan->companies as $company)
                            <tr>
                                <td class="d-none d-sm-block">
                                    <img class="rounded-circle m-0 avatar-sm-table" src="{{ asset('img/companies/logo/'.$company->logo) }}" alt="">
                                </td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->user->name }}</td>
                                <td class="font-weight-bold">
                                    <span class="badge badge-pill badge-outline-{{ $plan->state_color }} p-2 m-0">
                                        {{ $plan->name }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('companies.profile', ['slug' => $company->slug]) }}">
                                        <i class="nav-icon fas fa-eye text-18"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        @endforeach
                        @foreach($extension->companies as $company)
                            <tr>
                                <td class="d-none d-sm-block">
                                    <img class="rounded-circle m-0 avatar-sm-table" src="{{ asset('img/companies/logo/'.$company->logo) }}" alt="">
                                </td>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->user->name }}</td>
                                <td> - </td>
                                <td>
                                    <a href="{{ route('companies.profile', ['slug' => $company->slug]) }}">
                                        <i class="nav-icon fas fa-eye text-18"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
