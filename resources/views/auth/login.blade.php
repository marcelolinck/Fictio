<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/assets/vendors/dripicons/webfont.css') }}">
    <link rel="stylesheet" href="{{ asset('/admin/assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/pages/auth.css') }}">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-6">
                <div id="auth-left">
                    <div class="auth-title">
                    <h1> 
                        <a href="/"><span class="icon dripicons-graph-pie"></span>{{ config('app.name', 'Laravel') }}</a>
                    </h1>
                    </div>
                    <p class="auth-subtitle mb-5">Efetue o login para acessar o painel Admin</p>

                     <form method="POST" action="{{ route('login') }}">
                     @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="email" type="email" class="form-control form-control-xl" placeholder="E-mail"
                                name="email" :value="old('email')" required autofocus>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="password" type="password" name="password" class="form-control form-control-xl"
                                placeholder="Password" required autocomplete="current-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Mantenha-me logado
                            </label>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>

                         {{-- @if (!empty($errors))
                            <div class="alert alert-danger"><i class="icon dripicons-checkmark"></i>{{$errors}}</div>
                        @endif --}}
                        
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        @if($errors->any())

                            <ul class="list-group">

                                @foreach($errors->all() as $error)

                                <li class="list-group-item list-group-item-danger">{{$error}}</li>

                                @endforeach

                            </ul>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-6 d-none d-lg-block">
                <div id="auth-right">
                    
                </div>
            </div>
        </div>

    </div>
    
</body>

</html>
