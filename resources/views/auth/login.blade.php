<!-- resources/views/auth/login.blade.php -->
<div id="modal-login" class="auth-modal" role="dialog" aria-modal="true" aria-hidden="true" style="display:none;">
    <div class="auth-modal-backdrop" data-close-modal></div>
    <div class="auth-modal-panel" role="document" aria-labelledby="login-title">
        <button type="button" class="auth-modal-close" aria-label="Close" data-close-modal>&times;</button>
        <h2 id="login-title">Login</h2>

        <form method="POST" action="{{ route('login') }}"  >
          
            @csrf
            <div class="input-group">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />
                @error('email') <div class="input-error">{{ $message }}</div> @enderror
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required />
                @error('password') <div class="input-error">{{ $message }}</div> @enderror
            </div>

            <div class="input-row">
                <label class="checkbox">
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} /> Remember me
                </label>
                <a href="#" data-open-modal="modal-forgot">Forgot password?</a>
            </div>

            <div class="actions">
                <button type="submit" class="btn-primary">Login</button>
                <button type="button" class="btn-link" data-open-modal="modal-register">Register</button>
            </div>
        </form>
    </div>
</div>


 
