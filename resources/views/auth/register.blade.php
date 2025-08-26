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
                    <div class="mb-3">
                        <div data-mdb-input-init class="form-outline">
                            <input type="text" id="name" name="name" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   value="{{ old('name') }}" />
                            <label class="form-label" for="name">Full Name</label>
                        </div>
                        @error('name')
                            <div class="text-danger small mt-1 mb-0">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email input -->
                    <div class="mb-3">
                        <div data-mdb-input-init class="form-outline">
                            <input type="email" id="email" name="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   value="{{ old('email') }}" />
                            <label class="form-label" for="email">Email address</label>
                        </div>
                        @error('email')
                            <div class="text-danger small mt-1 mb-0">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="mb-3">
                        <div data-mdb-input-init class="form-outline">
                            <input type="password" id="password" name="password" 
                                   class="form-control @error('password') is-invalid @enderror" />
                            <label class="form-label" for="password">Password</label>
                        </div>
                        @error('password')
                            <div class="text-danger small mt-1 mb-0">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password input -->
                    <div class="mb-3">
                        <div data-mdb-input-init class="form-outline">
                            <input type="password" id="password_confirmation" name="password_confirmation" 
                                   class="form-control @error('password_confirmation') is-invalid @enderror" />
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                        </div>
                        @error('password_confirmation')
                            <div class="text-danger small mt-1 mb-0">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit button -->
                    <button type="submit" data-mdb-ripple-init class="btn btn-primary btn-block mt-3">Create Account</button>

                    <!-- Login link -->
                    <div class="text-center mt-3">
                        <p class="mb-0">Already have an account? <a href="#" data-mdb-modal-init data-mdb-target="#modal-login">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




