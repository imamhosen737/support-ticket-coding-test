@extends('layouts.admin')
@section('title', ' Exam')
@section('admin-content')
    <main>
        <div class="container ">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class=""
                        href="{{ route('dashboard') }}">Home</a> > Update Custom Field</span>
            </div>
            <div class="card mb-3">
                <div class="card-header"><i class="fas fa-cogs"></i>Update Custom Field</div>
                <div class="card-body table-card-body p-3 mytable-body">
                    <form action="{{ route('custom-field.update', $field->id) }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Select Type <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="type" value="{{ $field->type }}"
                                            class="form-control custom-form-control form-control-sm shadow-none @error('type') is-invalid @enderror"
                                            id="type">
                                            <option value="" selected disabled>Select One</option>
                                            <option value="text" {{ $field->type == 'text' ? 'selected' : '' }}>String
                                            </option>
                                            <option value="number" {{ $field->type == 'number' ? 'selected' : '' }}>Number
                                            </option>
                                            <option value="boolean" {{ $field->type == 'boolean' ? 'selected' : '' }}>
                                                CheckBox</option>
                                            <option value="date" {{ $field->type == 'date' ? 'selected' : '' }}>Date
                                            </option>
                                        </select>
                                        @error('type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Title</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="title" id="title" value="{{ $field->title }}"
                                            class="form-control custom-form-control @error('title') is-invalid @enderror">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary float-right" value="Submit">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
