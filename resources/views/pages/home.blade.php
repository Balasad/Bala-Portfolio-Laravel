@extends('layouts.app')

@section('content')

{{-- ── Hero Section ── --}}
<section class="hero">
    <div class="nebula" style="right: -100px; top: 0;"></div>

    <div class="hero-text">
        <p class="eyebrow anim-fade" style="--d:0.1s">UI/UX Designer · Laravel Developer · Creative Designer</p>
        <h1 class="anim-fade" style="--d:0.25s">Hi, I'm <span class="name">Balasaravanan S</span></h1>
        <p class="hero-desc anim-fade" style="--d:0.4s">UI/UX Designer and Web Developer based in Chennai — designing intuitive interfaces in Figma, building responsive apps with Laravel, and crafting immersive visuals in Blender & Illustrator.</p>
        <div class="hero-meta anim-fade" style="--d:0.55s">
            <span class="meta-chip">📍 Chennai, India</span>
            <span class="meta-chip">💼 TeraMed Technologies</span>
            <span class="meta-chip">🎓 B.E. CSE</span>
        </div>
        <div class="hero-actions anim-fade" style="--d:0.7s">
            <button class="btn">View My Work</button>
            <a href="{{ asset('Bala_Saravanan_Resume.pdf') }}" download class="btn-outline">Download CV</a>
        </div>
    </div>

    <div class="hero-image anim-slide-right">
        <img src="{{ asset('images/profile.png') }}" alt="Balasaravanan S — Profile"  loading="eager" fetchpriority="high" decoding="async">
    </div>
</section>

{{-- ── Portfolio / Arc Section ── --}}
<section class="portfolio" id="work">
    <p class="section-label">Selected Works</p>
    <h2>Featured Projects</h2>

    <div class="arc-section">
        <div class="arc-card">
            <div class="arc-stage" id="arc-stage">
                <canvas id="arc-cv"></canvas>
                <div class="nodes-layer" id="nodes-layer"></div>
            </div>
            <div class="arc-projects-area" id="arc-proj-area"></div>
        </div>
    </div>
</section>

{{-- ── Experience Section ── --}}
<section class="experience" id="experience">
    <p class="section-label">Professional Experience</p>
    <h2>Currently Building</h2>

    <div class="exp-timeline">
        <div class="exp-card active reveal-card">
            <div class="exp-glow"></div>
            <div class="exp-header">
                <div class="exp-title">
                    <h3>Laravel Developer (ERP Specialist)</h3>
                    <span class="company">TeraMed Technologies</span>
                </div>
                <div class="exp-date">March 2026 — Present</div>
            </div>
            <div class="exp-body">
                <p>Leading the development of <strong>RMD ERP (CEASER)</strong>, a massive enterprise resource planning system using <strong>Laravel 12</strong> and <strong>PHP 8.2</strong>.</p>
                <ul>
                    <li>Architected complex modules: Inventory Management, Expense Claims, and Travel Requests.</li>
                    <li>Implemented high-performance notification systems using <strong>Redis</strong> and <strong>MariaDB</strong>.</li>
                    <li>Developed automated stock deduction (FEFO) and real-time inventory movement tracking.</li>
                </ul>
                <div class="badge-row">
                    <span class="badge">Laravel 12</span>
                    <span class="badge">PHP 8.2</span>
                    <span class="badge">Redis</span>
                    <span class="badge">MariaDB</span>
                    <span class="badge">Vite</span>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* ════════════════════════════════════
   HERO
═══════════════════════════════════ */
.hero {
    display: flex;
    align-items: center;
    gap: 60px;
    min-height: 90vh;
}

.hero-text { flex: 1; z-index: 2; }

.eyebrow {
    font-size: 12px;
    font-weight: 500;
    color: var(--text-muted);
    letter-spacing: 0.3px;
    margin-bottom: 8px;
    word-break: break-word;
    overflow-wrap: break-word;
}

.hero-text h1 {
    font-size: clamp(28px, 7vw, 58px);
    font-weight: 900;
    line-height: 1.15;
    margin: 10px 0;
    word-break: break-word;
    overflow-wrap: break-word;
}

