@extends('layouts.app')

@section('content')

{{-- ── Hero Section ──────────────────────────────────── --}}
<section class="hero">
    <div class="hero-glow"></div>
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

{{-- ── Portfolio Section ─────────────────────────────── --}}
<section class="portfolio">
    <p class="section-label">Selected Works</p>
    <h2>Featured Projects</h2>

    <div class="arc-section">
        <div class="arc-card">
            <div class="arc-dot-grid"></div>
            <div class="arc-stage" id="arc-stage">
                <canvas id="arc-cv"></canvas>
                <div class="nodes-layer" id="nodes-layer"></div>
            </div>
            <div class="arc-projects-area" id="arc-proj-area"></div>
        </div>
    </div>
</section>

<style>
/* ── Full-Width Arc Layout ── */
.arc-section { margin-bottom: 60px; width: 100%; }
.arc-card {
    background: radial-gradient(ellipse at 50% 0%, #0f2f1f 0%, #02060d 90%);
    border-radius: 24px;
    border: 1px solid rgba(34,197,94,0.1);
    padding: 0 0 60px;
    position: relative;
    overflow: hidden;
    user-select: none;
    width: 100%;
}
.arc-dot-grid {
    position: absolute; inset: 0;
    background-image: radial-gradient(circle, rgba(34,197,94,0.04) 1px, transparent 1px);
    background-size: 40px 40px;
    pointer-events: none;
}
.arc-stage {
    position: relative;
    width: 100%;
    height: 400px; /* Taller for better arc presence */
    cursor: grab;
    display: flex;
    justify-content: center;
}
.arc-stage:active { cursor: grabbing; }

#arc-cv { position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; }
.nodes-layer { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }

/* ── Node/Icon Styling ── */
.arc-node-wrap {
    position: absolute;
    display: flex; 
    flex-direction: column; 
    align-items: center;
    justify-content: center;
    transform: translate(-50%, -50%);
    cursor: pointer;
    z-index: 20;
    transition: opacity 0.4s ease, filter 0.3s ease;
}

.arc-node-bg {
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    background: #e5e7eb; /* Light gray base like your Figma Group 12 */
    box-shadow: 0 10px 30px rgba(0,0,0,0.6);
    transition: all 0.4s cubic-bezier(.34,1.56,.64,1);
    border: 2px solid transparent;
}

.arc-node-wrap.active .arc-node-bg {
    background: #ffffff;
    box-shadow: 0 0 0 6px rgba(34,197,94,0.3), 0 20px 50px rgba(0,0,0,0.8);
    border-color: #22c55e;
}

.arc-node-label {
    position: absolute;
    top: 110%; 
    font-size: 12px; 
    font-weight: 900; 
    letter-spacing: 2px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.2);
    white-space: nowrap;
    transition: all 0.3s ease;
    pointer-events: none;
}
.arc-node-wrap.active .arc-node-label { 
    color: #4ade80; 
    transform: translateY(8px); 
    opacity: 1;
    text-shadow: 0 0 15px rgba(34,197,94,0.6);
}

/* ── Project Display ── */
.arc-projects-area { padding: 0 5%; margin-top: 20px; }
.arc-proj-grid {
    display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px;
    animation: fadeInUp 0.7s ease-out;
}
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.arc-proj-card {
    border-radius: 20px; height: 200px;
    background: #060d08; border: 1px solid rgba(34,197,94,0.1);
    overflow: hidden; position: relative; transition: 0.3s;
}
.arc-proj-card:hover { transform: translateY(-8px); border-color: #22c55e; }
.arc-proj-card img { width: 100%; height: 100%; object-fit: cover; transition: 0.6s; }

@media (max-width: 800px) { .arc-proj-grid { grid-template-columns: 1fr 1fr; } }
@media (max-width: 500px) { .arc-proj-grid { grid-template-columns: 1fr; } }
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

    let activeIdx = 2; // Blender starting in middle
    let rotation = 0; 
    let targetRot = 0;
    let isDragging = false, startX = 0, lastX = 0;

    const stage = document.getElementById('arc-stage');
    const layer = document.getElementById('nodes-layer');
    const cv = document.getElementById('arc-cv');

    function animate() {
        rotation += (targetRot - rotation) * 0.1; // Smooth interpolation
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
            // Distribute across a wide arc
            const baseAngle = 220 + (i * (100 / (tools.length - 1)));
            const angle = (baseAngle + rotation) * (Math.PI / 180);

            const x = centerX + radius * Math.cos(angle);
            const y = centerY + radius * Math.sin(angle);

            const distFromApex = Math.abs((baseAngle + rotation) - 270);
            const scale = Math.max(0.4, 1.4 - (distFromApex / 65));
            const opacity = Math.max(0, 1.1 - (distFromApex / 60));

            const wrap = document.createElement('div');
            wrap.className = `arc-node-wrap ${distFromApex < 10 ? 'active' : ''}`;
            wrap.style.left = `${x}px`; wrap.style.top = `${y}px`;
            wrap.style.opacity = opacity;
            wrap.style.transform = `translate(-50%, -50%) scale(${scale})`;

            const bg = document.createElement('div');
            bg.className = 'arc-node-bg';
            bg.style.width = '75px'; bg.style.height = '75px';
            bg.innerHTML = `<img src="${t.icon}" style="width:65%; height:65%; object-fit:contain;">`;

            wrap.appendChild(bg);
            wrap.appendChild(document.createRange().createContextualFragment(`<span class="arc-node-label">${t.label}</span>`));
            
            // Interaction: Click to snap to center
            wrap.onclick = (e) => {
                e.stopPropagation();
                targetRot = 270 - baseAngle;
                if(activeIdx !== i) { activeIdx = i; renderProjects(); }
            };
            
            layer.appendChild(wrap);
        });

        // Background Arc Line
        ctx.beginPath();
        ctx.arc(centerX, centerY, radius, 210 * Math.PI/180, 330 * Math.PI/180);
        ctx.strokeStyle = 'rgba(34,197,94,0.15)'; ctx.lineWidth = 2; ctx.stroke();
    }

    // Drag / Swipe Logic
    const startDrag = (x) => { isDragging = true; startX = x; lastX = x; };
    const moveDrag = (x) => {
        if (!isDragging) return;
        const delta = (x - lastX) * 0.3;
        targetRot += delta;
        lastX = x;
    };
    const endDrag = () => {
        if (!isDragging) return;
        isDragging = false;
        // Snap to nearest
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
            <div class="arc-proj-grid">${t.projects.map(p => `<div class="arc-proj-card"><img src="${p.img}"></div>`).join('')}</div>`;
    }

    window.addEventListener('resize', draw);
    animate();
    renderProjects();
})();
</script>
@endsection