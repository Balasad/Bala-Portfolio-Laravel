{{-- resources/views/portfolio.blade.php --}}
@extends('layouts.app')

@section('content')

{{-- ── Hero Section ──────────────────────────────────── --}}
<section class="hero">
    <div class="hero-glow"></div>

    <div class="hero-text">
        <p class="eyebrow">UI/UX Designer · Laravel Developer · Creative Designer</p>
        <h1>
            Hi, I'm
            <span class="name">Balasaravanan S</span>
        </h1>
        <p>
            UI/UX Designer and Web Developer based in Chennai — designing
            intuitive interfaces in Figma, building responsive apps with
            Laravel, and crafting immersive visuals in Blender & Illustrator.
        </p>
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
/* ── Arc Layout ── */
.arc-section { margin-bottom: 60px; }
.arc-card {
    background: radial-gradient(ellipse at 50% 0%, #0f2f1f 0%, #02060d 70%);
    border-radius: 22px;
    border: 1px solid rgba(34,197,94,0.12);
    padding: 0 0 40px;
    position: relative;
    overflow: hidden;
}
.arc-dot-grid {
    position: absolute; inset: 0;
    background-image: radial-gradient(circle, rgba(34,197,94,0.07) 1px, transparent 1px);
    background-size: 24px 24px;
    pointer-events: none;
}
.arc-stage {
    position: relative;
    width: 100%;
    height: 300px; /* Increased height for label clearance */
}
#arc-cv {
    position: absolute; top: 0; left: 0;
    width: 100%; height: 100%;
    pointer-events: none;
}
.nodes-layer {
    position: absolute; top: 0; left: 0;
    width: 100%; height: 100%;
}

/* ── Node/Icon Styling ── */
.arc-node-wrap {
    position: absolute;
    display: flex; 
    flex-direction: column; 
    align-items: center;
    justify-content: center;
    transform: translate(-50%, -50%); /* Fixed: keeps circle center ON the line */
    cursor: pointer;
    transition: filter 0.3s;
    z-index: 10;
}
.arc-node-wrap:hover { filter: brightness(1.25); }

.arc-node-bg {
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    box-shadow: 0 4px 20px rgba(0,0,0,0.5);
    transition: all 0.4s cubic-bezier(.34,1.56,.64,1);
    background: radial-gradient(circle, #ffffff, #d1d1d1);
}
.arc-node-wrap.active .arc-node-bg {
    box-shadow: 0 0 0 4px rgba(34,197,94,0.4), 0 10px 30px rgba(0,0,0,0.7);
    transform: scale(1.15);
}

.arc-node-label {
    position: absolute; /* Fixed: floating label doesn't push the icon up */
    top: 115%; 
    font-size: 11px; 
    font-weight: 700; 
    letter-spacing: 0.8px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.3);
    white-space: nowrap;
    transition: all 0.3s ease;
    pointer-events: none;
}
.arc-node-wrap.active .arc-node-label { 
    color: #4ade80; 
    transform: translateY(4px); 
    text-shadow: 0 0 10px rgba(34,197,94,0.4);
}

/* ── Project Grid ── */
.arc-projects-area { padding: 0 32px; margin-top: 10px; }
.arc-proj-header {
    font-size: 12px; font-weight: 700; letter-spacing: 2.5px;
    text-transform: uppercase; color: rgba(34,197,94,0.8);
    margin-bottom: 20px; display: flex; align-items: center; gap: 12px;
}
.arc-proj-badge {
    font-size: 10px; padding: 3px 12px; border-radius: 20px;
    background: rgba(34,197,94,0.1); color: #4ade80;
    border: 1px solid rgba(34,197,94,0.25);
}
.arc-proj-grid {
    display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px;
    animation: arcReveal 0.5s cubic-bezier(.16,1,.3,1) forwards;
}

@keyframes arcReveal {
    from { opacity: 0; transform: translateY(15px); }
    to { opacity: 1; transform: translateY(0); }
}

