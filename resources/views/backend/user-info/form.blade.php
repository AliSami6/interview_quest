@extends('backend.layouts.backend')

<!-- internal css -->
@push('styles')
@endpush
@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="card-title mb-0 d-flex justify-content-between">New User Info
                <a href="{{ route('user.info.index') }}" class="btn btn-sm btn-outline-secondary">Back</a>
            </h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-8 mx-auto">

                    <form
                        action="{{ isset($user_info) ? route('user.info.update', $user_info->id) : route('user.info.store') }}"
                        method="POST">
                        @csrf
                        @isset($update_user_info)
                            <input type="hidden" id="update_id" name="update_id" value="{{ $update_user_info->id }}">
                        @endisset
                        <div class="mb-3">
                            <label for="name" class="form-label"> Name</label>
                            <input type="text" name="name" class="form-control" id="name"
                                value="{{ $update_user_info->name ?? old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label"> Email</label>
                            <input type="email" name="email" class="form-control" id="email"
                                value="{{ $update_user_info->email ?? old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                         

                        <div class="mb-3">


                            <label for="other_info" class="form-label"> Other Info</label>


                        </div>
                          @isset($update_user_info)
                           @php
                                                $other_infos = json_decode($update_user_info->other_info);
                                              
                           @endphp
                        <div id="inputFormRow">
                            <div class="input-group mb-3">
                               <input type="text" name="other_info[]" value="{{$update_user_info->other_info ?? old('other_info') }}" class="form-control"
                                    autocomplete="off">
                                <div class="input-group-append">
                                    <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                </div>
                            </div>
                        </div>
                        @endisset
                        <div id="newRow"></div>
                        <button id="addRow" type="button" class="btn btn-info">Add Info</button>

                        <div class="text-end">
                            @if (isset($update_user_info))
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            @else
                                <button type="submit" class="btn btn-sm btn-primary">Create</button>
                            @endif


                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $("#addRow").click(function() {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html +=
                '<input type="text" name="other_info[]" class="form-control m-input"  autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function() {
            $(this).closest('#inputFormRow').remove();
        })
    </script>
@endpush
