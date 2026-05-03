/* ======================================================
   SCROLL + ACTIVE (SECTION BASED)
====================================================== */
(function () {
    window.activateSidebarFor = function (sectionId) {
        // clear active
        document
            .querySelectorAll("#sidebar_materi .sidebar-sublink")
            .forEach((a) => a.classList.remove("active"));

        document
            .querySelectorAll("#sidebar_materi .sidebar-submenu")
            .forEach((sm) => sm.classList.remove("open"));

        document
            .querySelectorAll("#sidebar_materi .sidebar-link.has-sub")
            .forEach((btn) => {
                btn.classList.remove("active");
                btn.setAttribute("aria-expanded", "false");
                const chev = btn.querySelector(".chev i");
                if (chev) {
                    chev.classList.remove("bi-chevron-up");
                    chev.classList.add("bi-chevron-down");
                }
            });

        if (!sectionId) return;

        const matched = Array.from(
            document.querySelectorAll("#sidebar_materi .sidebar-sublink"),
        ).filter((link) => {
            const sections = link.dataset.section?.split(",") || [];
            return sections.includes(sectionId);
        });

        matched.forEach((a) => a.classList.add("active"));

        matched.forEach((a) => {
            const submenu = a.closest(".sidebar-submenu");
            if (submenu) {
                submenu.classList.add("open");
                const parentBtn = document.querySelector(
                    `#sidebar_materi .sidebar-link.has-sub[data-target="${submenu.id}"]`,
                );
                if (parentBtn) {
                    parentBtn.classList.add("active");
                    parentBtn.setAttribute("aria-expanded", "true");
                    const chev = parentBtn.querySelector(".chev i");
                    if (chev) {
                        chev.classList.remove("bi-chevron-down");
                        chev.classList.add("bi-chevron-up");
                    }
                }
            }
        });
    };
})();

/* ======================================================
   PAGE BASED ACTIVE (URL) — TIDAK RESET MENU
====================================================== */
document.addEventListener("DOMContentLoaded", function () {
    const path = window.location.pathname;

    const activeLink = document.querySelector(
        `#sidebar_materi .sidebar-sublink[href="${path}"]`,
    );

    if (activeLink) {
        activeLink.classList.add("active");

        const submenu = activeLink.closest(".sidebar-submenu");
        if (submenu) {
            submenu.classList.add("open");

            const parentBtn = document.querySelector(
                `#sidebar_materi .sidebar-link.has-sub[data-target="${submenu.id}"]`,
            );
            if (parentBtn) {
                parentBtn.classList.add("active");
                parentBtn.setAttribute("aria-expanded", "true");

                const chev = parentBtn.querySelector(".chev i");
                if (chev) {
                    chev.classList.remove("bi-chevron-down");
                    chev.classList.add("bi-chevron-up");
                }
            }
        }
    }
});

document.addEventListener("DOMContentLoaded", () => {
    const sections = Array.from(document.querySelectorAll(".page-section[id]"));

    if (!sections.length || !window.activateSidebarFor) return;

    let currentActive = null;

    function detectActiveSection() {
        const offset = 140; // tinggi navbar
        let found = null;

        for (let i = sections.length - 1; i >= 0; i--) {
            const rect = sections[i].getBoundingClientRect();
            if (rect.top <= offset) {
                found = sections[i];
                break;
            }
        }

        if (found && found.id !== currentActive) {
            currentActive = found.id;
            activateSidebarFor(found.id);
        }
    }

    window.addEventListener("scroll", detectActiveSection);
    window.addEventListener("load", detectActiveSection);

    detectActiveSection();
});