.arc-proj-card {
    border-radius: 16px; height: 170px;
    background: #0a1a0f; border: 1px solid rgba(34,197,94,0.1);
    position: relative; overflow: hidden; cursor: pointer;
    transition: all 0.3s ease;
}
.arc-proj-card:hover {
    border-color: rgba(34,197,94,0.4);
    transform: translateY(-5px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.4);
}
.arc-proj-card img { width: 100%; height: 100%; object-fit: cover; transition: 0.5s; }
.arc-proj-card:hover img { transform: scale(1.08); }

.arc-proj-overlay {
    position: absolute; bottom: 0; width: 100%;
    padding: 15px;
    background: linear-gradient(to top, rgba(2,6,13,0.98) 50%, transparent);
    transform: translateY(100%); transition: 0.4s cubic-bezier(.16,1,.3,1);
}
.arc-proj-card:hover .arc-proj-overlay { transform: translateY(0); }

@media (max-width: 900px) { .arc-proj-grid { grid-template-columns: repeat(2, 1fr); } }
@media (max-width: 600px) { 
    .arc-proj-grid { grid-template-columns: 1fr; }
    .arc-stage { height: 220px; }
}
</style>

<script>
(function(){
    const tools = [
        {id:'blender', label:'Blender', icon:"{{ asset('icons/blender.png') }}",
         projects:[
           {title:'Luxury Watch Render', tags:['Blender','Cycles'], img:"{{ asset('images/blender/watch.png') }}"},
           {title:'Product Animation', tags:['Blender','EEVEE'], img:"{{ asset('images/blender/space.png') }}"},
           {title:'Scene Visualization', tags:['Shader FX'], img:"{{ asset('images/blender/flower.png') }}"},
         ]},
        {id:'ps', label:'Photoshop', icon:"{{ asset('icons/photoshop.png') }}",
         projects:[
           {title:'Photo Retouching', tags:['Retouch','Color'], img:"{{ asset('images/photoshop/poster_1.png') }}"},
           {title:'Icon & Assets', tags:['Icons','UI'], img:"{{ asset('images/photoshop/poster.png') }}"},
           {title:'Compositing', tags:['Layers','FX'], img:"{{ asset('images/photoshop/poster.png') }}"},
         ]},
        {id:'ai', label:'Illustrator', icon:"{{ asset('icons/illustrator.png') }}",
         projects:[
           {title:'Design Project 1', tags:['Print','Vector'], img:"{{ asset('images/illustrator/image_1.png') }}"},
           {title:'Design Project 2', tags:['Logo','Branding'], img:"{{ asset('images/illustrator/image_2.png') }}"},
           {title:'Design Project 3', tags:['Vector','Art'], img:"{{ asset('images/illustrator/image_3.png') }}"},
           {title:'Design Project 3', tags:['Vector','Art'], img:"{{ asset('images/illustrator/image_3.png') }}"},
         ]},
        {id:'ae', label:'After Effects', icon:"{{ asset('icons/aftereffects.png') }}",
         projects:[
           {title:'Motion Graphics', tags:['Motion','Loop'], img:"{{ asset('images/3d.png') }}"},
           {title:'Logo Animation', tags:['AE','Brand'], img:"{{ asset('images/3d.png') }}"},
           {title:'UI Transitions', tags:['AE','UI'], img:"{{ asset('images/3d.png') }}"},
         ]},
        {id:'figma', label:'Figma', icon:"{{ asset('icons/figma.png') }}",
         projects:[
           {title:'Portfolio Assets', tags:['Figma','UX'], img:"{{ asset('images/figma/image_1.png') }}"},
           {title:'HRMS Dashboard', tags:['Design Sys'], img:"{{ asset('images/figma/image_1 2.png') }}"},
           {title:'Wireframe Prototype', tags:['Figma','Proto'], img:"{{ asset('images/figma/image_3.png') }}"},
         ]},
    ];

    let active = 2;

    function arcY(x, W, H) {
        const cx = W / 2;
        const topY = H * 0.32; // Apex
        const edgeY = H * 0.82; // Footers
        const a = (edgeY - topY) / Math.pow(W / 2 - (W * 0.06), 2);
        return a * Math.pow(x - cx, 2) + topY;
    }

    function nodeSize(i, n) {
        const dist = Math.abs(i - (n - 1) / 2) / ((n - 1) / 2);
        return Math.round(76 - (76 - 48) * dist);
    }

    function buildArc() {
        const stage = document.getElementById('arc-stage');
        const layer = document.getElementById('nodes-layer');
        const cv = document.getElementById('arc-cv');
        if(!stage || !cv) return;

        const W = stage.offsetWidth, H = stage.offsetHeight, dpr = window.devicePixelRatio || 1;
        cv.width = W * dpr; cv.height = H * dpr;
        cv.style.width = W + 'px'; cv.style.height = H + 'px';
        const ctx = cv.getContext('2d');
        ctx.scale(dpr, dpr); ctx.clearRect(0, 0, W, H);

        const n = tools.length, pad = W * 0.08;
        const xs = tools.map((_, i) => pad + (W - 2 * pad) * i / (n - 1));
        const ys = xs.map(x => arcY(x, W, H));

        // Draw the Curve Line
        ctx.beginPath();
        ctx.moveTo(xs[0], ys[0]);
        for (let i = 0; i < n - 1; i++) {
            const xc = (xs[i] + xs[i + 1]) / 2;
            const yc = (ys[i] + ys[i + 1]) / 2;
            ctx.quadraticCurveTo(xs[i], ys[i], xc, yc);
        }
        ctx.lineTo(xs[n - 1], ys[n - 1]);
        ctx.strokeStyle = 'rgba(255,255,255,0.18)';
        ctx.lineWidth = 1.2;
        ctx.stroke();

        layer.innerHTML = '';
        tools.forEach((t, i) => {
            const sz = nodeSize(i, n), isActive = i === active;
            const wrap = document.createElement('div');
            wrap.className = 'arc-node-wrap' + (isActive ? ' active' : '');
            wrap.style.left = xs[i] + 'px';
            wrap.style.top = ys[i] + 'px';

            const bg = document.createElement('div');
            bg.className = 'arc-node-bg';
            bg.style.width = sz + 'px'; bg.style.height = sz + 'px';

            const ic = document.createElement('img');
            ic.src = t.icon;
            ic.style.width = '58%'; ic.style.height = '58%';
            ic.style.objectFit = 'contain';

            const lbl = document.createElement('span');
            lbl.className = 'arc-node-label';
            lbl.textContent = t.label;

            bg.appendChild(ic);
            wrap.appendChild(bg);
            wrap.appendChild(lbl);
            
            wrap.onclick = () => {
                if (i === active) return;
                active = i;
                buildArc();
                renderProjects();
                // Smooth scroll to results
                document.getElementById('arc-proj-area').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
            };
            layer.appendChild(wrap);
        });
    }

    function renderProjects() {
        const t = tools[active], area = document.getElementById('arc-proj-area');
        area.innerHTML = `
            <div class="arc-proj-header">${t.label} Projects <span class="arc-proj-badge">${t.projects.length} Works</span></div>
            <div class="arc-proj-grid">
                ${t.projects.map(p => `
                    <div class="arc-proj-card">
                        <img src="${p.img}" alt="${p.title}">
                        <div class="arc-proj-overlay">
                            <h4>${p.title}</h4>
                            <div class="arc-proj-tags">${p.tags.map(tg => `<span class="arc-proj-tag">${tg}</span>`).join('')}</div>
                        </div>
                    </div>`).join('')}
            </div>`;
    }

    window.addEventListener('resize', buildArc);
    buildArc();
    renderProjects();
})();
</script>

@endsection