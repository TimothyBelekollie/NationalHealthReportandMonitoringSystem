{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
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

    {{-- <title>EduAdmin - Recover Password</title> --}}
    <title>NHMARS - Recover Password </title>
  
<!-- Vendors Style-->
<link rel="stylesheet" href="{{asset('css/vendors_css.css')}}">
	  
<!-- Style-->    
<link rel="stylesheet" href="{{asset('css/horizontal-menu.css')}}"> 
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/skin_color.css')}}">

</head>

<body class="hold-transition theme-primary bg-img" style="background-image: url(../images/auth-bg/bg-2.jpg)">
	
	<div class="container h-p100">
		<div class="row align-items-center justify-content-md-center h-p100">
			
			<div class="col-12">
				<div class="row justify-content-center g-0">
					<div class="col-lg-5 col-md-5 col-12">						
						<div class="bg-white rounded10 shadow-lg">
							<div class="content-top-agile p-20 pb-0">
								<h3 class="mb-0 text-primary">Recover Password</h3>								
							</div>
							<div class="p-40">
                                @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600" style="color:green">
                                    {{ session('status') }}
                                </div>
                            @endif
                    
                            <x-validation-errors class="mb-4" style="color:green" />
								<form method="POST" action="{{ route('password.email') }}">
                                    @csrf
									<div class="form-group">
										<div class="input-group mb-3">
											<span class="input-group-text bg-transparent"><i class="ti-email"></i></span>
											<input type="email" class="form-control ps-15 bg-transparent" placeholder="Your Email" name="email" :value="old('email')" id="email">
										</div>
									</div>
									  <div class="row">
										<div class="col-12 text-center">
										  <button type="submit" class="btn btn-info margin-top-10">Reset</button>
										</div>
										<!-- /.col -->
									  </div>
								</form>	
							</div>
						</div>
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
