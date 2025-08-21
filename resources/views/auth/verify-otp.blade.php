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
                        <p>Didn't receive the code? <a href="{{ route('register') }}">Try again</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>