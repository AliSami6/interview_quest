@extends('backend.layouts.backend')

<!-- internal css -->
@push('styles')
    
@endpush
@section('content')
<div class="card">
    <div class="card-header">
            <h4 class="card-title mb-0 d-flex justify-content-between">User Info List
                <a href="{{ route('user.info.create') }}" class="btn btn-sm btn-outline-primary">Add User Info</a>
            </h4>
    </div>
     <div class="card-body px-0">
        <div class="row">
            <table class="table table-sm table-striped table-hover table-bordered-primary pt-2 mt-3" id="example">
                <thead>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email </th>
                    <th>Other Info </th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @forelse ($user_info as $value)
                        <tr>
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->other_info }}</td>
                            
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('user.info.edit',$value->id) }}" class="btn btn-sm btn-info me-1">Edit</a>
                                    <form id="delete-form-{{ $value->id }}" action="{{ route('user.info.delete',$value->id) }}" method="POST">
                                     @csrf
                                     @method('DELETE')

                                    </form>
                                      <button type="button" onclick="alert_message({{ $value->id }})" class="btn btn-sm btn-danger">Delete</button>
                                </div>
                            </td>
                        </tr>
                        @empty
                       <tr>
                           <td colspan="4" class="text-danger text-center"> No data found</td>
                       </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    
@endpush