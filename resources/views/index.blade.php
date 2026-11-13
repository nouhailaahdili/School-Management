
@extends('layout')

@section('content')

<h3>Students List</h3>

<a href="{{ route('students.create') }}" class="btn btn-success mb-3">
    Add Student
</a>

<div class="table-responsive">
<table class="table table-bordered table-striped table-hover">    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Section</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{ $student->id }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->section }}</td>
<td>
    @if($student->image)
        <img src="{{ asset('image/' . $student->image) }}"
             width="80"
             height="80"
             alt="Student Image">
    @else
        No image
    @endif
</td>
            <td>
                <a href="{{ route('students.edit', $student->id) }}"
                   class="btn btn-primary btn-sm">Edit</a>

                <form action="{{ route('students.destroy', $student->id) }}"
                      method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">
                        Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>

@endsection
