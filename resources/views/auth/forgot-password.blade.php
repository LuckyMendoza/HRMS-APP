<!-- resources/views/auth/forgot-password.blade.php -->
<!-- Forgot Password Modal -->
<div class="modal fade" id="modal-forgot" tabindex="-1" aria-labelledby="forgotModalLabel" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center">
        <div class="modal-content w-75">
            <div class="modal-header">
                <h5 class="modal-title" id="forgotModalLabel">Reset Password</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <p class="text-muted mb-4">Enter your email and we'll send you instructions to reset your password.</p>

                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required />
                        <label class="form-label" for="email">Email address</label>
                        @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- Submit button -->
                    <button type="submit" data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Send Reset Link</button>

                    <!-- Back to login -->
                    <div class="text-center">
                        <p>Remember your password? <a href="#" data-mdb-modal-init data-mdb-target="#modal-login">Back to login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
