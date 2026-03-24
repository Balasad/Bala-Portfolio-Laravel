@extends('layouts.app')

@section('content')

{{-- ── Hero Section ──────────────────────────────────── --}}
<section class="hero">
    <div class="nebula" style="right: -100px; top: 0;"></div>
    <div class="hero-text">
        <p class="eyebrow">UI/UX Designer · Laravel Developer · Creative Designer</p>
        <h1>Hi, I'm <span class="name">Balasaravanan S</span></h1>
        <p>UI/UX Designer and Web Developer based in Chennai — designing intuitive interfaces in Figma, building responsive apps with Laravel, and crafting immersive visuals in Blender & Illustrator.</p>
        <div class="hero-meta">
            <span class="meta-chip">📍 Chennai, India</span>
            <span class="meta-chip">💼 TeraMed Technologies</span>
            <span class="meta-chip">🎓 B.E. CSE</span>
        </div>
        <div class="hero-actions">
            <button class="btn">View My Work</button>
            <a href="{{ asset('Bala_Saravanan_Resume.pdf') }}" download class="btn-outline">Download CV</a>
        </div>
    </div>
    <div class="hero-image">
        <img src="{{ asset('images/profile.png') }}" alt="Profile Image">
    </div>
</section>

{{-- ── Portfolio Section (Arc) ────────────────────────── --}}
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

