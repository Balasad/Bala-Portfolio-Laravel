{{-- resources/views/portfolio.blade.php --}}
@extends('layouts.app')

@section('content')

{{-- ── Hero ──────────────────────────────────── --}}
<section class="hero">
    <div class="hero-glow"></div>

    <div class="hero-text">
        <p class="eyebrow">UI/UX Designer · Laravel Developer · Creative Designer</p>
        <h1>
            Hi, I'm
            <span class="name">Bala Saravanan</span>
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
        <img src="{{ asset('images/watch.png') }}" alt="3D Watch Render">
    </div>
</section>

{{-- ── Portfolio ─────────────────────────────── --}}
<section class="portfolio">

    <p class="section-label">Selected Works</p>
    <h2>Featured Projects</h2>

    {{-- Tabs --}}
    <div class="tabs">
        <button class="tab-btn active" data-tab="blender">🎬 Blender</button>
        <button class="tab-btn" data-tab="illustrator">🎨 Illustrator</button>
    </div>

    {{-- ── Blender Tab ─────────────────────── --}}
    <div class="tab-panel active" id="tab-blender">

        {{-- Bento Grid --}}
        <div class="bento">

            {{-- Card A: Software Logos (tall left) --}}
            <div class="bento-card bento-logos">
                <p class="bento-label">Tools I Use</p>
                <div class="logo-grid">
                    <div class="logo-chip">
                        <span class="logo-icon blender-icon">B</span>
                        <span>Blender</span>
                    </div>
                    <div class="logo-chip">
                        <span class="logo-icon ps-icon">Ps</span>
                        <span>Photoshop</span>
                    </div>
                    <div class="logo-chip">
                        <span class="logo-icon ai-icon">Ai</span>
                        <span>Illustrator</span>
                    </div>
                    <div class="logo-chip">
                        <span class="logo-icon ae-icon">Ae</span>
                        <span>After Effects</span>
                    </div>
                    <div class="logo-chip logo-chip-wide">
                        <span class="logo-icon fig-icon">Fg</span>
                        <span>Figma</span>
                    </div>
                </div>
                <div class="bento-glow"></div>
            </div>

            {{-- Card B: Projects count (top middle) --}}
            <div class="bento-card bento-stat">
                <p class="bento-label">Projects Built</p>
                <div class="stat-number" data-count="3">0+</div>
                <p class="stat-sub">HRMS/ERP, Face Recognition Attendance & Arduino Reminder</p>
                <div class="bento-glow"></div>
            </div>

            {{-- Card C: Years of experience (top right) --}}
            <div class="bento-card bento-exp">
                <p class="bento-label">Experience</p>
                <div class="stat-number" data-count="1">0+</div>
                <p class="stat-sub">Year at TeraMed Technologies — UI/UX & Laravel</p>
                <div class="exp-bar-wrap">
                    <div class="exp-bar"><div class="exp-fill" style="width:85%"></div></div>
                    <span class="exp-tag">Figma / UI·UX</span>
                    <div class="exp-bar"><div class="exp-fill" style="width:80%"></div></div>
                    <span class="exp-tag">Laravel / PHP</span>
                    <div class="exp-bar"><div class="exp-fill" style="width:70%"></div></div>
                    <span class="exp-tag">Blender / Illustrator</span>
                </div>
                <div class="bento-glow"></div>
            </div>

            {{-- Card D: Featured video project (wide bottom left) --}}
            <div class="bento-card bento-video"
                 onmouseenter="this.querySelector('video').play()"
                 onmouseleave="this.querySelector('video').pause(); this.querySelector('video').currentTime=0;">
                <video src="{{ asset('videos/watch_render.mp4') }}"
                       muted loop playsinline preload="metadata"
                       poster="{{ asset('images/watch.png') }}"></video>
                <div class="play-hint">▶</div>
                <div class="project-info">
                    <h3>Luxury Watch Render</h3>
                    <div class="badge-row">
                        <span class="badge">Blender</span>
                        <span class="badge">Cycles</span>
                    </div>
                    <a href="#" class="card-link">View ↗</a>
                </div>
                <div class="bento-glow"></div>
            </div>

            {{-- Card E: Second video (bottom middle) --}}
            <div class="bento-card bento-video-sm"
                 onmouseenter="this.querySelector('video').play()"
                 onmouseleave="this.querySelector('video').pause(); this.querySelector('video').currentTime=0;">
                <video src="{{ asset('videos/product_anim.mp4') }}"
                       muted loop playsinline preload="metadata"
                       poster="{{ asset('images/3d.png') }}"></video>
                <div class="play-hint">▶</div>
                <div class="project-info">
                    <h3>Product Animation</h3>
                    <div class="badge-row">
                        <span class="badge">Blender</span>
                        <span class="badge">EEVEE</span>
                    </div>
                    <a href="#" class="card-link">View ↗</a>
                </div>
                <div class="bento-glow"></div>
            </div>

            {{-- Card F: Third video (bottom right) --}}
            <div class="bento-card bento-video-sm"
                 onmouseenter="this.querySelector('video').play()"
                 onmouseleave="this.querySelector('video').pause(); this.querySelector('video').currentTime=0;">
                <video src="{{ asset('videos/scene_render.mp4') }}"
                       muted loop playsinline preload="metadata"
                       poster="{{ asset('images/watch.png') }}"></video>
                <div class="play-hint">▶</div>
                <div class="project-info">
                    <h3>Scene Visualization</h3>
                    <div class="badge-row">
                        <span class="badge">Blender</span>
                        <span class="badge">Shader FX</span>
                    </div>
                    <a href="#" class="card-link">View ↗</a>
                </div>
                <div class="bento-glow"></div>
            </div>

        </div>
    </div>

    {{-- ── Illustrator Tab ──────────────────── --}}
    <div class="tab-panel" id="tab-illustrator">

        <div class="bento">

            {{-- Card A: Illustrator tools --}}
            <div class="bento-card bento-logos">
                <p class="bento-label">Tools I Use</p>
                <div class="logo-grid">
                    <div class="logo-chip">
                        <span class="logo-icon blender-icon">B</span>
                        <span>Blender</span>
                    </div>
                    <div class="logo-chip">
                        <span class="logo-icon ps-icon">Ps</span>
                        <span>Photoshop</span>
                    </div>
                    <div class="logo-chip">
                        <span class="logo-icon ai-icon">Ai</span>
                        <span>Illustrator</span>
                    </div>
                    <div class="logo-chip">
                        <span class="logo-icon ae-icon">Ae</span>
                        <span>After Effects</span>
                    </div>
                    <div class="logo-chip logo-chip-wide">
                        <span class="logo-icon fig-icon">Fg</span>
                        <span>Figma</span>
                    </div>
                </div>
                <div class="bento-glow"></div>
            </div>

            {{-- Card B: Illustrator projects count --}}
            <div class="bento-card bento-stat">
                <p class="bento-label">Design Works</p>
                <div class="stat-number" data-count="2">0+</div>
                <p class="stat-sub">TeraMed Academy UI & HRMS dashboard designed in Figma</p>
                <div class="bento-glow"></div>
            </div>

            {{-- Card C: Years --}}
            <div class="bento-card bento-exp">
                <p class="bento-label">Design Skills</p>
                <div class="stat-number" data-count="1">0+</div>
                <p class="stat-sub">Year of professional UI/UX experience</p>
                <div class="exp-bar-wrap">
                    <div class="exp-bar"><div class="exp-fill" style="width:90%"></div></div>
                    <span class="exp-tag">Figma</span>
                    <div class="exp-bar"><div class="exp-fill" style="width:80%"></div></div>
                    <span class="exp-tag">Illustrator</span>
                    <div class="exp-bar"><div class="exp-fill" style="width:75%"></div></div>
                    <span class="exp-tag">Photoshop</span>
                </div>
                <div class="bento-glow"></div>
            </div>

            {{-- Card D: Featured image (wide) --}}
            <div class="bento-card bento-video">
                <img src="{{ asset('images/poster.png') }}" alt="Creative Poster">
                <div class="project-info">
                    <h3>Creative Poster</h3>
                    <div class="badge-row">
                        <span class="badge">Illustrator</span>
                        <span class="badge">Print</span>
                    </div>
                    <a href="#" class="card-link">View ↗</a>
                </div>
                <div class="bento-glow"></div>
            </div>

            {{-- Card E --}}
            <div class="bento-card bento-video-sm">
                <img src="{{ asset('images/brand.png') }}" alt="Brand Identity">
                <div class="project-info">
                    <h3>Brand Identity</h3>
                    <div class="badge-row">
                        <span class="badge">Illustrator</span>
                        <span class="badge">Branding</span>
                    </div>
                    <a href="#" class="card-link">View ↗</a>
                </div>
                <div class="bento-glow"></div>
            </div>

            {{-- Card F --}}
            <div class="bento-card bento-video-sm">
                <img src="{{ asset('images/vector.png') }}" alt="Vector Art">
                <div class="project-info">
                    <h3>Vector Illustration</h3>
                    <div class="badge-row">
                        <span class="badge">Illustrator</span>
                        <span class="badge">Vector Art</span>
                    </div>
                    <a href="#" class="card-link">View ↗</a>
                </div>
                <div class="bento-glow"></div>
            </div>

        </div>
    </div>

