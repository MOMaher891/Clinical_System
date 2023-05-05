@extends('Admin.layout')

@section('content')


    <h2 class="my-4 text-secondary">Update Application</h2>
    <form method="post" action="{{ route('application.update') }}">
        @csrf
        <div class="mb-3">
            <input type="hidden" class="form-control" name="id" value="{{ $application['id'] }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Time</label>
            <input type="datetime" class="form-control" name="created_at" value="{{ $application->created_at }}">
            @error('created_at')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form">Patients</label>
            <select name="patient_id" id="patient_search" class="form-control">
                @foreach ($patients as $pat)
                    <option value="{{ $pat->id }}" <?= $pat->id == $application->patient->id ? 'selected' : '' ?>>
                        {{ $pat->pat_nat_id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Departments</label>
            <select name="department_id" class="form-control">
                @foreach ($departments as $dep)
                    <option value="{{ $dep->id }}" <?= $dep->id == $application->department->id ? 'selected' : '' ?>>
                        {{ $dep->dep_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>


@stop()
