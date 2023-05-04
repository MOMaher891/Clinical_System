@extends('Admin.layout')

@section('content')

    <h2 class="my-4 text-secondary">Add New Doctor</h2>
    <form method="post" action="{{ route('doctor.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <input type="hidden" class="form-control" name="id" value="{{ $doctor['id'] }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Doctor Name</label>
            <input type="text" class="form-control" name="doc_name" value="{{ $doctor['doc_name'] }}">
            @error('doc_name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Doctor Position</label>
            <input type="text" class="form-control" name="doc_position" value="{{ $doctor['doc_position'] }}">
            @error('doc_position')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Doctor Image</label>
            <input type="file" class="form-control" name="doc_image" value="{{ $doctor['doc_image'] }}">
            @error('doc_image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <select name="doc_gender" class="form-control">
                <option value="0" @if ($doctor->doc_gender == 'Male') selected @endif>Male</option>
                <option value="1" @if ($doctor->doc_gender == 'Female') selected @endif>Female</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@stop()
