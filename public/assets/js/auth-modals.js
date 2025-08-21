document.addEventListener('DOMContentLoaded', function() {
    // Get all elements that can open modals
    const modalOpeners = document.querySelectorAll('[data-open-modal]');
    // Get all elements that can close modals
    const modalClosers = document.querySelectorAll('[data-close-modal]');
    
    // Handle opening modals
    modalOpeners.forEach(opener => {
        opener.addEventListener('click', (e) => {
            e.preventDefault();
            const modalId = opener.getAttribute('data-open-modal');
            const modal = document.getElementById(modalId);
            if (modal) {
                // Hide all other modals first
                document.querySelectorAll('.auth-modal').forEach(m => {
                    m.style.display = 'none';
                });
                // Show the target modal
                modal.style.display = 'flex';
            }
        });
    });

    // Handle closing modals
    modalClosers.forEach(closer => {
        closer.addEventListener('click', (e) => {
            e.preventDefault();
            const modal = closer.closest('.auth-modal');
            if (modal) {
                modal.style.display = 'none';
            }
        });
    });

    // Close modal when clicking outside
    document.querySelectorAll('.auth-modal-backdrop').forEach(backdrop => {
        backdrop.addEventListener('click', (e) => {
            if (e.target === backdrop) {
                const modal = backdrop.closest('.auth-modal');
                if (modal) {
                    modal.style.display = 'none';
                }
            }
        });
    });
});