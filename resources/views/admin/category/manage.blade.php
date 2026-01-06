@extends('admin.dashboard')

@section('title', 'Manage Category')

@section('admin_layout')
<div class="container-fluid mt-4">

    <div class="d-flex justify-content-between mb-3">
        <h4>Manage Categories</h4>
        <a href="{{ route('admin.category.create') }}" class="btn btn-primary" style="margin:30px">
            + Add Category
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th width="180">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $key => $category)
                        <tr>
                            <td>{{ $categories->firstItem() + $key }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                @if($category->status == 1)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                   class="btn btn-sm btn-warning">
                                   Edit
                                </a>

                                <form action="{{ route('admin.category.delete', $category->id) }}"
                                      method="POST"
                                      style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure?')"
                                            class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No category found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $categories->links() }}
        </div>
    </div>

</div>
@endsection