.hero-text .name {
    background: linear-gradient(90deg, var(--green-light), var(--green));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-desc {
    color: var(--text-muted);
    line-height: 1.7;
    max-width: 520px;
    margin-bottom: 4px;
}

.hero-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin: 20px 0;
}

.meta-chip {
    background: rgba(255,255,255,0.05);
    border: 1px solid var(--border);
    padding: 6px 15px;
    border-radius: 20px;
    font-size: 13px;
    white-space: nowrap;
}

.hero-actions {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    gap: 16px;
    margin-top: 8px;
}

.btn-outline {
    border: 2px solid var(--green);
    padding: 9px 24px;
    border-radius: 30px;
    color: #fff;
    text-decoration: none;
    font-weight: 700;
    font-size: 13px;
    transition: 0.3s;
    white-space: nowrap;
}
.btn-outline:hover { background: var(--green-dim); }

.hero-image {
    flex-shrink: 0;
    display: flex;
    justify-content: center;
}
.hero-image img {
    width: 420px;
    max-width: 100%;
    filter: drop-shadow(0 0 40px var(--green-glow));
    will-change: transform;   /* float animation — keep on GPU */
}

/* ════════════════════════════════════
   ARC PORTFOLIO
═══════════════════════════════════ */
.arc-card {
    background: rgba(15, 23, 42, 0.4);
    backdrop-filter: blur(10px);
    border-radius: 24px;
    border: 1px solid var(--border);
    padding: 20px 0 60px;
    position: relative;
    overflow: hidden;
    contain: layout style;
}

.arc-stage {
    position: relative;
    width: 100%;
    height: 400px;
    display: flex;
    justify-content: center;
    touch-action: pan-y;
}

#arc-cv {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
    pointer-events: none;
    will-change: contents;   /* hint browser this canvas repaints frequently */
}

.nodes-layer {
    position: absolute;
    top: 0; left: 0;
    width: 100%; height: 100%;
}

.arc-node-bg {
    border-radius: 50%;
    background: #e5e7eb;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.4s;
}

.arc-node-wrap.active .arc-node-bg {
    background: #fff;
    box-shadow: 0 0 25px var(--green-light);
    border: 3px solid var(--green);
}

.arc-node-label {
    position: absolute;
    top: 110%;
    left: 50%;
    transform: translateX(-50%);
    font-size: 11px;
    font-weight: 900;
    color: rgba(255,255,255,0.3);
    letter-spacing: 1px;
    white-space: nowrap;
}

.arc-proj-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
    padding: 0 24px;
    animation: fadeInUp 0.6s;
}

@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to   { opacity: 1; transform: translateY(0); }
}

.arc-proj-card {
    height: 200px;
    border-radius: 20px;
    overflow: hidden;
    border: 1px solid var(--border);
}

.arc-proj-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s;
}
.arc-proj-card:hover img { transform: scale(1.05); }

/* ════════════════════════════════════
   EXPERIENCE
═══════════════════════════════════ */
.exp-timeline { display: flex; flex-direction: column; gap: 20px; }

.exp-card {
    background: rgba(255,255,255,0.02);
    border: 1px solid var(--border);
    border-radius: 24px;
    padding: 40px;
    position: relative;
    overflow: hidden;
    transition: border-color 0.4s, transform 0.4s;
    contain: layout style;     /* isolate card reflows */
}
.exp-card:hover { border-color: var(--green); transform: translateY(-5px); }

.exp-glow {
    position: absolute;
    top: 0; right: 0;
    width: 200px; height: 200px;
    background: radial-gradient(circle, var(--green-dim), transparent 70%);
    opacity: 0.5;
    pointer-events: none;
}

.exp-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 16px;
    margin-bottom: 25px;
}

.exp-title h3 { font-size: 22px; color: var(--green-light); }
.exp-title .company { font-size: 14px; color: var(--text-muted); margin-top: 4px; display: block; }

.exp-date {
    font-weight: 700;
    color: var(--text-muted);
    opacity: 0.8;
    font-size: 13px;
    white-space: nowrap;
}

.exp-body p { margin-bottom: 15px; line-height: 1.7; color: var(--text-muted); }

