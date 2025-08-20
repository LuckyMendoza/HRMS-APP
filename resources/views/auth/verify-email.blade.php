<!-- resources/views/auth/verify-email.blade.php -->
<div id="modal-verify" class="auth-modal" role="dialog" aria-modal="true" aria-hidden="true" style="display:none;">
    <div class="auth-modal-backdrop" data-close-modal></div>
    <div class="auth-modal-panel" role="document" aria-labelledby="verify-title">
        <button type="button" class="auth-modal-close" aria-label="Close" data-close-modal>&times;</button>
        <h2 id="verify-title">Verify your email</h2>

        <div class="message">
            <p>Thanks for signing up! Before getting started, could you verify your email address by clicking the link we just emailed to you? If you didn't receive the email, we will gladly send you another.</p>
        </div>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <div class="actions">
                <button type="submit" class="btn-primary">Resend verification email</button>
                <button type="button" class="btn-link" data-open-modal="modal-login">Back to login</button>
            </div>
        </form>
    </div>
</div>
