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
        <h3 class="fs-4 mb-3">Doctors</h3>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Position</th>
                        <th scope="col">Gender</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($doctors as $doctor)
                        <tr>
                            <td><img src="{{ asset('Admin/Images/Doctors/' . $doctor['doc_image']) }}"
                                    style="width:50px;border-radius:50%;object-fit:cover" alt="">
                            </td>
                            <td>{{ $doctor->doc_name }}</td>
                            <td>{{ $doctor->doc_position }}</td>
                            <td>{{ $doctor->doc_gender }}</td>
                            <td>
                                <a href="{{ route('doctor.edit', ['doc_id' => $doctor['id']]) }}" class="text-success"><i
                                        class="fa-regular fa-pen-to-square"></i></a>
                                <a href="{{ route('doctor.delete', ['doc_id' => $doctor['id']]) }}" class="text-danger"><i
                                        class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            <a href="{{ route('doctor.add') }}" class="btn btn-success" style="position: absolute; right:23px">Add
                Doctor</a>
        </div>
    </div>
@stop()
