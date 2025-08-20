// Modal initialization and handlers
if (!window.__authModalsInitialized) {
    window.__authModalsInitialized = true;

    function openModal(id) {
        const el = document.getElementById(id);
        if (!el) return;
        el.style.display = 'block';
        el.setAttribute('aria-hidden', 'false');
    }

    function closeModal(el) {
        if (!el) return;
        el.style.display = 'none';
        el.setAttribute('aria-hidden', 'true');
    }

    // close on ESC
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.auth-modal').forEach(m => closeModal(m));
        }
    });

    document.addEventListener('click', function (e) {
        const open = e.target.closest('[data-open-modal]');
        if (open) {
            e.preventDefault();
            const id = open.getAttribute('data-open-modal');
            openModal(id);
            return;
        }

        const close = e.target.closest('[data-close-modal]');
        if (close) {
            const modal = close.closest('.auth-modal');
            closeModal(modal);
            return;
        }
    });
}
