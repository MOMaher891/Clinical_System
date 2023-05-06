@extends('Doctors.layout')

@section('content')
    @if (Session::has('success'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: "{{ Session::get('success') }}",
                showConfirmButton: false,
                dangerMode: true,
                timer: 1500
            })
        </script>
    @endif
    @if (Session::has('error'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: "{{ Session::get('error') }}",
                showConfirmButton: false,
                dangerMode: true,
                timer: 1500
            })
        </script>
    @endif


    {{-- Magdy Changes --}}


    {{-- Magdy Changes --}}

    <div class="card">
        <form action="{{ route('all.statements') }}">

            <div class="card-header">
                Filter Statements
            </div>
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-12 justify-content-start row">

                        <div class="col-md-3">
                            <label for="time_from">Patient</label>

                            <select name="patient_id" class="form-select" id="patient_id">
                                <option value="">Patients</option>
                                @foreach ($patients as $pat)
                                    <option value="{{ $pat->id }}">{{ $pat->pat_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="time_from">Time From</label>
                                <input type="date" name="time_from" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="time_from">Time To</label>
                                <input type="date" name="time_to" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-2 mt-3">
                            <button class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>




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
                            <td>{{ date('d/m/Y', strtotime($statement->created_at)) }}</td>

                            {{-- <td>
                                <a href="{{ route('application.edit', ['app_id' => $app['id']]) }}" class="text-success"><i
                                        class="fa-regular fa-pen-to-square"></i></a>
                                <a href="{{ route('application.delete', ['app_id' => $app['id']]) }}"
                                    class="text-danger"><i class="fa-regular fa-trash-can"></i></a>
                            </td> --}}
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-danger" style="font-weight:bolder">No Applications Found</td>
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