.exp-body ul { list-style: none; margin-bottom: 20px; }
.exp-body li {
    position: relative;
    padding-left: 22px;
    margin-bottom: 10px;
    color: #cbd5e1;
    font-size: 15px;
    line-height: 1.6;
}
.exp-body li::before { content: '→'; position: absolute; left: 0; color: var(--green); }

.badge-row { display: flex; flex-wrap: wrap; gap: 8px; }
.badge {
    background: var(--green-dim);
    border: 1px solid rgba(34,197,94,0.2);
    color: var(--green-light);
    padding: 5px 12px;
    border-radius: 12px;
    font-size: 11px;
    font-weight: 700;
}

/* ════════════════════════════════════
   RESPONSIVE — TABLET (≤ 1024px)
═══════════════════════════════════ */
@media (max-width: 1024px) {
    .hero { gap: 40px; }
    .hero-image img { width: 320px; }

    .arc-stage { height: 340px; }
    .arc-proj-grid { grid-template-columns: repeat(3, 1fr); gap: 14px; }
    .arc-proj-card { height: 160px; }

    .exp-card { padding: 30px; }
    .exp-title h3 { font-size: 20px; }
}

/* ════════════════════════════════════
   RESPONSIVE — MOBILE (≤ 768px)
═══════════════════════════════════ */
@media (max-width: 768px) {
    /* Hero: stack vertically, centred */
    .hero {
        flex-direction: column;
        align-items: center;
        text-align: center;
        gap: 24px;
        min-height: unset;
        padding-top: 40px;
        padding-bottom: 48px;
        overflow: hidden;
    }

    /* Text container must not exceed viewport */
    .hero-text {
        width: 100%;
        max-width: 100%;
        overflow: hidden;
        min-width: 0;
    }

    /* clamp keeps name on one line and never overflows */
    .hero-text h1 {
        font-size: clamp(22px, 8vw, 38px);
        white-space: normal;
        word-break: break-word;
        overflow-wrap: break-word;
    }

    .hero-desc {
        font-size: 14px;
        max-width: 100%;
    }

    /* Image: above the text, smaller */
    .hero-image {
        width: 100%;
        justify-content: center;
        order: -1;
    }
    .hero-image img { width: 180px; }

    .hero-meta { justify-content: center; gap: 8px; }
    .meta-chip { font-size: 11px; padding: 5px 11px; }

    .hero-actions { justify-content: center; }

    /* Arc */
    .arc-stage { height: 260px; }

    .arc-proj-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
        padding: 0 12px;
    }
    .arc-proj-card { height: 130px; border-radius: 14px; }

    /* Experience */
    .exp-card { padding: 22px 18px; }

    .exp-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 6px;
        margin-bottom: 16px;
    }

    .exp-date { white-space: normal; font-size: 12px; }
    .exp-title h3 { font-size: 17px; }
    .exp-body li { font-size: 14px; }
}

/* ════════════════════════════════════
   RESPONSIVE — SMALL MOBILE (≤ 420px)
═══════════════════════════════════ */
@media (max-width: 420px) {
    .hero-image img { width: 150px; }

    .arc-stage { height: 220px; }
    .arc-proj-grid { gap: 8px; padding: 0 10px; }
    .arc-proj-card { height: 110px; border-radius: 12px; }

    .exp-card { padding: 18px 14px; }
}

/* ════════════════════════════════════
   ANIMATIONS
═══════════════════════════════════ */

/* ── 1. Page-load fade-up (hero text) ── */
.anim-fade {
    opacity: 0;
    transform: translateY(28px);
    animation: animFadeUp 0.75s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    animation-delay: var(--d, 0s);
}
@keyframes animFadeUp {
    to { opacity: 1; transform: translateY(0); }
}

/* ── 2. Hero image slides in from right ── */
.anim-slide-right {
    opacity: 0;
    transform: translateX(60px);
    animation: animSlideRight 0.9s cubic-bezier(0.22, 1, 0.36, 1) 0.3s forwards;
}
@keyframes animSlideRight {
    to { opacity: 1; transform: translateX(0); }
}

