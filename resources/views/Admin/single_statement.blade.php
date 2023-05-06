@extends('Admin.layout')

@section('content')
    <h5 class="my-4 text-secondary">Statment For <a href="{{ route('patient.edit', ['pat_id' => $statement->patient->id]) }}"
            style="text-decoration: none"><span class="">{{ $statement->patient->pat_name }}</span></a> from
        Doctor
        <a href="{{ route('admin.doctor.profile', ['doc_id' => $statement->doctor->id]) }}"
            style="text-decoration: none"><span class="">{{ $statement->doctor->doc_name }}</span></a>
    </h5>
    <form method="post" action="{{ route('doctor.medical.state') }}">
        <div class="mb-3">
            <label for="">Report</label>
            <textarea name="note" id="note" disabled class="note" cols="30" rows="10">{{ $statement->note }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
    </form>
@stop()

@section('scripts')
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('note');
    </script>
@endsection
