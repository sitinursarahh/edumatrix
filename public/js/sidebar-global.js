document.addEventListener("DOMContentLoaded", () => {
    // Klik sidebar
    document
        .querySelectorAll("#sidebar_materi .sidebar-sublink")
        .forEach((link) => {
            link.addEventListener("click", function (e) {
                const href = this.getAttribute("href");
                if (!href) return;

                const url = new URL(href, window.location.origin);

                // Jika masih di halaman yang sama → scroll
                if (url.pathname === window.location.pathname && url.hash) {
                    const target = document.getElementById(
                        url.hash.replace("#", "")
                    );
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({
                            behavior: "smooth",
                            block: "start",
                        });
                        history.pushState(null, "", url.hash);
                    }
                }
                // Kalau beda halaman → BIARKAN browser pindah
            });
        });

    // Auto scroll saat page load (dari halaman lain)
    const hash = location.hash.replace("#", "");
    if (hash) {
        const el = document.getElementById(hash);
        if (el) {
            setTimeout(() => {
                el.scrollIntoView({ behavior: "smooth", block: "start" });
            }, 100);
        }
    }
});
