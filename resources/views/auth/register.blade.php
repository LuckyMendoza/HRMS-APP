<!-- resources/views/auth/login.blade.php -->
<!-- Registration Modal -->
<div class="modal fade" id="modal-register" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog d-flex justify-content-center">
        <div class="modal-content w-75">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Create Account</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Name input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required />
                        <label class="form-label" for="name">Full Name</label>
                        @error('name') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                    </div>

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

                    <!-- Confirm Password input -->
                    <div data-mdb-input-init class="form-outline mb-4">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required />
                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" data-mdb-ripple-init class="btn btn-primary btn-block mb-4">Create Account</button>

                    <!-- Login link -->
                    <div class="text-center">
                        <p>Already have an account? <a href="#" data-mdb-modal-init data-mdb-target="#modal-login">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



