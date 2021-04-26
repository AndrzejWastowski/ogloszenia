@extends('layouts.app')
@section('content')
<div class="wrapper mb-3">
	<div class="authentication-header"></div>
		<div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
			<div class="container">
				<div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
					<div class="col mx-auto">					
						<div class="card">
							<div class="card-body">
								<div class="p-4 rounded">
									<div class="text-center">
										<h3 class="">{{ __('Rejestracja') }}</h3>
										<p>Masz już konto? <a href="/login">zaloguj się</a>
										</p>
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
									<div class="login-separater text-center mb-4"> <span>załóż konto tradycyjnie</span>
										<hr/>
									</div>
									<div class="form-body">										
										<form class="row g-3" method="POST" action="{{ route('register') }}">
											@csrf
											<div class="col-sm-6">
												<label for="inputFirstName" class="form-label">Imię</label>
												<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
													@error('name')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
											</div>
											<div class="col-sm-6">
												<label for="inputLastName" class="form-label">Nazwisko</label>
												<input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

												@error('name')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
											<div class="col-12">
												<label for="inputEmailAddress" class="form-label">{{ __('Adres email') }}</label>
											
												<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

												@error('email')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
											<div class="col-12">
												<label for="inputChoosePassword" class="form-label">Podaj Hasło</label>
												<div class="input-group" id="show_hide_password">
													
													<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  value="12345678" placeholder="Wpisz hasło"  required autocomplete="new-password"><a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
d
									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror				
										

											<div class="col-12">
												<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Powtórz Hasło') }}</label>
												<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">                            
											</div>
											</div>
											</div>
											
											<div class="col-12">
												<div class="form-check form-switch">
													<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
													<label class="form-check-label" for="flexSwitchCheckChecked">Zapoznałem się z <a href="/regulamin">regulaminem portalu</a> i <a href="/polityka_prywatnosci/">polityką prywatności</a></label>
												</div>
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class='bx bx-user'></i> Zarejestruj się</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</div>
</div>
<!--end wrapper-->
@endsection
@section ('java_script')
	<!--plugins-->
<script type="text/javascript">
$(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});

</script>
	<!--Password show & hide js -->
@endsection