</section>

<style>
/* ── Bento Grid ────────────────────────────── */
.bento {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: auto auto;
    gap: 18px;
}

/* Base bento card */
.bento-card {
    position: relative;
    overflow: hidden;
    border-radius: 18px;
    background: rgba(8, 20, 12, 0.85);
    border: 1px solid rgba(34,197,94,0.12);
    padding: 28px;
    transition: transform 0.35s, box-shadow 0.35s, border-color 0.35s;
}

.bento-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 40px rgba(34,197,94,0.15);
    border-color: rgba(34,197,94,0.3);
}

/* Subtle internal glow */
.bento-glow {
    position: absolute;
    bottom: -40px;
    right: -40px;
    width: 180px;
    height: 180px;
    background: radial-gradient(circle, rgba(34,197,94,0.12), transparent 70%);
    pointer-events: none;
    transition: opacity 0.4s;
    opacity: 0;
}

.bento-card:hover .bento-glow { opacity: 1; }

.bento-label {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: var(--green);
    margin-bottom: 16px;
}

/* ── Layout assignments ─────────────────────── */
/* Row 1 */
.bento-logos  { grid-column: 1; grid-row: 1; }
.bento-stat   { grid-column: 2; grid-row: 1; }
.bento-exp    { grid-column: 3; grid-row: 1; }

