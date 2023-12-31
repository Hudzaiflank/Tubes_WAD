{{-- <x-guest-layout>
  <x-authentication-card>
      <x-slot name="logo">
          <x-authentication-card-logo />
      </x-slot>

      <x-validation-errors class="mb-4" />

      @if (session('status'))
          <div class="mb-4 font-medium text-sm text-green-600">
              {{ session('status') }}
          </div>
      @endif

      <form method="POST" action="{{ route('login') }}">
          @csrf

          <div>
              <x-label for="email" value="{{ __('Email') }}" />
              <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
          </div>

          <div class="mt-4">
              <x-label for="password" value="{{ __('Password') }}" />
              <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
          </div>

          <div class="block mt-4">
              <label for="remember_me" class="flex items-center">
                  <x-checkbox id="remember_me" name="remember" />
                  <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
              </label>
          </div>

          <div class="flex items-center justify-end mt-4">
              @if (Route::has('password.request'))
                  <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                      {{ __('Forgot your password?') }}
                  </a>
              @endif

              <x-button class="ml-4">
                  {{ __('Log in') }}
              </x-button>
          </div>
      </form>
  </x-authentication-card>
</x-guest-layout> --}}




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../images/favicon.ico">

    <title>Siakad - Log in </title>
  
    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">
      
    <!-- Style-->  
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">   

</head>
<body class="hold-transition theme-primary bg-gradient-primary">
    
    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">   
            
            <div class="col-12">
                <div class="row justify-content-center no-gutters">
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="content-top-agile p-10">
                            <h2 class="text-white">Get started with Us</h2>
                            <p class="text-white-50">Sign in to start your session</p>                          
                        </div>
                        <div class="p-30 rounded30 box-shadowed b-2 b-dashed">
   
     <form method="POST" action="{{ route('login') }}">
            @csrf

        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
                </div>
       <input type="email" id="email" name="email" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Username">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
                </div>
  <input type="password" id="password" name="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Password">
            </div>
        </div>
          <div class="row">
            <div class="col-6">
              <div class="checkbox text-white">
                <input type="checkbox" id="basic_checkbox_1" >
                <label for="basic_checkbox_1">Remember Me</label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-6">
             <div class="fog-pwd text-right">
                <a href="{{ route('password.request') }}" class="text-white hover-info"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-12 text-center">
              <button type="submit" class="btn btn-info btn-rounded mt-10">SIGN IN</button>
            </div>
            <!-- /.col -->
          </div>
    </form>                                                     

    <div class="text-center text-white">
      <p class="mt-20">- Sign With -</p>
      <p class="gap-items-2 mb-20">
          <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-facebook"></i></a>
          <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-twitter"></i></a>
          <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-google-plus"></i></a>
          <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-instagram"></i></a>
        </p>    
    </div>
    
    <div class="text-center">
        <p class="mt-15 mb-0 text-white">Don't have an account? <a href="{{ route('register') }}" class="text-info ml-5">Sign Up</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Vendor JS -->
    <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>    

</body>
</html>
