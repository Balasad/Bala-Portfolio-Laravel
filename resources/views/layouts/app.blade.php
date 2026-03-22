{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bala Portfolio</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&family=Roboto+Condensed:wght@700;900&display=swap" rel="stylesheet">

    <style>

:root {
    --green:        #22c55e;
    --green-light:  #4ade80;
    --green-dim:    rgba(34,197,94,0.15);
    --green-glow:   rgba(34,197,94,0.35);
    --bg:           #02060d;
    --bg-card:      #080f0a;
    --surface:      rgba(255,255,255,0.04);
    --border:       rgba(255,255,255,0.08);
    --text:         #ffffff;
    --text-muted:   #8a9e90;
    --radius:       16px;
    --font-display: 'Roboto Condensed', sans-serif;
    --font-body:    'Roboto', sans-serif;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: var(--font-body);
    background: var(--bg);
    color: var(--text);
    overflow-x: hidden;
}

/* Dot grid */
body::before {
    content: "";
    position: fixed;
    inset: 0;
    background-image: radial-gradient(rgba(255,255,255,0.06) 1px, transparent 1px);
    background-size: 36px 36px;
    z-index: 0;
    pointer-events: none;
}

/* ── Navbar ─────────────────────────────── */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 22px 64px;
    position: sticky;
    top: 0;
    z-index: 100;
    background: rgba(2,6,13,0.75);
    backdrop-filter: blur(18px);
    border-bottom: 1px solid var(--border);
}

.navbar-brand {
    font-family: var(--font-display);
    font-weight: 800;
    font-size: 20px;
    background: linear-gradient(90deg, #fff 60%, var(--green-light));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.nav-links {
    display: flex;
    gap: 32px;
}

.nav-links a {
    font-size: 14px;
    font-weight: 500;
    color: var(--text-muted);
    text-decoration: none;
    transition: color 0.2s;
}

.nav-links a:hover { color: var(--text); }

.btn {
    font-family: var(--font-display);
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.5px;
    padding: 10px 24px;
    border-radius: 30px;
    background: linear-gradient(135deg, var(--green), #14532d);
    color: #fff;
    border: none;
    cursor: pointer;
    transition: transform 0.25s, box-shadow 0.25s;
}

.btn:hover {
    transform: translateY(-2px) scale(1.04);
    box-shadow: 0 0 24px var(--green-glow);
}

/* ── Hero ───────────────────────────────── */
.hero {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 100px 80px;
    min-height: 100vh;
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.hero-glow {
    position: absolute;
    right: 10%;
    top: 15%;
    width: 520px;
    height: 520px;
    background: radial-gradient(circle, rgba(34,197,94,0.22), transparent 70%);
    filter: blur(90px);
    pointer-events: none;
}

.hero-text {
    max-width: 58%;
    background: rgba(0,0,0,0.28);
    backdrop-filter: blur(14px);
    padding: 40px;
    border-radius: 20px;
    border: 1px solid var(--border);
    animation: fadeUp 0.9s ease forwards;
}

.hero-text .eyebrow {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--green-light);
    margin-bottom: 12px;
}

.hero-text h1 {
    font-family: var(--font-display);
    font-size: 52px;
    font-weight: 900;
    line-height: 1.1;
    white-space: nowrap;
}

.hero-text h1 .name {
    display: block;
    white-space: nowrap;
    background: linear-gradient(90deg, var(--green-light), var(--green));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.hero-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
    margin-bottom: 24px;
}

.meta-chip {
    font-size: 12px;
    font-weight: 500;
    color: var(--text-muted);
    background: rgba(255,255,255,0.05);
    border: 1px solid var(--border);
    border-radius: 20px;
    padding: 5px 13px;
}

.hero-text p {
    margin: 16px 0 18px;
    color: var(--text-muted);
    line-height: 1.75;
    font-size: 15px;
}

.hero-actions {
    display: flex;
    gap: 14px;
    align-items: center;
}

.btn-outline {
    font-family: var(--font-display);
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.5px;
    padding: 10px 24px;
    border-radius: 30px;
    background: transparent;
    color: var(--green-light);
    border: 1.5px solid var(--green);
    cursor: pointer;
    transition: background 0.25s, transform 0.25s;
}

.btn-outline:hover {
    background: var(--green-dim);
    transform: translateY(-2px);
}

.hero-image {
    position: relative;
    z-index: 2;
    flex-shrink: 0;
}

.hero-image img {
    width: 400px;
    filter:
        drop-shadow(0 0 28px rgba(34,197,94,0.45))
        drop-shadow(0 0 70px rgba(34,197,94,0.2));
    animation: float 4s ease-in-out infinite;
    display: block;
}

.hero-image::after {
    content: "";
    position: absolute;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    width: 160px;
    height: 36px;
    background: rgba(0,0,0,0.5);
    filter: blur(28px);
    border-radius: 50%;
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(36px); }
    to   { opacity: 1; transform: translateY(0); }
}

@keyframes float {
    0%, 100% { transform: translateY(0); }
    50%       { transform: translateY(-14px); }
}

/* ── Portfolio Section ──────────────────── */
.portfolio {
    padding: 100px 80px;
    position: relative;
    z-index: 1;
}

.section-label {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--green);
    margin-bottom: 10px;
}

