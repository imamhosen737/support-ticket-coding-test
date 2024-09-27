@extends('layouts.admin')
@section('title', 'Update Ticket')
@section('admin-content')
    @php

    @endphp
    <main>
        <div class="container ">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a href="{{ route('dashboard') }}">Home</a> > Ticket >
                    Update Ticket
                </span>
            </div>
            <div class="card mb-3">
                <div class="card-header"><i class="fas fa-icon-ticket"></i> Ticket Update Form</div>
                <div class="card-body table-card-body p-3 mytable-body">

                    <form id="customer_form" action="{{ route('update.ticket', $update_data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="hidden" id="method_type" value="post">
                        <input type="hidden" id="customer_id" name="customer_id" value="{{ $update_data->customer_id }}">
                        <input type="hidden" id="customer_name" name="customer_name" value="{{ $update_data->customer_name }}">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label><b>Subject</b></label>
                                    </div>
                                    <div class="col-md-1 text-right">
                                        <span class="clone"><b>:</b></span>
                                    </div>
                                    <div class="col-md-7">
                                        <input type="text" name="subject"
                                            value="{{ old('subject', $update_data->subject) }}"
                                            class="form-control my-form-control @error('subject') is-invalid @enderror"
                                            id="subject">
                                        @error('subject')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label><b>Description</b></label>
                                    </div>
                                    <div class="col-md-1 text-right">
                                        <span class="clone"><b>:</b></span>
                                    </div>

                                    <div class="col-md-7">
                                        <textarea name="description" rows="3"
                                            class="form-control my-form-control @error('description') is-invalid @enderror">{{ old('description', $update_data->description) }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="col-md-4">
                                        <label><b>Priority Level</b></label>
                                    </div>
                                    <div class="col-md-1 text-right">
                                        <span class="clone"><b>:</b></span>
                                    </div>
                                    <div class="col-md-7">
                                        <select name="priority_level" id="priority_level"
                                            class="form-control my-form-control @error('priority_level') is-invalid @enderror">
                                            <option value="Low"
                                                {{ old('priority_level', $update_data->priority_level) == 'Low' ? 'selected' : '' }}>
                                                Low</option>
                                            <option value="Medium"
                                                {{ old('priority_level', $update_data->priority_level) == 'Medium' ? 'selected' : '' }}>
                                                Medium</option>
                                            <option value="Urgent"
                                                {{ old('priority_level', $update_data->priority_level) == 'Urgent' ? 'selected' : '' }}>
                                                Urgent</option>
                                        </select>
                                        @error('priority_level')
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
                                        <label><b>Attachment</b> </label>
                                    </div>
                                    <div class="col-md-1 text-right">
                                        <span class="clone"><b>:</b></span>
                                    </div>
                                    <div class="col-md-5 col-12">
                                        <input type="file"
                                            class="form-control my-form-control  @error('attachment') is-invalid @enderror"
                                            id="attachment" name="attachment" onchange="readURL(this);">
                                        <strong><span class="text-danger" id="imageError"></span></strong>
                                    </div>
                                    <div class="col-md-2 ps-0 col-4">
                                        <img class="form-controlo img-thumbnail w-100"
                                            src="{{ $update_data->attachment ? asset('public/tickets/' . $update_data->attachment) : '#' }}"
                                            id="previewImage" style="height:80px; background: #3f4a49;"
                                            alt="Attachment Preview">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" id="submit-btn"
                                            class="btn btn-primary btn-sm mt-2 float-right submit-btn"
                                            value="Submit">Save</button>
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
            "{{ isset($update_data->attachment) ? asset($update_data->attachment) : asset('noimage.png') }}";
    </script>
@endpush
