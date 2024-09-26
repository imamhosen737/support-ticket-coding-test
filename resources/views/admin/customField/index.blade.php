@extends('layouts.admin')
@section('title', 'Manage Custom Field')
@section('admin-content')
    <main class="mb-5">
        <div class="container ">
            <div class="heading-title p-2 my-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Manage
                    Custom Field</span>
            </div>
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="table-head"><i class="fas fa-cogs me-1"></i>Add Custom Field Form</div>
                        </div>
                        <div class="card-body table-card-body p-3">
                            <form action="{{ route('custom-field.store') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <label for="name"> Select Type <span class="text-danger">*</span> </label>
                                        <select name="type" value="{{ old('name') }}"
                                            class="form-control custom-form-control form-control-sm shadow-none @error('type') is-invalid @enderror"
                                            id="type">
                                            <option value="" selected disabled>Select One</option>
                                            <option value="text" {{ old('type') == 'text' ? 'selected' : '' }}>String
                                            </option>
                                            <option value="number" {{ old('type') == 'number' ? 'selected' : '' }}>Number
                                            </option>
                                            <option value="boolean" {{ old('type') == 'boolean' ? 'selected' : '' }}>
                                                CheckBox</option>
                                            <option value="date" {{ old('type') == 'date' ? 'selected' : '' }}>Date
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
                                    <div class="col-md-12 mb-2">
                                        <label for="title"> title <span class="text-danger">*</span> </label>
                                        <input type="text" name="title" value="{{ old('title') }}"
                                            class="form-control custom-form-control form-control-sm shadow-none @error('title') is-invalid @enderror"
                                            id="title" placeholder="Enter title">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12 mt-md-0 mt-2">
                    <div class="card">
                        <div class="card-header">
                            <div class="table-head"><i class="fas fa-table me-1"></i>Custom Field List</div>
                        </div>
                        <div class="card-body table-card-body p-3">
                            <table id="datatablesSimple">
                                <thead class="text-center bg-light">
                                    <tr>
                                        <th>SL</th>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($field as $key => $item)
                                        <tr>
                                            <td class="text-center">{{ $key + 1 }}</td>
                                            <td>{{ $item->title }}</td>
                                            <td>{{ $item->type }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('custom-field.edit', $item->id) }}"
                                                    class="btn btn-edit"><i class="fas fa-pencil-alt"></i></a>
                                                <button type="submit" class="btn btn-delete"
                                                    onclick="deleteUser({{ $item->id }})"><i
                                                        class="far fa-trash-alt"></i></button>
                                                <form id="delete-form-{{ $item->id }}"
                                                    action="{{ route('custom-field.destroy', $item->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No Data Found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('admin-js')
    <script src="{{ asset('admin/js/sweetalert2.all.js') }}"></script>
    <script>
        function deleteUser(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to Delete this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
