<!-- resources/views/auth/forgot-password.blade.php -->
<div id="modal-forgot" class="auth-modal" role="dialog" aria-modal="true" aria-hidden="true" style="display:none;">
    <div class="auth-modal-backdrop" data-close-modal></div>
    <div class="auth-modal-panel" role="document" aria-labelledby="forgot-title">
        <button type="button" class="auth-modal-close" aria-label="Close" data-close-modal>&times;</button>
        <h2 id="forgot-title">Forgot Password</h2>

        <form method="POST" action="{{ route('password.email') }}" novalidate>
            @csrf
            <p>Enter your email and we'll send a password reset link.</p>
            <div class="input-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required />
                @error('email') <div class="input-error">{{ $message }}</div> @enderror
            </div>

            <div class="actions">
                <button type="submit" class="btn-primary">Send reset link</button>
                <button type="button" class="btn-link" data-open-modal="modal-login">Back to login</button>
            </div>
        </form>
    </div>
</div>
