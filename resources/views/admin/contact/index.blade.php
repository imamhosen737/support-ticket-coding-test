@extends('layouts.admin')
@section('title', 'Contact Us Update')
@push('admin-css')
@endpush
@section('admin-content')
    <main>
        <div class="container">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class=""
                        href="{{ route('dashboard') }}">Home</a> >Contact Us Update</span>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header py-1"><span style="font-size: 14px;font-weight: 600;color: #0e2c96;">Edit
                                Product</span> </div>
                        <div class="card-body table-card-body my-table">
                            <form action="{{ route('contact-us.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong><label>Address</label><span class="color-red">*</span> <span
                                                        class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8 mt-1">

                                                <textarea name="address" class="form-control" id="address" cols="30" rows="3">{{ $contact->address }}</textarea>
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <strong><label>Name</label><span class="color-red">*</span> <span
                                                        class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="name" value="{{ $contact->name }}"
                                                    placeholder="Welcome Note"
                                                    class="form-control my-form-control @error('name') is-invalid @enderror">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <strong><label>Welcome Note</label><span class="color-red">*</span> <span
                                                        class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="slogan" value="{{ $contact->slogan }}"
                                                    placeholder="Welcome Note"
                                                    class="form-control my-form-control @error('slogan') is-invalid @enderror">
                                                @error('slogan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <strong><label>Phone</label><span class="color-red">*</span> <span
                                                        class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" name="phone" value="{{ $contact->phone }}"
                                                    placeholder="Phone"
                                                    class="form-control my-form-control @error('name') is-invalid @enderror">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <strong><label>Email</label><span class="color-red">*</span> <span
                                                        class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="email" name="email" value="{{ $contact->email }}"
                                                    placeholder="Email"
                                                    class="form-control my-form-control @error('email') is-invalid @enderror">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <strong><label>Facebook</label><span class="color-red">*</span> <span
                                                        class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="url" name="facebook" value="{{ $contact->facebook }}"
                                                    placeholder="facebook url"
                                                    class="form-control my-form-control @error('facebook') is-invalid @enderror">
                                                @error('facebook')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <strong><label>Twitter</label><span class="color-red">*</span> <span
                                                        class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="url" name="twitter" value="{{ $contact->twitter }}"
                                                    placeholder="Twitter url"
                                                    class="form-control my-form-control @error('twitter') is-invalid @enderror">
                                                @error('twitter')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-md-4">
                                                <strong><label>Linkedin</label><span class="color-red">*</span> <span
                                                        class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="url" name="linkedin" value="{{ $contact->linkedin }}"
                                                    placeholder="Linkedin url"
                                                    class="form-control my-form-control @error('linkedin') is-invalid @enderror">
                                                @error('linkedin')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <strong><label>Youtube</label><span class="color-red">*</span> <span
                                                        class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="url" name="youtube" value="{{ $contact->youtube }}"
                                                    placeholder="Youtube url"
                                                    class="form-control my-form-control @error('youtube') is-invalid @enderror">
                                                @error('youtube')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <strong><label>Instagram</label><span class="color-red">*</span> <span
                                                        class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="url" name="instagram" value="{{ $contact->instagram }}"
                                                    placeholder="Instagram url"
                                                    class="form-control my-form-control @error('name') is-invalid @enderror">
                                                @error('instagram')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <strong><label>Google Map Link</label><span class="color-red">*</span>
                                                    <span class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="url" name="map" value="{{ $contact->map }}"
                                                    placeholder="Google Map Link"
                                                    class="form-control my-form-control @error('name') is-invalid @enderror">
                                                @error('map')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4">
                                                <strong><label>Logo</label> <span class="my-label">:</span> </strong>
                                            </div>
                                            <div class="col-md-5 mt-1">
                                                <input name="image" type="file"
                                                    class="form-control form-control-sm @error('image') is-invalid @enderror"
                                                    id="image" type="file" onchange="readURL(this);">
                                                @error('image')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <span>N.B: 100 X 50 px</span>
                                            </div>
                                            <div class="col-md-3 mt-1">
                                                <img class="form-controlo img-thumbnail" src="" id="previewImage"
                                                    style="width: 100px;height: 80px; background: #3f4a49;">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit"
                                            class="btn btn-primary btn-sm float-right mt-2">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    @endsection
    @push('admin-js')
        <!-- image -->
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
            document.getElementById("previewImage").src = "{{ asset($contact->image) }}";
        </script>
        <!-- close Image -->
    @endpush
