/* =========================================================
   MARI MENCOBA — DETERMINAN & INVERS (ENGINE ASLI)
   ========================================================= */
document.addEventListener("DOMContentLoaded", function () {
    /* =====================================================
     POPUP
     ===================================================== */
    function showPopup(message, onClose = null, icon = "") {
        const modal = document.getElementById("quizModal");
        const msg = document.getElementById("quizModalMessage");
        const btn = document.getElementById("quizModalBtn");
        const iconBox = document.getElementById("quizModalIcon");

        if (!modal) return;

        msg.innerHTML = message;
        iconBox.textContent = icon;
        modal.classList.remove("hidden");

        btn.onclick = () => {
            modal.classList.add("hidden");
            iconBox.textContent = "";
            if (typeof onClose === "function") onClose();
        };
    }

    /* =====================================================
     AUDIO FEEDBACK (SAMA PERSIS DENGAN ASLI)
     ===================================================== */
    const _audioCtx = (() => {
        try {
            return new (window.AudioContext || window.webkitAudioContext)();
        } catch {
            return null;
        }
    })();

    function _ensureAudioResume() {
        if (!_audioCtx) return Promise.resolve();
        if (_audioCtx.state === "suspended") {
            return _audioCtx.resume().catch(() => {});
        }
        return Promise.resolve();
    }

    function _playTone(freq, ms = 180, type = "sine", when = 0, volume = 0.12) {
        if (!_audioCtx) return;

        const ctx = _audioCtx;
        const osc = ctx.createOscillator();
        const gain = ctx.createGain();

        osc.type = type;
        osc.frequency.value = freq;

        osc.connect(gain);
        gain.connect(ctx.destination);

        const start = ctx.currentTime + when / 1000;
        gain.gain.setValueAtTime(0, start);
        gain.gain.linearRampToValueAtTime(volume, start + 0.01);
        gain.gain.linearRampToValueAtTime(0, start + ms / 1000);

        osc.start(start);
        osc.stop(start + ms / 1000 + 0.02);
    }

    function playFeedbackSound(isCorrect) {
        if (!_audioCtx) return;

        _ensureAudioResume().then(() => {
            if (isCorrect) {
                _playTone(520, 120, "triangle");
                _playTone(780, 150, "triangle", 120);
                _playTone(1040, 180, "triangle", 240);
            } else {
                _playTone(440, 150, "sine", 0, 0.11);
                _playTone(330, 180, "sine", 150, 0.11);
            }
        });
    }

    /* =====================================================
     DOM ELEMENTS (TIDAK DIUBAH)
     ===================================================== */
    const container = document.getElementById("quiz-question-2");
    const hasil = document.getElementById("hasil-jawaban-2");

    const btnPeriksa = document.getElementById("btn-periksa-2");
    const btnReset = document.getElementById("btn-reset-2");
    const btnNext = document.getElementById("btn-next-2");
    const btnPrev = document.getElementById("btn-prev-2");

    if (!container) return;

    /* =====================================================
     STATE JAWABAN
     ===================================================== */
    const userAnswer = [
        { value: "" }, // soal 1
        { det: "" }, // soal 2
        {
            // soal 3 (invers 2x2)
            "s3-00": "",
            "s3-01": "",
            "s3-10": "",
            "s3-11": "",
        },
    ];

    /* =====================================================
     DATA SOAL
     ===================================================== */
    const soal = [
        /* ================= SOAL 1 ================= */
        {
            render: () => `
    <p><strong>1. Diketahui matriks di bawah ini</strong></p>

    <div class="matrix-center">
        \\[
        A =
        \\begin{bmatrix}
        1 & 3 & 2 \\\\
        2 & 4 & 5 \\\\
        9 & 8 & 6
        \\end{bmatrix}
        \\]
    </div>

    <div class="jawaban-left">
        <span>Hasil kofaktor \\( C_{12} \\) yaitu</span>
        <input id="kofaktorInput" class="quiz-input input-mini" placeholder="...">
    </div>
`,

            restore: () => {
                const el = document.getElementById("kofaktorInput");
                if (el) el.value = userAnswer[0].value || "";
            },

            check: () => {
                const val = document
                    .getElementById("kofaktorInput")
                    .value.trim();
                userAnswer[0].value = val;

                // 🔥 HITUNGAN:
                // M12 = |2 5; 9 6| = (2×6 - 5×9) = 12 - 45 = -33
                // C12 = (-1)^(1+2) × (-33) = -1 × (-33) = 33

                return val === "33";
            },

            reset: () => {
                userAnswer[0] = { value: "" };
            },

            afterRender: () => {
                const input = document.getElementById("kofaktorInput");

                if (input) {
                    input.addEventListener("input", () => {
                        userAnswer[0].value = input.value;
                    });
                }
            },
        },

        /* ================= SOAL 2 ================= */
        {
            render: () => `
      <p><strong>2. Diketahui matriks di bawah ini</strong></p>

      <div class="matrix-center">
        \\[
        B =
        \\begin{bmatrix}
        1 & 2 & 3 \\\\
        0 & 1 & 4 \\\\
        2 & 5 & 6
        \\end{bmatrix}
        \\]
      </div>

      <div class="jawaban-left">
        <span>Nilai \\( |B| \\) adalah</span>
        <input class="quiz-input input-mini" id="s2-det" placeholder="...">
      </div>
    `,

            restore: () => {
                const el = document.getElementById("s2-det");
                if (el) el.value = userAnswer[1].det || "";
            },

            check: () => {
                userAnswer[1].det = document
                    .getElementById("s2-det")
                    .value.trim();
                return userAnswer[1].det === "1";
            },

            reset: () => {
                userAnswer[1] = { det: "" };
            },
        },

        /* ================= SOAL 3 ================= */
        {
            render: () => `
<p><strong>3. Jika</strong></p>

\\[
A =
\\begin{bmatrix}
20 & 19 \\\\
21 & 20
\\end{bmatrix}
\\]

<p>Maka <strong>\\( A^{-1} = \\frac{1}{|A|}\\, \\text{Adjoin}(A) \\)</strong> adalah:</p>

<div class="matrix-jawaban">
  <span>\\( A^{-1} = \\)</span>

  <div class="matrix-input">
    <div class="matrix-bracket left"></div>

    <div class="matrix-grid" style="grid-template-columns: repeat(2, 56px);">
      <input id="s3-00" placeholder="...">
      <input id="s3-01" placeholder="...">

      <input id="s3-10" placeholder="...">
      <input id="s3-11" placeholder="...">
    </div>

    <div class="matrix-bracket right"></div>
  </div>
</div>
`,

            restore: () => {
                ["s3-00", "s3-01", "s3-10", "s3-11"].forEach((id) => {
                    const el = document.getElementById(id);
                    if (el) el.value = userAnswer[2][id] || "";
                });
            },

            check: () => {
                ["s3-00", "s3-01", "s3-10", "s3-11"].forEach((id) => {
                    userAnswer[2][id] = document
                        .getElementById(id)
                        .value.trim();
                });

                /*
          A = [20 19; 21 20]
          |A| = 20*20 - 19*21 = 400 - 399 = 1
          Adjoin(A) = [20 -19; -21 20]
          A⁻¹ = Adjoin(A)
        */
                return (
                    userAnswer[2]["s3-00"] === "20" &&
                    userAnswer[2]["s3-01"] === "-19" &&
                    userAnswer[2]["s3-10"] === "-21" &&
                    userAnswer[2]["s3-11"] === "20"
                );
            },

            reset: () => {
                userAnswer[2] = {
                    "s3-00": "",
                    "s3-01": "",
                    "s3-10": "",
                    "s3-11": "",
                };
            },
        },
    ];

    function isAnswered(i) {
        // SOAL 1 (drag)
        if (i === 0) {
            const el = document.getElementById("kofaktorInput");
            return el && el.value.trim() !== "";
        }

        // SOAL 2 (input determinan)
        if (i === 1) {
            const el = document.getElementById("s2-det");
            return el && el.value.trim() !== "";
        }

        // SOAL 3 (input invers)
        if (i === 2) {
            const ids = ["s3-00", "s3-01", "s3-10", "s3-11"];
            return ids.every((id) => {
                const el = document.getElementById(id);
                return el && el.value.trim() !== "";
            });
        }

        return false;
    }

    /* =====================================================
     PROGRESS (TETAP ADA, WALAU 1 SOAL)
     ===================================================== */
    let idx = 0;
    let completed = 0;

    function updateQuizProgress() {
        const total = soal.length;

        // progress berdasarkan soal yang SUDAH DIJAWAB
        const percent = (completed / total) * 100;

        const currentEl = document.getElementById("currentQuestion-2");
        const totalEl = document.getElementById("totalQuestion-2");
        const barEl = document.getElementById("quizProgressFill-2");
        const starEl = document.getElementById("quizProgressStar-2");

        if (currentEl) currentEl.textContent = idx + 1;
        if (totalEl) totalEl.textContent = total;
        if (barEl) barEl.style.width = percent + "%";
        if (starEl) starEl.style.left = percent + "%";
    }

    /* =====================================================
     RENDER
     ===================================================== */
    function renderSoal() {
        hasil.textContent = "";
        container.innerHTML = soal[idx].render();

        // ⬅️ JANGAN CLEAR GLOBAL
        if (window.MathJax) {
            MathJax.typesetPromise([container]);
        }

        soal[idx].restore?.(); // 🔥 isi dulu value
        soal[idx].afterRender?.(); // 🔥 baru pasang event

        if (idx === 0) {
            btnPrev.style.visibility = "hidden";
        } else {
            btnPrev.style.visibility = "visible";
            btnPrev.innerHTML = `<i class="bi bi-arrow-left me-2"></i> Sebelumnya`;
        }

        btnNext.innerHTML =
            idx === soal.length - 1
                ? "Selesai"
                : `Berikutnya <i class="bi bi-arrow-right ms-2"></i>`;

        updateQuizProgress();
    }

    /* =====================================================
     EVENT HANDLER
     ===================================================== */
    btnPeriksa.onclick = () => {
        const benar = soal[idx].check();
        playFeedbackSound(benar);

        if (benar) {
            hasil.textContent = "Jawaban benar! ✅";
            hasil.style.color = "#198754"; // hijau (Bootstrap success)
        } else {
            hasil.textContent = "Jawaban belum tepat.";
            hasil.style.color = "#dc3545"; // merah (Bootstrap danger)
        }
    };

    btnReset.onclick = () => {
        soal[idx].reset();
        renderSoal();
    };

    btnPrev.onclick = (e) => {
        e.preventDefault();
        if (idx === 1) {
            const input = document.getElementById("kofaktorInput");
            if (input) {
                userAnswer[0].value = input.value;
            }
        }
        if (idx > 0) {
            idx--;
            renderSoal();
        }
    };

    btnNext.onclick = (e) => {
        e.preventDefault();
        e.stopPropagation();

        const input = document.getElementById("kofaktorInput");
        if (input) {
            userAnswer[0].value = input.value;
        }
        if (!isAnswered(idx)) {
            showPopup("Selesaikan soal ini terlebih dahulu 🙂");
            return;
        }

        // simpan status benar/salah SEKALI
        if (!soal[idx].isChecked) {
            soal[idx].isCorrect = soal[idx].check();
            soal[idx].isChecked = true;
        }

        completed = Math.max(completed, idx + 1);
        updateQuizProgress();

        if (idx < soal.length - 1) {
            idx++;
            renderSoal();
            return;
        }

        completed = soal.length;
        updateQuizProgress();

        // 🔥 SIMPAN KE DATABASE (TARUH DI SINI)
        fetch("/progress/complete", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector(
                    'meta[name="csrf-token"]',
                ).content,
            },
            body: JSON.stringify({
                materi_slug: "determinan_invers_matriks",
                sub_materi_slug: "mari-mencoba-determinan-invers-matriks",
            }),
        })
            .then((res) => {
                if (!res.ok) throw new Error("Gagal simpan progress");
                return res.json();
            })
            .then(() => {
                const btn = document.querySelector(
                    '.btn-next-slide[data-check="mari-mencoba-determinan-invers-matriks"]',
                );

                if (btn) btn.dataset.allowed = "1";
            })
            .catch((err) => {
                console.error("ERROR SIMPAN:", err);
            });

        // HITUNG JUMLAH JAWABAN BENAR
        let score = 0;
        soal.forEach((s) => {
            if (s.isCorrect) score++;
        });

        // TAMPILAN AKHIR (SESUAI MARI MENCOBA PERKALIAN MATRIKS)
        showPopup(
            `
    <h3 style="margin-bottom:8px;">Quiz selesai!</h3>
    <p style="margin:0;">Jawaban benar: <b>${score}</b> / ${soal.length}</p>
    `,
            () => {
                // reset state setelah klik OK
                idx = 0;
                completed = 0;

                userAnswer[0] = { value: "" };
                userAnswer[1] = { det: "" };
                userAnswer[2] = {
                    "s3-00": "",
                    "s3-01": "",
                    "s3-10": "",
                    "s3-11": "",
                };

                renderSoal();
                updateQuizProgress();
                hasil.textContent = "";
            },
            "🎉",
        );
    };

    /* =====================================================
     INIT
     ===================================================== */
    renderSoal();
    updateQuizProgress();
});
let isNavigating = false;

document.addEventListener("click", function (e) {
    const btn = e.target.closest(".btn-next-slide");
    if (!btn) return;

    if (isNavigating) return;
    isNavigating = true;

    const check = btn.dataset.check;
    const unlockTarget = btn.dataset.unlock;

    // =========================
    // 🔒 VALIDASI MARI MENCOBA
    // =========================
    if (check === "mari-mencoba-determinan-invers-matriks") {
        if (btn.dataset.allowed !== "1") {
            e.preventDefault();
            document.getElementById("lockedPopup").style.display = "block";

            isNavigating = false;
            return;
        }

        // 🔥 UNLOCK DI SINI (PASTI KEJALAN)
        if (unlockTarget) {
            unlockMateri(unlockTarget);
        }
    }

    e.preventDefault();

    const slides = [...document.querySelectorAll(".materi-slide")];
    const currentIndex = slides.findIndex((s) =>
        s.classList.contains("active"),
    );

    if (currentIndex !== -1) {
        showSlide(currentIndex + 1);
    }

    setTimeout(() => {
        isNavigating = false;
    }, 300);
});