{{-- ── Experience Section ────────────────────────────── --}}
<section class="experience" id="experience">
    <p class="section-label">Professional Experience</p>
    <h2>Currently Building</h2>

    <div class="exp-timeline">
        <div class="exp-card active">
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
/* ── Hero Tweaks ── */
.hero { display: flex; align-items: center; min-height: 90vh; }
.hero-text { flex: 1; z-index: 2; }
.hero-text h1 { font-size: 58px; font-weight: 900; line-height: 1.1; margin: 10px 0; }
.hero-text .name { background: linear-gradient(90deg, var(--green-light), var(--green)); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
.hero-meta { display: flex; gap: 10px; margin: 20px 0; }
.meta-chip { background: rgba(255,255,255,0.05); border: 1px solid var(--border); padding: 6px 15px; border-radius: 20px; font-size: 13px; }
.hero-image img { width: 450px; filter: drop-shadow(0 0 40px var(--green-glow)); }
.btn-outline { border: 2px solid var(--green); padding: 10px 24px; border-radius: 30px; color: #fff; text-decoration: none; font-weight: 700; transition: 0.3s; }
.btn-outline:hover { background: var(--green-dim); }

/* ── Arc Arc Section Style ── */
.arc-card { background: rgba(15, 23, 42, 0.4); backdrop-filter: blur(10px); border-radius: 24px; border: 1px solid var(--border); padding: 20px 0 60px; position: relative; overflow: hidden; }
.arc-stage { position: relative; width: 100%; height: 400px; display: flex; justify-content: center; }
#arc-cv { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
.nodes-layer { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
.arc-node-bg { border-radius: 50%; background: #e5e7eb; display: flex; align-items: center; justify-content: center; transition: 0.4s; }
.arc-node-wrap.active .arc-node-bg { background: #fff; box-shadow: 0 0 25px var(--green-light); border: 3px solid var(--green); }
.arc-node-label { position: absolute; top: 110%; font-size: 11px; font-weight: 900; color: rgba(255,255,255,0.3); letter-spacing: 1px; }

/* ── Experience Cards ── */
.exp-timeline { display: flex; flex-direction: column; gap: 20px; }
.exp-card { 
    background: rgba(255,255,255,0.02); 
    border: 1px solid var(--border); 
    border-radius: 24px; 
    padding: 40px; 
    position: relative; 
    overflow: hidden; 
    transition: 0.4s;
}
.exp-card:hover { border-color: var(--green); transform: translateY(-5px); }
.exp-glow { position: absolute; top: 0; right: 0; width: 200px; height: 200px; background: radial-gradient(circle, var(--green-dim), transparent 70%); opacity: 0.5; }
.exp-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 25px; }
.exp-title h3 { font-size: 24px; color: var(--green-light); }
.exp-date { font-weight: 700; color: var(--text-muted); opacity: 0.8; }
.exp-body p { margin-bottom: 15px; line-height: 1.6; color: var(--text-muted); }
.exp-body ul { list-style: none; margin-bottom: 20px; }
.exp-body li { position: relative; padding-left: 20px; margin-bottom: 10px; color: #cbd5e1; font-size: 15px; }
.exp-body li::before { content: '→'; position: absolute; left: 0; color: var(--green); }
.badge-row { display: flex; flex-wrap: wrap; gap: 8px; }
.badge { background: var(--green-dim); border: 1px solid rgba(34,197,94,0.2); color: var(--green-light); padding: 5px 12px; border-radius: 12px; font-size: 11px; font-weight: 700; }
</style>

<script>
(function(){
    const tools = [
        {id:'ai', label:'Illustrator', icon:"{{ asset('icons/illustrator.png') }}", projects:[{img:"{{ asset('images/illustrator/image_1.png') }}"}, {img:"{{ asset('images/illustrator/image_2.png') }}"}, {img:"{{ asset('images/illustrator/image_3.png') }}"}]},
        {id:'ps', label:'Photoshop', icon:"{{ asset('icons/photoshop.png') }}", projects:[{img:"{{ asset('images/photoshop/poster_1.png') }}"}, {img:"{{ asset('images/photoshop/poster.png') }}"}, {img:"{{ asset('images/photoshop/poster.png') }}"}]},
        {id:'blender', label:'Blender', icon:"{{ asset('icons/blender.png') }}", projects:[{img:"{{ asset('images/blender/watch.png') }}"}, {img:"{{ asset('images/blender/space.png') }}"}, {img:"{{ asset('images/blender/flower.png') }}"}]},
        {id:'ae', label:'After Effects', icon:"{{ asset('icons/aftereffects.png') }}", projects:[{img:"{{ asset('images/3d.png') }}"}, {img:"{{ asset('images/3d.png') }}"}, {img:"{{ asset('images/3d.png') }}"}]},
        {id:'figma', label:'Figma', icon:"{{ asset('icons/figma.png') }}", projects:[{img:"{{ asset('images/figma/image_1.png') }}"}, {img:"{{ asset('images/figma/image_1 2.png') }}"}, {img:"{{ asset('images/figma/image_3.png') }}"}]},
    ];

    let activeIdx = 2; 
    let rotation = 0; let targetRot = 0;
    let isDragging = false, startX = 0, lastX = 0;

    const stage = document.getElementById('arc-stage');
    const layer = document.getElementById('nodes-layer');
    const cv = document.getElementById('arc-cv');

    function animate() {
        rotation += (targetRot - rotation) * 0.1;
        draw();
        requestAnimationFrame(animate);
    }

    function draw() {
        const W = stage.offsetWidth, H = stage.offsetHeight, dpr = window.devicePixelRatio || 1;
        cv.width = W * dpr; cv.height = H * dpr;
        const ctx = cv.getContext('2d');
        ctx.scale(dpr, dpr); ctx.clearRect(0, 0, W, H);

        const centerX = W / 2, centerY = H * 1.5, radius = H * 1.15;
        layer.innerHTML = '';

        tools.forEach((t, i) => {
            const baseAngle = 220 + (i * (100 / (tools.length - 1)));
            const angle = (baseAngle + rotation) * (Math.PI / 180);
            const x = centerX + radius * Math.cos(angle);
            const y = centerY + radius * Math.sin(angle);
            const distFromApex = Math.abs((baseAngle + rotation) - 270);
            const scale = Math.max(0.4, 1.4 - (distFromApex / 65));
            const opacity = Math.max(0, 1.1 - (distFromApex / 60));

            const wrap = document.createElement('div');
            wrap.className = `arc-node-wrap ${distFromApex < 10 ? 'active' : ''}`;
            wrap.style.cssText = `position:absolute; left:${x}px; top:${y}px; opacity:${opacity}; transform:translate(-50%, -50%) scale(${scale}); cursor:pointer; z-index:20;`;

            const bg = document.createElement('div');
            bg.className = 'arc-node-bg';
            bg.style.width = '75px'; bg.style.height = '75px';
            bg.innerHTML = `<img src="${t.icon}" style="width:65%; height:65%; object-fit:contain;">`;

            wrap.appendChild(bg);
            wrap.appendChild(document.createRange().createContextualFragment(`<span class="arc-node-label">${t.label}</span>`));
            wrap.onclick = (e) => { targetRot = 270 - baseAngle; if(activeIdx !== i) { activeIdx = i; renderProjects(); } };
            layer.appendChild(wrap);
        });
        ctx.beginPath(); ctx.arc(centerX, centerY, radius, 210 * Math.PI/180, 330 * Math.PI/180);
        ctx.strokeStyle = 'rgba(34,197,94,0.1)'; ctx.lineWidth = 2; ctx.stroke();
    }

    const startDrag = (x) => { isDragging = true; startX = x; lastX = x; };
    const moveDrag = (x) => { if (!isDragging) return; targetRot += (x - lastX) * 0.3; lastX = x; };
    const endDrag = () => {
        isDragging = false;
        const closest = tools.reduce((prev, curr, i) => {
            const baseAngle = 220 + (i * (100 / (tools.length - 1)));
            return Math.abs(270 - (baseAngle + targetRot)) < Math.abs(270 - (220 + (prev * (100 / (tools.length - 1))) + targetRot)) ? i : prev;
        }, 0);
        targetRot = 270 - (220 + (closest * (100 / (tools.length - 1))));
        if(activeIdx !== closest) { activeIdx = closest; renderProjects(); }
    };

    stage.addEventListener('mousedown', e => startDrag(e.pageX));
    window.addEventListener('mousemove', e => moveDrag(e.pageX));
    window.addEventListener('mouseup', endDrag);
    stage.addEventListener('touchstart', e => startDrag(e.touches[0].pageX));
    window.addEventListener('touchmove', e => moveDrag(e.touches[0].pageX));
    window.addEventListener('touchend', endDrag);

    function renderProjects() {
        const t = tools[activeIdx];
        document.getElementById('arc-proj-area').innerHTML = `
            <div class="arc-proj-grid" style="display:grid; grid-template-columns:repeat(3, 1fr); gap:20px; animation:fadeInUp 0.6s;">
                ${t.projects.map(p => `<div class="arc-proj-card" style="height:200px; border-radius:20px; overflow:hidden; border:1px solid var(--border);"><img src="${p.img}" style="width:100%; height:100%; object-fit:cover;"></div>`).join('')}
            </div>`;
    }

    window.addEventListener('resize', draw);
    animate(); renderProjects();
})();
</script>
@endsection