/* Row 2 */
.bento-video    { grid-column: 1 / span 2; grid-row: 2; height: 280px; padding: 0; }
.bento-video-sm { grid-column: auto;        grid-row: 2; height: 280px; padding: 0; }

/* ── Logo chips ─────────────────────────────── */
.logo-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
}

.logo-chip {
    display: flex;
    align-items: center;
    gap: 10px;
    background: rgba(34,197,94,0.07);
    border: 1px solid rgba(34,197,94,0.15);
    border-radius: 12px;
    padding: 10px 12px;
    font-size: 12px;
    font-weight: 500;
    color: #ccc;
    transition: background 0.2s, border-color 0.2s;
}

.logo-chip:hover {
    background: rgba(34,197,94,0.14);
    border-color: rgba(34,197,94,0.35);
    color: #fff;
}

.logo-icon {
    width: 32px;
    height: 32px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 11px;
    font-weight: 900;
    flex-shrink: 0;
}

.blender-icon { background: linear-gradient(135deg, #EA7600, #2D4059); color: #fff; }
.cycles-icon  { background: linear-gradient(135deg, #5B8FB9, #2D4059); color: #fff; }
.eevee-icon   { background: linear-gradient(135deg, #4ade80, #14532d); color: #fff; }
.ps-icon      { background: linear-gradient(135deg, #31A8FF, #001E36); color: #fff; }
.ai-icon      { background: linear-gradient(135deg, #FF9A00, #2D1A00); color: #fff; }
.ae-icon      { background: linear-gradient(135deg, #9999FF, #1A1A4A); color: #fff; }
.id-icon      { background: linear-gradient(135deg, #FF3366, #2D001A); color: #fff; }
.fig-icon     { background: linear-gradient(135deg, #A259FF, #1E0047); color: #fff; }

/* 5th chip spans full width */
.logo-chip-wide { grid-column: 1 / span 2; }

/* ── Stat card ──────────────────────────────── */
.stat-number {
    font-family: var(--font-display);
    font-size: 64px;
    font-weight: 900;
    line-height: 1;
    background: linear-gradient(135deg, var(--green-light), var(--green));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    margin-bottom: 10px;
}

.stat-sub {
    font-size: 13px;
    color: var(--text-muted);
    line-height: 1.6;
}

/* ── Experience bars ────────────────────────── */
.exp-bar-wrap {
    margin-top: 16px;
    display: flex;
    flex-direction: column;
    gap: 5px;
}

.exp-tag {
    font-size: 10px;
    color: var(--text-muted);
    margin-top: 2px;
}

.exp-bar {
    height: 5px;
    border-radius: 10px;
    background: rgba(255,255,255,0.07);
    overflow: hidden;
}

.exp-fill {
    height: 100%;
    border-radius: 10px;
    background: linear-gradient(90deg, var(--green-light), var(--green));
    animation: growBar 1.2s ease forwards;
    transform-origin: left;
}

@keyframes growBar {
    from { width: 0 !important; }
    to   { /* width set inline */ }
}

/* ── Media cards (video / image) ────────────── */
.bento-video img,
.bento-video-sm img,
.bento-video video,
.bento-video-sm video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    transition: transform 0.5s;
    border-radius: 18px;
}

.bento-video:hover img,
.bento-video:hover video,
.bento-video-sm:hover img,
.bento-video-sm:hover video {
    transform: scale(1.05);
}

/* Play badge */
.play-hint {
    position: absolute;
    top: 12px;
    right: 12px;
    width: 34px;
    height: 34px;
    border-radius: 50%;
    background: rgba(0,0,0,0.6);
    backdrop-filter: blur(6px);
    border: 1px solid rgba(255,255,255,0.15);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    z-index: 3;
    transition: opacity 0.3s;
}

.bento-video:hover .play-hint,
.bento-video-sm:hover .play-hint { opacity: 0; }

/* Overlay */
.project-info {
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 16px 20px 20px;
    background: linear-gradient(to top, rgba(2,6,13,0.95) 55%, transparent);
    transform: translateY(100%);
    transition: transform 0.38s cubic-bezier(0.16,1,0.3,1);
    z-index: 4;
    border-radius: 0 0 18px 18px;
}

.bento-video:hover .project-info,
.bento-video-sm:hover .project-info { transform: translateY(0); }

.project-info h3 {
    font-family: var(--font-display);
    font-size: 15px;
    font-weight: 700;
    margin-bottom: 8px;
}

.badge-row {
    display: flex;
    gap: 5px;
    margin-bottom: 10px;
}

.badge {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.8px;
    text-transform: uppercase;
    padding: 3px 9px;
    border-radius: 20px;
    background: var(--green-dim);
    color: var(--green-light);
    border: 1px solid rgba(34,197,94,0.25);
}

.card-link {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-family: var(--font-display);
    font-size: 11px;
    font-weight: 700;
    color: var(--green-light);
    text-decoration: none;
    padding: 5px 13px;
    border-radius: 20px;
    border: 1px solid rgba(34,197,94,0.3);
    transition: background 0.2s;
}

.card-link:hover { background: var(--green-dim); }

/* ── Responsive ─────────────────────────────── */
@media (max-width: 1024px) {
    .bento {
        grid-template-columns: 1fr 1fr;
    }
    .bento-logos  { grid-column: 1; grid-row: 1; }
    .bento-stat   { grid-column: 2; grid-row: 1; }
    .bento-exp    { grid-column: 1 / span 2; grid-row: 2; }
    .bento-video    { grid-column: 1 / span 2; grid-row: 3; }
    .bento-video-sm { grid-column: auto; grid-row: 4; height: 220px; }
}

@media (max-width: 640px) {
    .bento { grid-template-columns: 1fr; }
    .bento-logos,
    .bento-stat,
    .bento-exp,
    .bento-video,
    .bento-video-sm { grid-column: 1; grid-row: auto; }
    .bento-video { height: 220px; }
}
</style>

{{-- ── Counter animation ───────────────────── --}}
<script>
    // Tab switching
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
            document.querySelectorAll('video').forEach(v => { v.pause(); v.currentTime = 0; });
            btn.classList.add('active');
            const panel = document.getElementById('tab-' + btn.dataset.tab);
            panel.classList.add('active');
            // Re-trigger counters for newly visible tab
            animateCounters(panel);
        });
    });

    // Count-up animation
    function animateCounters(scope) {
        scope.querySelectorAll('.stat-number[data-count]').forEach(el => {
            const target = parseInt(el.dataset.count);
            let current = 0;
            el.textContent = '0+';
            const step = Math.ceil(target / 40);
            const timer = setInterval(() => {
                current = Math.min(current + step, target);
                el.textContent = current + '+';
                if (current >= target) clearInterval(timer);
            }, 30);
        });
    }

    // Run on page load for active tab
    animateCounters(document.querySelector('.tab-panel.active'));
</script>

@endsection