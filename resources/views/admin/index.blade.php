@extends('layouts.admin')
@section('title', 'Dashboard')
@section('admin-content')
    <main class="">
        <div class="container-fluid">
            <div class="heading-title p-2">
                <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> >
                    Dashboard</span>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="center">
                        <div class="company-name my-2">
                            Student Portal
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-cols-md-4 row-cols-1 mt-3 g-2">
                <div class="col">
                    <div class="card dashboard-card" style="background-color: #165669;">
                        <div class="card-body">
                            <a href="{{ route('student.index') }}" style="text-decoration:none">
                                <div class="text-center">
                                    <button type="button" class="btn position-relative" style="background-color:white">
                                        <i class="fas fa-user-graduate" style="font-size: 18px"></i>
                                    </button>
                                </div>
                                <div class="dashboard-title">
                                    Manage Students
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card dashboard-card" style="background-color: #8A0003">
                        <div class="card-body">
                            <a href="{{ route('logout') }}" style="text-decoration:none">
                                <div class="text-center">
                                    <button type="button" class="btn position-relative" style="background-color:white">
                                        <i class="fas fa-power-off text-danger" style="font-size: 18px"></i>
                                    </button>
                                </div>
                                <div class="dashboard-title">
                                    Sign Out
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </div>
    </main>
@endsection