document.addEventListener("DOMContentLoaded", () => {
    /* ===============================
     SLIDE CORE
  =============================== */
    const slides = [...document.querySelectorAll(".materi-slide")];
    const indicator = document.getElementById("slideIndicator");
    const globalIndicator = document.getElementById("globalIndicator");
    let index = 0;

    // === GLOBAL FUNCTION (PENTING)
    window.showSlide = function (i) {
        if (i < 0 || i >= slides.length) return;

        slides.forEach((s) => s.classList.remove("active"));
        slides[i].classList.add("active");
        index = i;

        // 🔓 auto unlock dot aktif (biar tidak ada 🔒 di halaman sekarang)
        const currentSection = slides[i].dataset.section;

        if (!window.unlockedSections.includes(currentSection)) {
            window.unlockedSections.push(currentSection);
        }

        const dots = indicator.querySelectorAll(".page-dot");
        if (dots[i]) {
            dots[i].classList.remove("locked");
        }

        // pindahkan indikator
        slides[i].appendChild(globalIndicator);

        // update dot
        indicator
            .querySelectorAll(".page-dot")
            .forEach((d) => d.classList.remove("active"));
        indicator.children[i]?.classList.add("active");

        // sync sidebar + hash
        const section = slides[i].dataset.section;
        if (section) {
            history.replaceState(null, "", `#${section}`);
            if (window.activateSidebarFor) {
                activateSidebarFor(section);
            }
        }
    };

    /* ===============================
     PREV / NEXT BUTTON
  =============================== */
    window.unlockMateri = function (subSlug) {
        const slides = [...document.querySelectorAll(".materi-slide")];
        const indicator = document.getElementById("slideIndicator");

        // ===============================
        // 🔓 UPDATE FRONTEND STATE
        // ===============================
        if (!window.unlockedSections.includes(subSlug)) {
            window.unlockedSections.push(subSlug);
        }

        // ===============================
        // 🔓 UPDATE DATABASE
        // ===============================
        fetch("/unlock-materi", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]',
                )?.content,
            },
            body: JSON.stringify({
                materi_slug: "determinan_invers_matriks",
                sub_materi_slug: subSlug,
            }),
        }).catch(() => {
            console.warn("Gagal unlock ke server");
        });

        // ===============================
        // 🔥 UNLOCK DOT (NOMOR HALAMAN)
        // ===============================
        const dots = indicator.querySelectorAll(".page-dot");

        slides.forEach((slide, i) => {
            if (slide.dataset.section === subSlug && dots[i]) {
                dots[i].classList.remove("locked");
            }
        });

        // ===============================
        // 🔥 PINDAH KE SLIDE BERIKUTNYA
        // ===============================
        const nextIndex = slides.findIndex(
            (s) => s.dataset.section === subSlug,
        );

        // if (nextIndex !== -1 && window.showSlide) {
        //     showSlide(nextIndex);
        // }

        // ===============================
        // 🔥 UPDATE SIDEBAR (ACTIVE)
        // ===============================
        if (window.activateSidebarFor) {
            activateSidebarFor(subSlug);
        }

        // ===============================
        // 🔥 HILANGKAN LOCK SIDEBAR REALTIME
        // ===============================
        document
            .querySelectorAll("#sidebar_materi .sidebar-sublink")
            .forEach((link) => {
                const sections = link.dataset.section?.split(",") || [];

                if (sections.includes(subSlug)) {
                    // hapus class lock
                    link.classList.remove("locked");
                    link.classList.remove("disabled");

                    // hapus icon 🔒 kalau ada
                    const lockIcon = link.querySelector(".bi-lock, .lock-icon");
                    if (lockIcon) {
                        lockIcon.remove();
                    }

                    // 🔥 pastikan bisa diklik
                    link.style.pointerEvents = "auto";
                    link.style.opacity = "1";
                }
            });

        // ===============================
        // 🔥 PAKSA SUBMENU TERBUKA
        // ===============================
        const activeLink = [
            ...document.querySelectorAll("#sidebar_materi .sidebar-sublink"),
        ].find((link) => (link.dataset.section || "").includes(subSlug));

        if (activeLink) {
            const submenu = activeLink.closest(".sidebar-submenu");

            if (submenu) {
                submenu.classList.add("open");

                const parentBtn = document.querySelector(
                    `#sidebar_materi .sidebar-link.has-sub[data-target="${submenu.id}"]`,
                );

                if (parentBtn) {
                    parentBtn.classList.add("active");
                    parentBtn.setAttribute("aria-expanded", "true");

                    const chev = parentBtn.querySelector(".chev i");
                    if (chev) {
                        chev.classList.remove("bi-chevron-down");
                        chev.classList.add("bi-chevron-up");
                    }
                }
            }
        }
    };

    /* ===============================
     PAGE DOT
  =============================== */
    indicator.innerHTML = "";
    slides.forEach((slide, i) => {
        const section = slide.dataset.section;

        const btn = document.createElement("span"); // 🔥 ganti ke span
        btn.className = "page-dot";
        btn.textContent = i + 1;
        btn.style.position = "relative"; // 🔥 penting untuk posisi 🔒

        // 🔥 jangan lock kalau itu halaman aktif
        if (
            !window.unlockedSections.includes(section) &&
            i !== index // 🔥 ini kunci fix-nya
        ) {
            btn.classList.add("locked");
        }

        btn.onclick = () => {
            if (window.unlockedSections.includes(section)) {
                showSlide(i);
            }
        };

        indicator.appendChild(btn);
    });

    /* ===============================
     SIDEBAR CLICK
  =============================== */
    document.addEventListener("click", (e) => {
        const link = e.target.closest(".sidebar-sublink");
        if (!link) return;

        const slides = [...document.querySelectorAll(".materi-slide")];

        // ambil semua section (bisa lebih dari 1)
        const sections = link.dataset.section?.split(",") || [];
        if (sections.length === 0) return;

        // cari slide pertama yang cocok
        const idx = slides.findIndex((s) =>
            sections.includes(s.dataset.section),
        );

        if (idx !== -1) {
            e.preventDefault();

            // pindah slide
            showSlide(idx);

            // 🔥 sync sidebar biar langsung aktif
            if (window.activateSidebarFor) {
                activateSidebarFor(slides[idx].dataset.section);
            }
        }
    });

    /* ===============================
     HASH LOAD (SATU-SATUNYA)
  =============================== */
    const hash = location.hash.replace("#", "");
    const idx = slides.findIndex((s) => s.dataset.section === hash);
    showSlide(idx !== -1 ? idx : 0);
});

// ===============================
// 🔙 PREV BUTTON HANDLER
// ===============================
document.addEventListener("click", (e) => {
    const prevBtn = e.target.closest(".btn-prev-slide");
    if (!prevBtn) return;

    const slides = [...document.querySelectorAll(".materi-slide")];

    // cari slide aktif sekarang
    const currentIndex = slides.findIndex((s) =>
        s.classList.contains("active"),
    );

    const prevIndex = currentIndex - 1;

    if (prevIndex >= 0 && window.showSlide) {
        showSlide(prevIndex);
    }
});
