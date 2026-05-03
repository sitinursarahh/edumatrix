<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kuis Pengertian Matriks</title>

<script>
  window.MathJax = {
    tex: {
      inlineMath: [['\\(', '\\)'], ['$', '$']]
    }
  };
</script>

<script src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>


<style>
:root{
    --c1:#9a3f3f;
    --c2:#c1856d;
    --c3:#e6cfa9;
    --c4:#fbf9d1;
}

body{
    margin:0;
    font-family: 'Segoe UI', sans-serif;
    background: var(--c4);
}

.quiz-wrapper{
    display:flex;
    min-height:100vh;
    align-items: stretch;
}

/* ===== PANEL KIRI ===== */
.quiz-sidebar{
    width:240px;
    background:var(--c3);
    padding:20px;
    overflow-y: auto;
}


.quiz-sidebar h4{
    margin-bottom:10px;
}

.number-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:10px;
}

.number-btn{
    padding:10px;
    text-align:center;
    border-radius:6px;
    cursor:pointer;
    background:#fff;
    border:2px solid var(--c2);
    font-weight:bold;
}

.number-btn.active{
    background:var(--c1);
    color:#fff;
}

.number-btn.answered{
    background:var(--c2);
    color:#fff;
}

.legend-title{
    font-weight: 600;
    margin-bottom: 10px; /* JARAK KE BAWAH */
}

.legend{
    margin-top:20px;
    font-size:14px;
}

.legend-item{
    display:flex;
    align-items:center;
    gap:8px;
    margin-bottom:6px;
}

.legend-box{
    width:14px;
    height:14px;
    border-radius:3px;
    border:1.5px solid var(--c2);
}


/* SUDAH DIJAWAB */
.legend-box.answered{
    background: var(--c2); /* #c1856d */
}

/* BELUM DIJAWAB */
.legend-box.unanswered{
    background: #ffffff;
}


/* ===== PANEL KANAN ===== */
.quiz-main{
    flex:1;
    padding:30px;
    display:flex;
    flex-direction:column;
}

.quiz-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

.timer{
    background:var(--c1);
    color:white;
    padding:8px 16px;
    border-radius:20px;
    font-weight:bold;
}

.question-box{
    flex:1;
}

.option{
    margin:10px 0;
    padding:10px;
    background:#fff;
    border-radius:8px;
    border:2px solid var(--c3);
}

.option input{
    margin-right:10px;
}

/* ===== NAV BUTTON ===== */
.quiz-nav{
    display:flex;
    justify-content:space-between;
    margin-top:20px;
}

.quiz-nav button{
    padding:10px 20px;
    border:none;
    border-radius:20px;
    background:var(--c1);
    color:var(--c4);
    font-weight:bold;
    cursor:pointer;
    transition: 
        background 0.3s ease,
        transform 0.2s ease,
        box-shadow 0.2s ease,
        color 0.3s ease;
}

.quiz-nav button:hover{
    background:var(--c2);
    color:var(--c1);
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.2);
}

</style>
</head>

<body>

<div class="quiz-wrapper">

    <!-- ===== KIRI ===== -->
    <div class="quiz-sidebar">
        <h4>Nomor Soal</h4>
        <div class="number-grid" id="numberGrid"></div>

    <div class="legend">
    <div class="legend-title"><span>Keterangan :</span></div>
    <div class="legend-item">
        <span class="legend-box answered"></span>
        <span>Sudah dijawab</span>
    </div>
    <div class="legend-item">
        <span class="legend-box unanswered"></span>
        <span>Belum dijawab</span>
    </div>
</div>

    </div>

    <!-- ===== KANAN ===== -->
    <div class="quiz-main">
        <form id="quizForm" method="POST" action="{{ route('kuis.submit', $quiz_id) }}">
            @csrf

            <div id="hiddenAnswers"></div>


        <div class="quiz-header">
            <h3 id="questionTitle">Soal No. 1</h3>
            <div class="timer" id="timer">--:--</div>

        </div>

        <div class="question-box" id="questionBox"></div>

        <div class="quiz-nav">
            <button type="button" onclick="prevQuestion()">← Sebelumnya</button>
            <button type="button" id="nextBtn" onclick="nextQuestion()">Berikutnya →</button>
        </div>


        </form>


    </div>
