<!-- resources/views/auth/register.blade.php -->
<div id="modal-register" class="auth-modal" role="dialog" aria-modal="true" aria-hidden="true" style="display:none;">
    <div class="auth-modal-backdrop" data-close-modal></div>
    <div class="auth-modal-panel" role="document" aria-labelledby="register-title">
        <button type="button" class="auth-modal-close" aria-label="Close" data-close-modal>&times;</button>
        <h2 id="register-title">Register</h2>

        <form method="POST" action="{{ route('register') }}" novalidate>
            @csrf
            <div class="input-group">
                <label for="name">Full name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required />
                @error('name') <div class="input-error">{{ $message }}</div> @enderror
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required />
                @error('email') <div class="input-error">{{ $message }}</div> @enderror
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required />
                @error('password') <div class="input-error">{{ $message }}</div> @enderror
            </div>

            <div class="input-group">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required />
            </div>

            <div class="actions">
                <button type="submit" class="btn-primary">Create account</button>
                <button type="button" class="btn-link" data-open-modal="modal-login">Already have an account?</button>
            </div>
        </form>
    </div>
</div>