.portfolio > h2 {
    font-family: var(--font-display);
    font-size: 38px;
    font-weight: 800;
    margin-bottom: 40px;
}

/* ── Tabs ───────────────────────────────── */
.tabs {
    display: flex;
    gap: 4px;
    margin-bottom: 36px;
    border-bottom: 1px solid var(--border);
}

.tab-btn {
    font-family: var(--font-display);
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 0.4px;
    padding: 10px 22px 11px;
    border-radius: 10px 10px 0 0;
    background: transparent;
    color: var(--text-muted);
    border: 1px solid transparent;
    border-bottom: none;
    cursor: pointer;
    transition: color 0.2s, background 0.2s;
    position: relative;
    bottom: -1px;
}

.tab-btn:hover { color: var(--text); }

.tab-btn.active {
    color: var(--green-light);
    background: rgba(34,197,94,0.07);
    border-color: var(--border);
    border-bottom-color: var(--bg);
}

/* ── Tab Panels ─────────────────────────── */
.tab-panel { display: none; }

.tab-panel.active {
    display: block;
    animation: fadeUp 0.45s ease forwards;
}

/* ── Project Grid ───────────────────────── */
.projects {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
}

/* ── Card ───────────────────────────────── */
.project-card {
    position: relative;
    overflow: hidden;
    border-radius: var(--radius);
    cursor: pointer;
    height: 280px;
    background: var(--bg-card);
    border: 1px solid var(--border);
    transition: transform 0.35s, box-shadow 0.35s, border-color 0.35s;
}

.project-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 16px 48px rgba(34,197,94,0.18);
    border-color: rgba(34,197,94,0.3);
}

.project-card:active { transform: scale(0.97); }

/* Image */
.project-card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    transition: transform 0.5s;
}

.project-card:hover img { transform: scale(1.08); }

/* Video */
.project-card video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.5s;
}

.project-card:hover video { transform: scale(1.04); }

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
    font-size: 13px;
    z-index: 3;
    transition: opacity 0.3s;
}

.project-card:hover .play-hint { opacity: 0; }

/* Overlay */
.project-info {
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 16px 18px 20px;
    background: linear-gradient(to top, rgba(2,6,13,0.95) 55%, transparent);
    transform: translateY(100%);
    transition: transform 0.38s cubic-bezier(0.16,1,0.3,1);
    z-index: 4;
}

.project-card:hover .project-info { transform: translateY(0); }

.project-info h3 {
    font-family: var(--font-display);
    font-size: 15px;
    font-weight: 700;
    margin-bottom: 8px;
}

/* Tool badges */
.badge-row {
    display: flex;
    flex-wrap: wrap;
    gap: 5px;
    margin-bottom: 12px;
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

/* View link */
.card-link {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-family: var(--font-display);
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.5px;
    color: var(--green-light);
    text-decoration: none;
    padding: 5px 13px;
    border-radius: 20px;
    border: 1px solid rgba(34,197,94,0.3);
    transition: background 0.2s;
}

.card-link:hover { background: var(--green-dim); }

/* Green glow overlay */
.project-card::after {
    content: "";
    position: absolute;
    inset: 0;
    background: radial-gradient(circle at 50% 65%, rgba(34,197,94,0.1), transparent 70%);
    opacity: 0;
    transition: opacity 0.4s;
    pointer-events: none;
    z-index: 2;
}

.project-card:hover::after { opacity: 1; }

/* ── Responsive ─────────────────────────── */
@media (max-width: 1100px) {
    .projects { grid-template-columns: repeat(2, 1fr); }
}

@media (max-width: 768px) {
    .navbar { padding: 18px 24px; }
    .nav-links { display: none; }

    .hero {
        flex-direction: column;
        text-align: center;
        padding: 60px 24px;
        gap: 40px;
    }

    .hero-text { max-width: 100%; }
    .hero-actions { justify-content: center; }
    .hero-image img { width: 260px; }

    .portfolio { padding: 60px 24px; }
    .projects { grid-template-columns: 1fr; }
}

    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar">
        <span class="navbar-brand">Bala Saravanan</span>
        <div class="nav-links">
            <a href="#">Portfolio</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </div>
        <button class="btn">Get In Touch</button>
    </nav>

    @yield('content')

</body>
</html>