@extends('admin.dashboard')

@section('title', 'manage sub-category')

@section('admin_layout')
<table class="table">
    <thead>
        <tr>
            <th>SL</th>
            <th>Category Name</th>
            <th>Sub-Category Name</th>
            <th>Status</th>
             <th>Slug</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($subcategories as $key => $row)
        <tr>
            <td>{{ $subcategories->firstItem() + $key }}</td>
            <td>{{ $row->category->name }}</td> <td>{{ $row->name }}</td>
            <td>
                @if($row->status == 1)
                    <span class="badge badge-success">Active</span>
                @else
                    <span class="badge badge-danger">Inactive</span>
                @endif
            </td>
            <td>{{ $row->slug }}</td> 
            <td>
                <a href="{{ route('admin.subcategory.edit', $row->id) }}" class="btn btn-sm btn-info">Edit</a>
                <a href="{{ route('admin.subcategory.delete', $row->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $subcategories->links() }}
@endsection
