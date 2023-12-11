{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Reset Password') }}
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
 
     <title>NHMARS - Log in </title>
   
     <!-- Vendors Style-->
     <link rel="stylesheet" href="{{asset('css/vendors_css.css')}}">
       
     <!-- Style-->    
     <link rel="stylesheet" href="{{asset('css/horizontal-menu.css')}}"> 
     <link rel="stylesheet" href="{{asset('css/style.css')}}">
     <link rel="stylesheet" href="{{asset('css/skin_color.css')}}">
     
 
 </head>
     
 <body class="hold-transition theme-primary bg-img" style="background-image: url(../images/auth-bg/bg-1.jpg)">
     
     <div class="container h-p100">
         <div class="row align-items-center justify-content-md-center h-p100">	
             
             <div class="col-12">
                 <div class="row justify-content-center g-0">
                     <div class="col-lg-5 col-md-5 col-12">
                         <div class="bg-white rounded10 shadow-lg">
                             <div class="content-top-agile p-20 pb-0">
                                 <h2 class="text-primary">Reset Password</h2>
                                 {{-- <p class="mb-0">Reset Password to continue to NHMARS.</p>							 --}}
                             </div>
                             <div class="p-40">
                                 <x-validation-errors class="mb-4" style="color:red" />
                                 {{-- @if (session('status'))
                                 <div class="mb-4 font-medium text-sm text-green-600">
                                     {{ session('status') }}
                                 </div>
                             @endif --}}
                             <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                    
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                     <div class="form-group">
                                         <div class="input-group mb-3">
                                             <span class="input-group-text bg-transparent"><i class="ti-user"></i></span>
                                             <input type="text" id="email" class="form-control ps-15 bg-transparent" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" placeholder="Email">
                                         </div>
                                     </div>
                                     <div class="form-group">
                                         <div class="input-group mb-3">
                                             <span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
                                             <input class="form-control ps-15 bg-transparent" id="password" type="password" placeholder="Password"name="password" required autocomplete="current-password">
                                         </div>
                                     </div>
                                     <div class="form-group">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text  bg-transparent"><i class="ti-lock"></i></span>
                                            <input class="form-control ps-15 bg-transparent" type="password" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                       <div class="row">
                                         <div class="col-6">
                                           {{-- <div class="checkbox">
                                             <input type="checkbox" id="remember_me" name="remember" >
                                             <label for="basic_checkbox_1">Remember Me</label>
                                           </div> --}}
                                         </div>
                                         <!-- /.col -->
                                         <div class="col-6">
                                          {{-- <div class="fog-pwd text-end">
                                             <a href="{{ route('password.request') }}" class="hover-warning"><i class="ion ion-locked"></i> Forgot pwd?</a><br>
                                           </div> --}}
                                         </div>
                                         <!-- /.col -->
                                         <div class="col-12 text-center">
                                           <button type="submit" class="btn btn-dark mt-10">Reset Password</button>
                                         </div>
                                         <!-- /.col -->
                                       </div>
                                 </form>	
                                 {{-- <div class="text-center">
                                     <p class="mt-15 mb-0">Don't have an account? <a href="auth_register.html" class="text-warning ms-5">Sign Up</a></p>
                                 </div>	 --}}
                             </div>						
                         </div>
                         {{-- <div class="text-center">
                           <p class="mt-20 text-white">- Sign With -</p>
                           <p class="gap-items-2 mb-20">
                               <a class="btn btn-social-icon btn-round btn-facebook" href=""><i class="fa fa-facebook"></i></a>
                               <a class="btn btn-social-icon btn-round btn-twitter" href=""><i class="fa fa-twitter"></i></a>
                               <a class="btn btn-social-icon btn-round btn-instagram" href=""><i class="fa fa-instagram"></i></a>
                             </p>	
                         </div> --}}
                     </div>
                 </div>
             </div>
         </div>
     </div>
 
 
     <!-- Vendor JS -->
     <script src="{{asset('assets/js/pages/vendors.min.js')}}"></script>
     <script src="{{asset('assets/js/pages/chat-popup.js')}}"></script>
     <script src="{{asset('assets/icons/feather-icons/feather.min.js')}}"></script>	
 
 </body>
 </html>
 