/* ── 3. Scroll reveal — for cards/elements (NOT full sections) ── */
.reveal-card {
    opacity: 0;
    transform: translateY(40px);
    transition: opacity 0.75s cubic-bezier(0.22,1,0.36,1),
                transform 0.75s cubic-bezier(0.22,1,0.36,1);
}
.reveal-card.revealed {
    opacity: 1;
    transform: translateY(0);
}

/* ── 4. Profile image float ── */
.hero-image img {
    animation: floatImg 5s ease-in-out infinite;
}
@keyframes floatImg {
    0%, 100% { transform: translateY(0px);   }
    50%       { transform: translateY(-14px); }
}

/* ── 5. Green name gradient shimmer ── */
.hero-text .name {
    background: linear-gradient(90deg,
        var(--green-light) 0%,
        #86efac         30%,
        var(--green)     60%,
        var(--green-light) 100%);
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: nameShimmer 3s linear infinite;
}
@keyframes nameShimmer {
    to { background-position: 200% center; }
}

/* ── 6. Badge shimmer sweep ── */
.badge {
    position: relative;
    overflow: hidden;
}
.badge::after {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(105deg,
        transparent 40%,
        rgba(255,255,255,0.15) 50%,
        transparent 60%);
    transform: translateX(-100%);
    animation: badgeSweep 2.5s ease-in-out infinite;
}
@keyframes badgeSweep {
    0%   { transform: translateX(-100%); }
    60%  { transform: translateX(200%); }
    100% { transform: translateX(200%); }
}

/* ── 7. Meta chips pop-in staggered ── */
.meta-chip {
    opacity: 0;
    transform: scale(0.85);
    animation: chipPop 0.5s cubic-bezier(0.34,1.56,0.64,1) forwards;
}
.meta-chip:nth-child(1) { animation-delay: 0.75s; }
.meta-chip:nth-child(2) { animation-delay: 0.9s; }
.meta-chip:nth-child(3) { animation-delay: 1.05s; }
@keyframes chipPop {
    to { opacity: 1; transform: scale(1); }
}

/* ── 8. Navbar link underline slide ── */
.nav-links a {
    position: relative;
}
.nav-links a::after {
    content: '';
    position: absolute;
    bottom: -3px; left: 0;
    width: 0; height: 2px;
    background: var(--green-light);
    border-radius: 2px;
    transition: width 0.3s cubic-bezier(0.22,1,0.36,1);
}
.nav-links a:hover::after { width: 100%; }

/* ── 9. Btn pulse glow on hover ── */
.btn {
    position: relative;
    overflow: hidden;
}
.btn::before {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at center,
        rgba(255,255,255,0.2), transparent 70%);
    opacity: 0;
    transition: opacity 0.3s;
}
.btn:hover::before { opacity: 1; }

/* ── 10. Experience card active green border pulse ── */
.exp-card.active {
    border-color: rgba(34, 197, 94, 0.3);
    animation: cardBorderPulse 3s ease-in-out infinite;
}
@keyframes cardBorderPulse {
    0%, 100% { border-color: rgba(34,197,94,0.2); box-shadow: none; }
    50%       { border-color: rgba(34,197,94,0.5); box-shadow: 0 0 30px rgba(34,197,94,0.08); }
}

/* ── 11. Section label letter tracking animation ── */
.section-label {
    display: inline-block;
    opacity: 0;
    letter-spacing: 6px;
    transition: opacity 0.6s ease, letter-spacing 0.6s ease;
}
.section-label.label-visible {
    opacity: 1;
    letter-spacing: 3px;
}

/* ── 12. Custom cursor glow — uses transform only (no left/top) to avoid reflow ── */
#cursor-glow {
    pointer-events: none;
    position: fixed;
    top: 0; left: 0;
    width: 320px;
    height: 320px;
    border-radius: 50%;
    background: radial-gradient(circle,
        rgba(34,197,94,0.07) 0%,
        transparent 70%);
    will-change: transform;
    z-index: 0;
    mix-blend-mode: screen;
}

