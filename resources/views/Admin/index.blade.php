@extends('Admin.layout')

@section('content')
    <style>
        .col-md-6 {
            box-shadow: 1px 1px 15px #009d63;
            border-radius: 15px;
            padding: 10px;
            background: white;
            width: 46%;
            margin: 0px 10px;
        }
    </style>
    <div class="row g-3 my-2">
        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $pat_count }}</h3>
                    <p class="fs-5">Paitents</p>
                </div>
                <i class="fa-solid fa-hospital-user fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $doc_count }}</h3>
                    <p class="fs-5">Doctors</p>
                </div>
                <i class="fa-solid fa-user-doctor fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $app_count }}</h3>
                    <p class="fs-5">Applications</p>
                </div>
                <i class="fa-solid fa-ticket fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $dep_count }}</h3>
                    <p class="fs-5">Departments</p>
                </div>
                <i class="fa-solid fa-building fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>
    </div>

    <div class="row g-3 my-2">
        <div class="col-md-6 my-5">
            <h3 class="fs-4 mb-3">Recent Applications</h3>
            <div class="col">
                <table class="table rounded shadow-sm  table-hover">
                    <thead>
                        <tr>
                            {{-- <th scope="col" width="50">#</th> --}}
                            <th scope="col">Code</th>
                            <th scope="col">Patient</th>
                            <th scope="col">Department</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($applications as $application)
                            <tr>
                                {{-- <th scope="row">{{ $application->id }}</th> --}}
                                <td>{{ $application->app_code }}</td>
                                <td>{{ $application->patient->pat_name }}</td>
                                <td>{{ $application->department->dep_name }}</td>
                                <td>{{ date('d/m/Y', strtotime($application->created_at)) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-danger" style="font-weight: bolder;text-align:center">No
                                    Applcations</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                <a href="{{ route('all.applications') }}">Show All</a>
            </div>
        </div>


        <div class="col-md-6 my-5">
            <h3 class="fs-4 mb-3">Recent Doctors</h3>
            <div class="col">
                <table class="table  rounded shadow-sm  table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="50">#</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Position</th>
                            <th scope="col">Gender</th>
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
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-danger" style="font-weight: bolder;text-align:center">No
                                    Doctors</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <a href="{{ route('all.doctors') }}">Show All</a>
            </div>
        </div>
    </div>


    <div class="row g-3 my-2">
        <div class="col-md-6 my-5">
            <h3 class="fs-4 mb-3">Recent Patients</h3>
            <div class="col">
                <table class="table rounded shadow-sm  table-hover">
                    <thead>
                        <tr>
                            {{-- <th scope="col" width="50">#</th> --}}
                            <th scope="col">Patient</th>
                            <th scope="col">National_ID</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($patients as $patient)
                            <tr>
                                {{-- <th scope="row">{{ $application->id }}</th> --}}
                                <td>{{ $patient->pat_name }}</td>
                                <td>{{ $patient->pat_nat_id }}</td>
                                <td>{{ $patient->pat_gender }}</td>
                                <td>{{ Carbon\Carbon::now()->diff($patient->pat_age)->format('%y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-danger" style="font-weight: bolder;text-align:center">No
                                    Patients</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                <a href="{{ route('all.patients') }}">Show All</a>
            </div>
        </div>


        <div class="col-md-6 my-5">
            <h3 class="fs-4 mb-3">Recent Departments</h3>
            <div class="col">
                <table class="table  rounded shadow-sm  table-hover">
                    <thead>
                        <tr>
                            <th scope="col" width="50">#</th>
                            <th scope="col">Department</th>
                            <th scope="col">Price</th>
                            <th scope="col">Rate</th>
                            <th scope="col">times of work</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($departments as $dep)
                            <tr>
                                <td><img src="{{ asset('Admin/Images/Departments/' . $dep['dep_image']) }}"
                                        style="width:50px;border-radius:50%;object-fit:cover" alt="">
                                </td>
                                <td>{{ $dep->dep_name }}</td>
                                <td>{{ $dep->dep_price }}</td>
                                <td>{{ $dep->dep_rate }}</td>
                                <td>
                                    @foreach ($dep->days as $day)
                                        ({{ $day->day }})
                                    @endforeach
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-danger" style="font-weight: bolder;text-align:center">No
                                    Departments</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <a href="{{ route('all.departments') }}">Show All</a>
            </div>
        </div>
    </div>

@stop()
