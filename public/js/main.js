// AJAX handlers
document.addEventListener('DOMContentLoaded', () => {
    const content = document.getElementById('content');

    // Handle internal link clicks
    document.addEventListener('click', (event) => {
        const link = event.target.closest('a[data-internal]');
        if (link) {
            event.preventDefault();
            const url = link.getAttribute('href');

            fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then((data) => {
                    content.innerHTML = data.content;

                    if (data.title) {
                        document.title = data.title;
                    }

                    window.history.pushState(null, '', url);
                })
                .catch((error) => console.error('Error loading content:', error));
        }
    });

    // Handle browser back/forward navigation
    window.addEventListener('popstate', () => {
        const url = window.location.pathname;

        fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then((response) => response.json())
            .then((data) => {
                content.innerHTML = data.content;

                if (data.title) {
                    document.title = data.title;
                }
            })
            .catch((error) => console.error('Error loading content:', error));
    });

    // Handle form submission
    document.addEventListener('submit', (event) => {
        const form = event.target.closest('form');
        if (form) {
            event.preventDefault();

            const formData = new FormData(form);
            const action = form.getAttribute('action');
            const method = form.getAttribute('method').toUpperCase();

            fetch(action, {
                method: method,
                body: formData,
                headers: { 'X-Requested-With': 'XMLHttpRequest' },
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.content) {
                        content.innerHTML = data.content;
                    }

                    if (data.title) {
                        document.title = data.title;
                    }
                })
                .catch((error) => console.error('Error submitting form:', error));
        }
    });
});