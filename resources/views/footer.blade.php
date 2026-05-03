<footer class="bg-dark text-white text-center p-3">
    <p>© 2026 GoTrans. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // SCROLL ANIMATION (fade-up stagger)
    const elements = document.querySelectorAll('.fade-up');

    function showOnScroll() {
        elements.forEach((el, index) => {
            const pos = el.getBoundingClientRect().top;
            const screen = window.innerHeight;

            if (pos < screen - 100) {
                setTimeout(() => {
                    el.classList.add('show');
                }, index * 150); // stagger delay
            }
        });
    }

    window.addEventListener('scroll', showOnScroll);
    window.addEventListener('load', showOnScroll);

    // NAVBAR SCROLL EFFECT
    window.addEventListener('scroll', function () {
        const navbar = document.querySelector('.navbar');
        navbar.classList.toggle('scrolled', window.scrollY > 50);
    });
</script>

</body>
</html>