@extends('Admin.layout')

@section('content')

    <h2 class="my-4 text-secondary">Add New Patient</h2>
    <form method="post" action="{{ route('patient.store') }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Patient Name</label>
            <input type="text" class="form-control" name="pat_name" value="{{ old('pat_name') }}">
            @error('pat_name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">National_ID</label>
            <input type="text" class="form-control" name="pat_nat_id" value="{{ old('pat_nat_id') }}">
            @error('pat_nat_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">BirthDay</label>
            <input type="date" class="form-control" name="pat_age" value="{{ old('pat_age') }}">
            @error('pat_age')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <select name="pat_gender" class="form-control">
                <option value="0">Male</option>
                <option value="1">Female</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@stop()
