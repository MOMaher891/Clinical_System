@extends('Admin.layout')

@section('content')

    <h2 class="my-4 text-secondary">Update Department</h2>
    <form method="post" action="{{ route('department.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="hidden" class="form-control" name="id" value="{{ $department['id'] }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Department Name</label>
            <input type="text" class="form-control" name="dep_name" value="{{ $department['dep_name'] }}">
            @error('dep_name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Department Price</label>
            <input type="text" class="form-control" name="dep_price" value="{{ $department['dep_price'] }}">
            @error('dep_price')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Department Image</label>
            <input type="file" class="form-control" name="dep_image" value="{{ $department['dep_image'] }}">
            @error('dep_image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Days</label>
            <select class="form-control" name="day_id[]" multiple
                value="@foreach ($department->days as $select_day) {{ $select_day->day }} @endforeach">
                @foreach ($days as $day)
                    <option value="{{ $day->id }}">{{ $day->day }}</option>
                @endforeach
            </select>
            @error('days')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Department Position</label>
            <input type="text" class="form-control" name="dep_rate" value="{{ $department['dep_rate'] }}">
            @error('dep_rate')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@stop()
