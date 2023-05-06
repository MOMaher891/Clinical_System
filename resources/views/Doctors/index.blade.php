@extends('Doctors.layout')

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

<h2 class="my-4 text-secondary">Add New Medical Statment</h2>
<form method="post" action="{{ route('doctor.medical.state') }}">
    @csrf
    <div class="mb-3">
        <label for="">Patient</label>
        <select name="patient_id" class="form-control">
            @foreach ($patients as $patient)
                <option value="{{$patient->id}}">{{$patient->pat_name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="">Notes</label>
        <textarea name="note" id="note"  class="note"  cols="30" rows="10"></textarea>
        
       
    </div>
    
    <button type="submit" class="btn btn-success">Save</button>
</form>

@stop

@section('scripts')
<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'note');

</script>
@endsection