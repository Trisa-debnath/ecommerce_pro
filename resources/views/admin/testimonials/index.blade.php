@extends('admin.dashboard')

@section('title', 'manage testimonial')

@section('admin_layout')
<div class="container">
    <h2>All Testimonials</h2>
    <a href="{{ route('testimonials.create') }}" class="btn btn-primary mb-3">Add New</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Designation</th>
                <th>Comment</th>
                <th>Rating</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($testimonials as $item)
            <tr>
                <td><img src="{{ asset('home/images/'.$item->image) }}" width="50"></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->designation }}</td>
                <td>{{ Str::limit($item->comment, 50) }}</td>
                <td>{{ $item->rating }}/5</td>
                <td>
                    <form action="{{ route('testimonials.destroy', $item->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
