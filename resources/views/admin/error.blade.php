@extends('layouts.admin')
@section('title', 'Error')
@section('admin-content')
    <section>
        <div class="container" style="min-height:75vh">
            <div class="row">
                <div class="col-12">
                    <div class="py-5">
                        <div class="alert alert-warning alert-dismissible fade show my-5" role="alert">
                            <i class="fa-solid fa-triangle-exclamation"></i>&nbsp;<strong>Ohh!</strong> Something Went Wrong
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