/* ── 13. Arc proj cards staggered on load ── */
.arc-proj-card {
    animation: none; /* reset — JS adds class */
}
.arc-proj-card.proj-in {
    animation: projCardIn 0.5s cubic-bezier(0.22,1,0.36,1) forwards;
    opacity: 0;
}
@keyframes projCardIn {
    from { opacity: 0; transform: translateY(20px) scale(0.97); }
    to   { opacity: 1; transform: translateY(0) scale(1); }
}

/* ── Accessibility: honour system reduce-motion preference ── */
@media (prefers-reduced-motion: reduce) {
    *, *::before, *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
    .hero-image img { animation: none !important; }
    .starfield      { animation: none !important; }
    .nebula         { animation: none !important; }
    #cursor-glow    { display: none !important; }
}

</style>

<script>
(function () {
    const tools = [
        {
            id: 'ai',
            label: 'Illustrator',
            icon: "{{ asset('icons/illustrator.png') }}",
            projects: [
                { img: "{{ asset('images/illustrator/image_1.png') }}" },
                { img: "{{ asset('images/illustrator/image_2.png') }}" },
                { img: "{{ asset('images/illustrator/image_3.png') }}" },
            ]
        },
        {
            id: 'ps',
            label: 'Photoshop',
            icon: "{{ asset('icons/photoshop.png') }}",
            projects: [
                { img: "{{ asset('images/photoshop/poster_1.png') }}" },
                { img: "{{ asset('images/photoshop/poster.png') }}" },
                { img: "{{ asset('images/photoshop/poster.png') }}" },
            ]
        },
        {
            id: 'blender',
            label: 'Blender',
            icon: "{{ asset('icons/blender.png') }}",
            projects: [
                { img: "{{ asset('images/blender/watch.png') }}" },
                { img: "{{ asset('images/blender/space.png') }}" },
                { img: "{{ asset('images/blender/flower.png') }}" },
            ]
        },
        {
            id: 'ae',
            label: 'After Effects',
            icon: "{{ asset('icons/aftereffects.png') }}",
            projects: [
                { img: "{{ asset('images/3d.png') }}" },
                { img: "{{ asset('images/3d.png') }}" },
                { img: "{{ asset('images/3d.png') }}" },
            ]
        },
        {
            id: 'figma',
            label: 'Figma',
            icon: "{{ asset('icons/figma.png') }}",
            projects: [
                { img: "{{ asset('images/figma/image_1.png') }}" },
                { img: "{{ asset('images/figma/image_1 2.png') }}" },
                { img: "{{ asset('images/figma/image_3.png') }}" },
            ]
        },
    ];

    let activeIdx  = 2;
    let rotation   = 0;
    let targetRot  = 0;
    let isDragging = false;
    let lastX      = 0;
    let rafID      = null;
    let _lastW = 0, _lastH = 0;

    const stage = document.getElementById('arc-stage');
    const layer = document.getElementById('nodes-layer');
    const cv    = document.getElementById('arc-cv');

    /* ── Pre-size canvas immediately (before first RAF) so no blank flash ── */
    function primeCanvas() {
        const W = stage.offsetWidth || stage.parentElement.offsetWidth;
        const H = stage.offsetHeight;
        if (!W || !H) return;
        const dpr = window.devicePixelRatio || 1;
        cv.width  = W * dpr;
        cv.height = H * dpr;
        _lastW = W; _lastH = H;
    }
    primeCanvas();

    /* ── Draw one frame immediately (synchronous, before RAF loop) ── */
    draw();
    renderProjects();

    /* ── Then start the RAF loop ── */
    function animate() {
        const delta = targetRot - rotation;
        rotation += delta * 0.1;
        if (Math.abs(delta) > 0.01 || isDragging) draw();
        rafID = requestAnimationFrame(animate);
    }
    animate();

    function draw() {
        const W   = stage.offsetWidth;
        const H   = stage.offsetHeight;
        const dpr = window.devicePixelRatio || 1;

        if (W !== _lastW || H !== _lastH) {
            cv.width  = W * dpr;
            cv.height = H * dpr;
            _lastW = W; _lastH = H;
        }
        const ctx = cv.getContext('2d');
        ctx.setTransform(dpr, 0, 0, dpr, 0, 0);
        ctx.clearRect(0, 0, W, H);

        const centerX  = W / 2;
        const centerY  = H * 1.5;
        const radius   = H * 1.15;
        const nodeSize = W < 480 ? 52 : W < 768 ? 62 : 75;

        layer.innerHTML = '';

        tools.forEach((t, i) => {
            const baseAngle    = 220 + (i * (100 / (tools.length - 1)));
            const angle        = (baseAngle + rotation) * (Math.PI / 180);
            const x            = centerX + radius * Math.cos(angle);
            const y            = centerY + radius * Math.sin(angle);
            const distFromApex = Math.abs((baseAngle + rotation) - 270);
            const scale        = Math.max(0.4, 1.4 - (distFromApex / 65));
            const opacity      = Math.max(0, 1.1 - (distFromApex / 60));

            const wrap = document.createElement('div');
            wrap.className = `arc-node-wrap ${distFromApex < 10 ? 'active' : ''}`;
            wrap.style.cssText = `position:absolute;left:${x}px;top:${y}px;opacity:${opacity};transform:translate(-50%,-50%) scale(${scale});cursor:pointer;z-index:20;`;

            const bg = document.createElement('div');
            bg.className  = 'arc-node-bg';
            bg.style.width = bg.style.height = nodeSize + 'px';
            bg.innerHTML  = `<img src="${t.icon}" style="width:65%;height:65%;object-fit:contain;" alt="${t.label}" loading="eager">`;

            const lbl = document.createElement('span');
            lbl.className   = 'arc-node-label';
            lbl.textContent = t.label;

            wrap.appendChild(bg);
            wrap.appendChild(lbl);
            wrap.addEventListener('click', () => {
                targetRot = 270 - baseAngle;
                if (activeIdx !== i) { activeIdx = i; renderProjects(); }
            });
            layer.appendChild(wrap);
        });

        /* Arc guide line */
        ctx.beginPath();
        ctx.arc(centerX, centerY, radius, 210 * Math.PI / 180, 330 * Math.PI / 180);
        ctx.strokeStyle = 'rgba(34,197,94,0.1)';
        ctx.lineWidth   = 2;
        ctx.stroke();
    }

    /* ── Drag / Touch ── */
    const startDrag = (x) => { isDragging = true; lastX = x; };
    const moveDrag  = (x) => { if (!isDragging) return; targetRot += (x - lastX) * 0.3; lastX = x; };
    const endDrag   = () => {
        if (!isDragging) return;
        isDragging = false;
        const closest = tools.reduce((best, _, i) => {
            const a = 220 + (i    * (100 / (tools.length - 1)));
            const b = 220 + (best * (100 / (tools.length - 1)));
            return Math.abs(270 - (a + targetRot)) < Math.abs(270 - (b + targetRot)) ? i : best;
        }, 0);
        targetRot = 270 - (220 + (closest * (100 / (tools.length - 1))));
        if (activeIdx !== closest) { activeIdx = closest; renderProjects(); }
    };

    stage.addEventListener('mousedown',  e => startDrag(e.pageX));
    window.addEventListener('mousemove', e => moveDrag(e.pageX), { passive: true });
    window.addEventListener('mouseup',   endDrag);
    stage.addEventListener('touchstart', e => { e.preventDefault(); startDrag(e.touches[0].pageX); }, { passive: false });
    stage.addEventListener('touchmove',  e => { e.preventDefault(); moveDrag(e.touches[0].pageX);  }, { passive: false });
    stage.addEventListener('touchend',   endDrag);

    /* ── Render project cards ── */
    function renderProjects() {
        const t    = tools[activeIdx];
        const area = document.getElementById('arc-proj-area');
        const frag = document.createDocumentFragment();
        const grid = document.createElement('div');
        grid.className = 'arc-proj-grid';

        t.projects.forEach(p => {
            const card = document.createElement('div');
            card.className = 'arc-proj-card';
            const img = document.createElement('img');
            img.src      = p.img;
            img.alt      = t.label + ' project';
            img.loading  = 'lazy';
            img.decoding = 'async';
            img.width    = 400;
            img.height   = 200;
            card.appendChild(img);
            grid.appendChild(card);
        });

        frag.appendChild(grid);
        area.innerHTML = '';
        area.appendChild(frag);
    }

    /* ── Throttled resize ── */
    let resizeRAF = null;
    window.addEventListener('resize', () => {
        if (resizeRAF) cancelAnimationFrame(resizeRAF);
        resizeRAF = requestAnimationFrame(draw);
    }, { passive: true });

})();
</script>

