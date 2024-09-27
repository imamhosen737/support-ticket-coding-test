<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Admin Login | @isset($contact->name)
            {{ $contact->name }}
        @endisset
    </title>
    <!-- bootstrap 5.0-->
    <link rel="stylesheet" href="{{ asset('website/css/bootstrap.min.css') }}">
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('admin/css/login.css') }}">
</head>

<body>

    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3 col-12">
                    <div class="text-center">
                        <div class="center mt-md-5 pt-5">
                            <img src="@isset($contact->image){{ asset($contact->image) }} @endisset"
                                alt="" class="login-image">
                        </div>
                        <div class="center login-company-title">
                            <div>
                                @isset($contact->name)
                                    {{ $contact->name }}
                                @endisset
                            </div>
                        </div>
                        <div class="card">
                            <div class="custom-card-header">
                                <a href="#" class="forget-password-title"
                                    onclick="return confirm('Under Construction')">Forgot Password?</a>
                                <a href="#" class="need-help-title"
                                    onclick="return confirm('Under Construction')">Need Help?</a>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('admin-login.check') }}" method="POST">
                                    @csrf
                                    <div class="row row-cols-1 g-2">
                                        <div class="col py-0 my-0">
                                            <div class="text-start fill-up">
                                                <i>Fill-up account information</i>
                                            </div>
                                            <div>
                                                @if (session('error'))
                                                    <div class="text-center">
                                                        <div class="text-danger" style="font-size: 12px">
                                                            {{ session('error') }}</div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col">
                                            <input type="text"
                                                class="form-control form-control-sm custom-field @error('username') is-invalid @enderror"
                                                id="username" name="username" placeholder="Enter Username"
                                                autocomplete="on" value="{{ old('username') }}">
                                            @error('username')
                                                <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <input type="password"
                                                class="form-control form-control-sm custom-field @error('password') is-invalid @enderror"
                                                placeholder="Enter Your Password" id="password" name="password"
                                                autocomplete="on">
                                            @error('password')
                                                <span class="text-danger" style="font-size: 12px">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <button type="submit"
                                                class="form-control form-control-sm submit-button">Login
                                                Request</button>
                                        </div>
                                        <div class="col">
                                            <div class="or-class">
                                                or
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="login-page-register-link"><a href="#"
                                                    onclick="return confirm('Under Connstruction!')">REGISTER?</a></div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Notice Scrolling -->
    <section style="position: fixed;bottom:0px;left:0px;right:0px">
        <div class="alert alert-primary w-100 py-1 my-0" role="alert">
            <strong>N.B: username :</strong> admin@gmail.com, <strong>password :</strong> 12345678
            (Before update password)
        </div>
    </section>
    <!-- Close notice Scrolling -->
</body>

</html>
