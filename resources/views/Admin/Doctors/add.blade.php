@extends('Admin.layout')

@section('content')

    <h2 class="my-4 text-secondary">Add New Doctor</h2>
    <form method="post" action="{{ route('doctor.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Doctor Name</label>
            <input type="text" class="form-control" name="doc_name" value="{{ old('doc_name') }}">
            @error('doc_name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Doctor Image</label>
            <input type="file" class="form-control" name="doc_image">
            @error('doc_image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Department</label>
            <select name="department_id" class="form-control">
                @foreach ($departments as $dep)
                    <option value="{{ $dep->id }}">{{ $dep->dep_name }}</option>
                @endforeach
            </select>
        </div>



        <div class="mb-3">
            <label class="form-label">Gender</label>
            <select name="doc_gender" class="form-control">
                <option value="0">Male</option>
                <option value="1">Female</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@stop()