</div>

<script>
/* ===== DATA DARI CONTROLLER ===== */
const questions = @json($questions);
let currentIndex = 0;
let answers = {};

/* ===== RENDER NOMOR ===== */
const grid = document.getElementById("numberGrid");
Object.keys(questions).forEach((key, index)=>{
    const btn = document.createElement("div");
    btn.className = "number-btn";
    btn.innerText = index + 1;
    btn.onclick = ()=>goTo(index);
    grid.appendChild(btn);
});

/* ===== RENDER SOAL ===== */
function renderQuestion(){
    const qKey = Object.keys(questions)[currentIndex];
    const q = questions[qKey];

    document.getElementById("questionTitle").innerText =
        "Soal No. " + (currentIndex+1);

    let html = `<p class="question-text">${q.text}</p>`;

    q.options.forEach(opt=>{
        html += `
        <div class="option">
            <label>
                <input type="radio"
                    name="jawaban[${qKey}]"
                    value="${opt.id}"
                    ${answers[qKey] == opt.id ? "checked" : ""}
                    onclick="selectAnswer('${qKey}', ${opt.id})">
                ${opt.text}
            </label>
        </div>`;
    });


    const box = document.getElementById("questionBox");
    box.innerHTML = html;

    
    if (window.MathJax) {
        MathJax.typesetPromise([box]);
    }

    updateStatus();

    const nextBtn = document.getElementById("nextBtn");

    if (currentIndex === Object.keys(questions).length - 1) {
        nextBtn.innerText = "Selesai";
        nextBtn.onclick = submitQuiz;
    } else {
        nextBtn.innerText = "Berikutnya →";
        nextBtn.onclick = nextQuestion;
    }

}

/* ===== STATUS ===== */
function updateStatus(){
    document.querySelectorAll(".number-btn").forEach((btn,i)=>{
        btn.classList.remove("active","answered");
        const qKey = Object.keys(questions)[i];
        if(answers[qKey]) btn.classList.add("answered");
        if(i===currentIndex) btn.classList.add("active");
    });
}

function selectAnswer(q, opt){
    answers[q] = opt;

    const hiddenContainer = document.getElementById("hiddenAnswers");
    let hiddenInput = document.getElementById("hidden_" + q);

    if (!hiddenInput) {
        hiddenInput = document.createElement("input");
        hiddenInput.type = "hidden";
        hiddenInput.name = `jawaban[${q}]`;
        hiddenInput.id = "hidden_" + q;
        hiddenContainer.appendChild(hiddenInput);
    }

    hiddenInput.value = opt;
}


/* ===== NAV ===== */
function nextQuestion(){
    if(currentIndex<Object.keys(questions).length-1){
        currentIndex++;
        renderQuestion();
    }
}
function prevQuestion(){
    if(currentIndex>0){
        currentIndex--;
        renderQuestion();
    }
}
function goTo(i){
    currentIndex=i;
    renderQuestion();
}

/* ===== TIMER 1 JAM ===== */
/* ===== TIMER DINAMIS DARI BACKEND ===== */
/* ===== TIMER DINAMIS DARI BACKEND ===== */
let time = {{ $durasi }} * 60; // menit → detik
const timerEl = document.getElementById("timer");

// ⬇️ SET LANGSUNG SEBELUM INTERVAL
updateTimerDisplay();

const timerInterval = setInterval(() => {
    time--;

    if (time < 0) {
        clearInterval(timerInterval);
        alert("Waktu kuis telah habis!");
        document.getElementById("quizForm").submit();
        return;
    }

    updateTimerDisplay();
}, 1000);

function updateTimerDisplay() {
    let m = Math.floor(time / 60);
    let s = time % 60;
    timerEl.innerText =
        `${m.toString().padStart(2, "0")}:${s.toString().padStart(2, "0")}`;
}

renderQuestion();

function submitQuiz() {
    if (!confirm("Apakah Anda yakin ingin menyelesaikan kuis?")) return;
    document.getElementById("quizForm").submit();
}

</script>



</body>
</html>
