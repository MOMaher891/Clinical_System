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
                <i class="fas fa-gift fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $doc_count }}</h3>
                    <p class="fs-5">Doctors</p>
                </div>
                <i class="fas fa-hand-holding-usd fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $app_count }}</h3>
                    <p class="fs-5">Applications</p>
                </div>
                <i class="fas fa-chart-line fs-1 primary-text border rounded-full secondary-bg p-3"></i>
            </div>
        </div>

        <div class="col-md-3">
            <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                <div>
                    <h3 class="fs-2">{{ $app_count }}</h3>
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
                            <th scope="col">Application Code</th>
                            <th scope="col">Patient</th>
                            <th scope="col">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($applications as $application)
                            <tr>
                                {{-- <th scope="row">{{ $application->id }}</th> --}}
                                <td>{{ $application->app_code }}</td>
                                <td>{{ $application->patient->pat_name }}</td>
                                <td>{{ date('d/m/Y', strtotime($application->created_at)) }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-danger" style="font-weight: bolder">No Applications</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                <a href="">Show All</a>
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
                        @endforelse
                    </tbody>
                </table>
                <a href="{{ route('all.doctors') }}">Show All</a>
            </div>
        </div>
    </div>


@stop()
