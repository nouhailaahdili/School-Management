@extends('layout')

@section('content')

<h3>Edit Student</h3>

<form method="POST"
      action="{{ route('students.update', $student->id) }}"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')
    @if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

    <div>
        <label>Name:</label>
        <input type="text" name="name" value="{{ $student->name }}" required>
    </div>

    <div>
        <label>Email:</label>
        <input type="email" name="email" value="{{ $student->email }}" required>
    </div>

    <div>
        <label>Phone:</label>
        <input type="text" name="phone" value="{{ $student->phone }}" required>
    </div>

    <div>
        <label>Section:</label>
        <input type="text" name="section" value="{{ $student->section }}" required>
    </div>

    <div>
        <label>New Image:</label>
        <input type="file" name="image" accept="image/*">
    </div>

<button type="submit" class="btn btn-primary mt-2">
    Update Student
</button>
</form>

@endsection