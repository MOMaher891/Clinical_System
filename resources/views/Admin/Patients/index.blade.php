@extends('Admin.layout')

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
    <div class="row my-5">
        <h3 class="fs-4 mb-3">Patients</h3>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Patient</th>
                        <th scope="col">National_ID</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Age</th>
                        <th scope="col">Applications</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($patients as $patient)
                        <tr>
                            <td>{{ $patient->id }}</td>
                            <td>{{ $patient->pat_name }}</td>
                            <td>{{ $patient->pat_nat_id }}</td>
                            <td>{{ $patient->pat_gender }}</td>
                            <td>{{ Carbon\Carbon::now()->diff($patient->pat_age)->format('%y') }}</td>
                            <td><a href="{{ route('patient.specific_app', ['pat_id' => $patient->id]) }}"
                                    style="font-size:19px"><i class="fa-regular fa-eye"></i></a></td>
                            <td>
                                <a href="{{ route('patient.edit', ['pat_id' => $patient['id']]) }}" class="text-success"><i
                                        class="fa-regular fa-pen-to-square"></i></a>
                                <a href="{{ route('patient.delete', ['pat_id' => $patient['id']]) }}" class="text-danger"><i
                                        class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-danger" style="font-weight:bolder">No Patient Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <a href="{{ route('patient.add') }}" class="btn btn-success" style="position: absolute; right:23px">Add
                Patient</a>
        </div>
    </div>
@stop()
