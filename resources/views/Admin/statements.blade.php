@extends('Admin.layout')

@section('content')





    <div class="row my-5">
        <h3 class="fs-4 mb-3">Statements</h3>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Patient</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Age</th>
                        <th scope="col">National_ID</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Time</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($statements as $statement)
                        <tr>
                            <td>{{ $statement->id }}</td>
                            <td>{{ $statement->patient->pat_name }}</td>
                            <td>{{ $statement->patient->pat_gender }}</td>
                            <td>{{ Carbon\Carbon::now()->diff($statement->patient->pat_age)->format('%y') }}</td>
                            <td>{{ $statement->patient->pat_nat_id }}</td>
                            <td>{{ $statement->doctor->doc_name }}</td>
                            <td>{{ date('d/m/Y', strtotime($statement->created_at)) }}</td>
                            <td><a href="{{ route('statement.specific', ['statement_id' => $statement->id]) }}"
                                    style="font-size:19px"><i class="fa-regular fa-eye"></i></a></td>
                            <td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-danger" style="font-weight:bolder">No Statements Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <center>
                {{ $statements->onEachSide(1)->links() }}
            </center>
        </div>
    </div>
@stop()
