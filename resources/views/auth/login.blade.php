@extends('layouts.app')

@section('content')


<div class="wrapper mb-3">
	<div class="authentication-header"></div>
	<div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
		<div class="container-fluid">
			<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
				<div class="col mx-auto">
					
					<div class="card">
						<div class="card-body">
							<div class="p-4 rounded">
								<div class="text-center">
									<h3 class="">{{ __('Logiowanie') }}</h3>
									<p>Nie masz konta? <a href="/register">Załóż je teraz</a></p>
								</div>
								<div class="d-grid">
									<a class="btn my-4 shadow-sm btn-white" href="/login/google"> <span class="d-flex justify-content-center align-items-center">
										<img class="me-2" src="assets/images/icons/search.svg" width="16" alt="Image Description">                                    
											<span>Zaloguj przez Google</span>
									</a> 
									<a href="/login/facebook" class="btn btn-facebook">
										<i class="bx bxl-facebook"></i>Zaloguj przez Facebook
									</a>
									</div>
									<div class="login-separater text-center mb-4"> <span>lub tradycyjnie przez adres e-mail</span>
										<hr/>
									</div>
									<div class="form-body">
									<form method="POST" action="{{ route('login') }}">
						@csrf

						<div class="mb-3">
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adres E-Mail') }}</label>

							
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							
						</div>

						<div class="mb-3 ">
								<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Hasło') }}</label>
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-check form-switch">
									<input class="form-check-input" type="checkbox name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} >
									<label class="form-check-label" for="flexSwitchCheckChecked">Zapamiętaj mnie</label>
								</div>
							</div>
							<div class="col-md-6 text-end">	
												@if (Route::has('password.request'))
										<a  href="{{ route('password.request') }}">
											{{ __('Zapomniałeś hasła?') }}
										</a>
									@endif
												
							</div>
						</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Zaloguj się</button>
												</div>
											</div>

								
							</div>
						</div>
							</div>
						</div>


					</form>
					
				<!--end row-->
			</div>
		</div>
	</div>
		</div>
		</div>
	<!--end wrapper-->















				
@endsection
