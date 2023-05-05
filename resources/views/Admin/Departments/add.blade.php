@extends('Admin.layout')

@section('content')

    <h2 class="my-4 text-secondary">Add New Department</h2>
    <form method="post" action="{{ route('department.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Department Name</label>
            <input type="text" class="form-control" name="dep_name" value="{{ old('dep_name') }}">
            @error('dep_name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Department Price</label>
            <input type="text" class="form-control" name="dep_price" value="{{ old('dep_price') }}">
            @error('dep_price')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Department Image</label>
            <input type="file" class="form-control" name="dep_image">
            @error('dep_image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Days</label>
            <select class="form-control" name="day_id[]" multiple>
                @foreach ($days as $day)
                    <option value="{{ $day->id }}">{{ $day->day }}</option>
                @endforeach()
            </select>
            @error('days')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Department Rate</label>
            <input type="text" class="form-control" name="dep_rate" value="{{ old('dep_rate') }}">
            @error('dep_rate')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@stop()