<script>

/* ════════════════════════════════════
   ANIMATION JS
═══════════════════════════════════ */
(function () {
    /* Run non-critical setup in idle time */
    const idle = window.requestIdleCallback || (cb => setTimeout(cb, 1));

    /* ── Cursor glow — RAF throttled, GPU transform ── */
    const glow = document.createElement('div');
    glow.id = 'cursor-glow';
    document.body.appendChild(glow);
    let mouseX = 0, mouseY = 0, cursorRAF = null;
    window.addEventListener('mousemove', e => {
        mouseX = e.clientX; mouseY = e.clientY;
        if (!cursorRAF) {
            cursorRAF = requestAnimationFrame(() => {
                glow.style.transform = `translate(calc(${mouseX}px - 50%), calc(${mouseY}px - 50%))`;
                cursorRAF = null;
            });
        }
    }, { passive: true });

    /* ── Scroll reveal — cards only (deferred to idle) ── */
    idle(() => {
    const revealEls = document.querySelectorAll('.reveal-card');
    const observer  = new IntersectionObserver((entries) => {
        entries.forEach((entry, idx) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('revealed');
                }, idx * 80);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    revealEls.forEach(el => observer.observe(el));

    /* ── Section label reveal when section enters view ── */
    document.querySelectorAll('.section-label').forEach(label => {
        const lo = new IntersectionObserver(([e]) => {
            if (e.isIntersecting) {
                label.classList.add('label-visible');
                lo.disconnect();
            }
        }, { threshold: 0.1 });
        lo.observe(label);
    });

    /* ── Typing cursor on eyebrow ── */
    const eyebrow = document.querySelector('.eyebrow');
    if (eyebrow) {
        const text = eyebrow.textContent;
        eyebrow.textContent = '';
        eyebrow.style.borderRight = '2px solid var(--green-light)';
        eyebrow.style.whiteSpace = 'nowrap';
        eyebrow.style.overflow = 'hidden';
        eyebrow.style.display = 'inline-block';
        let i = 0;
        const type = () => {
            if (i < text.length) {
                eyebrow.textContent += text[i++];
                setTimeout(type, 38);
            } else {
                // blink then remove cursor
                setTimeout(() => { eyebrow.style.borderRight = 'none'; }, 1200);
            }
        };
        setTimeout(type, 600);
    }

    /* ── Stagger arc project cards: observer on arc-proj-area ── */
    const arcArea = document.getElementById('arc-proj-area');
    if (arcArea) {
        const mo = new MutationObserver(() => {
            requestAnimationFrame(() => {
                arcArea.querySelectorAll('.arc-proj-card:not(.proj-in)').forEach((card, i) => {
                    card.style.animationDelay = (i * 0.1) + 's';
                    card.classList.add('proj-in');
                });
            });
        });
        mo.observe(arcArea, { childList: true, subtree: false });
    }

    /* ── h2 word-by-word reveal ── */
    document.querySelectorAll('h2').forEach(h2 => {
        const words = h2.innerHTML.split(' ');
        h2.innerHTML = words.map((w, i) =>
            `<span class="h2-word" style="display:inline-block;opacity:0;transform:translateY(20px);transition:opacity 0.5s ${i*0.08}s,transform 0.5s ${i*0.08}s">${w}</span>`
        ).join(' ');

        const h2obs = new IntersectionObserver(([e]) => {
            if (e.isIntersecting) {
                h2.querySelectorAll('.h2-word').forEach(w => {
                    w.style.opacity  = '1';
                    w.style.transform = 'translateY(0)';
                });
                h2obs.disconnect();
            }
        }, { threshold: 0.15 });
        h2obs.observe(h2);
    });

    }); // end idle

})();

</script>

@endsection