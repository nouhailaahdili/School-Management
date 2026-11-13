@extends('layout')

@section('content')

<h3>Add Student</h3>

<form method="POST"
      action="{{ route('students.store') }}"
      enctype="multipart/form-data">

    @csrf

    <div>
        <label>Name:</label>
        <input type="text" name="name" required>
    </div>

    <div>
        <label>Email:</label>
        <input type="email" name="email" required>
    </div>

    <div>
        <label>Phone:</label>
        <input type="text" name="phone" required>
    </div>

    <div>
        <label>Section:</label>
        <input type="text" name="section" required>
    </div>

    <div>
        <label>Image:</label>
        <input type="file" name="image" accept="image/*">
    </div>

    <button type="submit">Add Student</button>

</form>

@endsection