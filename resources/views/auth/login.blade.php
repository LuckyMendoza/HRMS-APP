<!-- resources/views/auth/login.blade.php -->
<!-- Login Modal -->
<div class="modal fade" id="modal-login" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center">
        <div class="modal-content w-75">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Sign in</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required />
                        <label class="form-label" for="email">Email address</label>
                        @error('email') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" id="password" name="password" class="form-control" required />
                        <label class="form-label" for="password">Password</label>
                        @error('password') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

                    <!-- Remember me checkbox -->
                    <div class="row mb-4">
                        <div class="col-md-6 d-flex justify-content-start">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <a href="#" data-mdb-modal-init data-mdb-target="#modal-forgot">Forgot password?</a>
                        </div>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Sign in</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>Not a member? <a href="#" data-mdb-modal-init data-mdb-target="#modal-register">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



