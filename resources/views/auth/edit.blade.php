@extends('layouts.admin')
@section('title', 'Create User')
@section('admin-content')
    @php

    @endphp
    <main>
        <div class="container ">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a href="{{ route('dashboard') }}">Home</a> > Update
                    User</span>
            </div>
            <div class="card mb-3">
                <div class="card-header"><i class="fas fa-user-plus"></i>User Form</div>
                <div class="card-body table-card-body p-3 mytable-body">
                    <form id="customer_form" action="{{ route('user.update') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <input type="hidden" id="method_type" value="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label> Name </label>
                                    </div>
                                    <div class="col-md-1 text-right">
                                        <span class="clone">:</span>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" name="name" value="{{ $user->name }}"
                                            class="form-control my-form-control @error('name') is-invalid @enderror "
                                            id="name">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label>Email </label>
                                    </div>
                                    <div class="col-md-1 text-right">
                                        <span class="clone">:</span>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="email" name="email" value="{{ $user->email }}"
                                            class="form-control my-form-control  @error('email') is-invalid @enderror">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label>Username </label>
                                    </div>
                                    <div class="col-md-1 text-right">
                                        <span class="clone">:</span>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" name="username" value="{{ $user->username }}"
                                            autocomplete="off"
                                            class="form-control my-form-control  @error('username') is-invalid @enderror"
                                            readonly>
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row right-row">
                                    <div class="col-md-4 col-12">
                                        <label>Image </label>
                                    </div>
                                    <div class="col-md-1 text-right">
                                        <span class="clone">:</span>
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <input type="file"
                                            class="form-control my-form-control  @error('image') is-invalid @enderror"
                                            id="image" name="image" onchange="readURL(this);">
                                        <strong><span class="text-danger" id="imageError"></span></strong>
                                    </div>
                                    <div class="col-md-2 ps-0 col-4">
                                        <img class="form-controlo img-thumbnail w-100" src="#" id="previewImage"
                                            style="height:80px; background: #3f4a49;">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" id="submit-btn"
                                            class="btn btn-primary btn-sm mt-2 float-right submit-btn"
                                            value="Submit">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('admin-js')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#previewImage')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        document.getElementById("previewImage").src =
            "{{ isset($user->image) ? asset($user->image) : asset('noimage.png') }}";
    </script>
@endpush
