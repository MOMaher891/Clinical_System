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
        <h3 class="fs-4 mb-3">Departments</h3>
        <div class="col">
            <table class="table bg-white rounded shadow-sm  table-hover">
                <thead>
                    <tr>
                        <th scope="col" width="50">#</th>
                        <th scope="col">Department</th>
                        <th scope="col">Price</th>
                        <th scope="col">Rate</th>
                        <th scope="col">times of work</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($departments as $department)
                        <tr>
                            <td><img src="{{ asset('Admin/Images/Departments/' . $department['dep_image']) }}"
                                    style="width:100px;object-fit:cover" alt="">
                            <td>{{ $department->dep_name }}</td>
                            <td>{{ $department->dep_price }} .LE</td>
                            <td>{{ $department->dep_rate }}</td>
                            <td>
                                @foreach ($department->days as $day)
                                    ({{ $day->day }})
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('department.edit', ['dep_id' => $department['id']]) }}"
                                    class="text-success"><i class="fa-regular fa-pen-to-square"></i></a>
                                <a href="{{ route('department.delete', ['dep_id' => $department['id']]) }}"
                                    class="text-danger"><i class="fa-regular fa-trash-can"></i></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-danger" style="font-weight:bolder">No Department Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <a href="{{ route('department.add') }}" class="btn btn-success" style="position: absolute; right:23px">Add
                Department</a>
        </div>
    </div>
@stop()
