<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Verify Email - HRMS-APP</title>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet">
</head>
<body>
	<!-- OTP Verification Modal -->
	<div class="modal fade" id="modal-verify-otp" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
		<div class="modal-dialog d-flex justify-content-center">
			<div class="modal-content w-75">
				<div class="modal-header">
					<h5 class="modal-title" id="otpModalLabel">Verify Email</h5>
					<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body p-4">
					@if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif

					<form method="POST" action="{{ route('verify.otp') }}">
						@csrf
						<p class="text-muted mb-4">Please enter the verification code sent to your email.</p>

						<!-- OTP input -->
						<div data-mdb-input-init class="form-outline mb-4">
							<input type="text" id="otp" name="otp" class="form-control"
							       required maxlength="6" minlength="6" pattern="\d{6}"
							       inputmode="numeric" autocomplete="one-time-code" />
							<label class="form-label" for="otp">6-digit verification code</label>
							@error('otp') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
						</div>

						<!-- Submit button -->
						<button type="submit" data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Verify Email</button>

						<div class="text-center">
							<p>Didn't receive the code? <a href="{{ url('/') }}">Try again</a></p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			var modalEl = document.getElementById('modal-verify-otp');
			if (modalEl && window.mdb && window.mdb.Modal) {
				new mdb.Modal(modalEl).show();
			}
		});
	</script>
</body>
</html>