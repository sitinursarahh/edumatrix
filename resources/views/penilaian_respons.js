// drag and drop
check: (() =>
    userAnswer[0].drop?.ordo === "ordo" &&
    userAnswer[0].drop?.nilai === "nilai" &&
    userAnswer[0].drop?.tidaksama === "tidaksama",
    (btnPeriksa.onclick = () => {
        const benar = soal[idx].check();
        playFeedbackSound(benar);

        hasil.textContent = benar
            ? "Jawaban benar! ✅"
            : "Jawaban belum tepat.";
        hasil.style.color = benar ? "#198754" : "#dc3545";
    }));

// isian singkat
if (
    userAnswer[0].ordoRow === "2" &&
    userAnswer[0].ordoCol === "3" &&
    userAnswer[0].a23 === "2"
)
    score++;

// pilihan ceklis
const checks = container.querySelectorAll('input[type="checkbox"]');

checks.forEach((cb) => {
    cb.addEventListener("change", () => {
        userAnswer[2].check3c = Array.from(checks)
            .filter((c) => c.checked)
            .map((c) => c.value);
    });
});

const jawabanBenar = ["baris", "kolom", "persegi", "diagonal", "identitas"];

benar =
    jawabanBenar.every((v) => userAnswer[2].check3c.includes(v)) &&
    !userAnswer[2].check3c.includes("persegi-panjang");

userAnswer[2].benar3c = benar;


// True false
else if (idx === 2 && subIdx === 1) {
    container.innerHTML = renderSoal3b();

    document.querySelectorAll('input[name="tf3"]').forEach(radio => {
        radio.checked = radio.value === userAnswer[2].tf;

        radio.addEventListener('change', e => {
            userAnswer[2].tf = e.target.value;
        });
    });

    benar = userAnswer[2].tf === 'benar';
    userAnswer[2].benar3b = benar;
}


// input penilaian ekspresi mtk
check: () => {
    const latex = userAnswer[0].matrixLatex;
    if (!latex) return false;

    const angka = latex.match(/-?\d+/g);
    if (!angka || angka.length !== 9) return false;

    const benar = [
      '6','13','2',
      '19','21','16',
      '6','-8','6'
    ];

    return angka.every((v, i) => v === benar[i]);
  },

// pilihan ganda
$jawaban = $request->jawaban ?? [];
        $jumlahBenar = 0;

        foreach ($jawaban as $questionId => $optionId) {
            $benar = DB::table('options')
                ->where('id', $optionId)
                ->value('is_correct');

            if ($benar) {
                $jumlahBenar++;
            }
        }

        // Total soal dari database
        $jumlahSoal = DB::table('questions')
            ->where('quiz_id', $quiz_id)
            ->count();

        $nilai = ($jumlahSoal > 0)
            ? round(($jumlahBenar / $jumlahSoal) * 100)
            : 0;