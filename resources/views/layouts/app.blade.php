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
    --bg:           #020617; /* Deeper space blue */
    --bg-card:      rgba(15, 23, 42, 0.6);
    --surface:      rgba(255,255,255,0.04);
    --border:       rgba(255,255,255,0.08);
    --text:         #ffffff;
    --text-muted:   #94a3b8;
    --radius:       16px;
    --font-display: 'Roboto Condensed', sans-serif;
    --font-body:    'Roboto', sans-serif;
}

* { margin: 0; padding: 0; box-sizing: border-box; }

body {
    font-family: var(--font-body);
    background: var(--bg);
    color: var(--text);
    overflow-x: hidden;
}

/* ── Galaxy Background ── */
.galaxy-container {
    position: fixed;
    inset: 0;
    z-index: -1;
    background: radial-gradient(circle at 50% 50%, #0f172a 0%, #020617 100%);
    overflow: hidden;
}

.starfield {
    position: absolute;
    width: 200%;
    height: 200%;
    background-image: 
        radial-gradient(1px 1px at 20px 30px, #fff, rgba(0,0,0,0)),
        radial-gradient(1.5px 1.5px at 40px 70px, #fff, rgba(0,0,0,0)),
        radial-gradient(2px 2px at 50px 160px, var(--green-light), rgba(0,0,0,0)),
        radial-gradient(1px 1px at 90px 40px, #fff, rgba(0,0,0,0));
    background-size: 300px 300px;
    opacity: 0.3;
    animation: drift 100s linear infinite;
}

@keyframes drift {
    from { transform: translate(0, 0); }
    to { transform: translate(-50%, -50%); }
}

/* ── Nebula Glow (behind profile) ── */
.nebula {
    position: absolute;
    width: 800px;
    height: 800px;
    border-radius: 50%;
    background: radial-gradient(circle, var(--green-glow) 0%, transparent 70%);
    filter: blur(100px);
    opacity: 0.4;
    mix-blend-mode: screen;
    animation: nebulaPulse 10s ease-in-out infinite alternate;
}

@keyframes nebulaPulse {
    0% { transform: scale(1) translate(10%, -10%); opacity: 0.3; }
    100% { transform: scale(1.3) translate(-5%, 5%); opacity: 0.5; }
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
    background: rgba(2,6,23,0.7);
    backdrop-filter: blur(12px);
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

.nav-links { display: flex; gap: 32px; }
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
    background: linear-gradient(135deg, var(--green), #064e3b);
    color: #fff;
    border: none;
    cursor: pointer;
    transition: all 0.25s;
}
.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 0 30px var(--green-glow);
}

/* ── General Section Styles ── */
.hero, .portfolio, .experience {
    padding: 80px 80px;
    position: relative;
    z-index: 1;
}

.section-label {
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--green-light);
    margin-bottom: 12px;
}

h2 {
    font-family: var(--font-display);
    font-size: 42px;
    font-weight: 800;
    margin-bottom: 40px;
}

/* ── Responsive ── */
@media (max-width: 768px) {
    .navbar { padding: 18px 24px; }
    .nav-links { display: none; }
    .hero, .portfolio, .experience { padding: 60px 24px; }
}
    </style>
</head>
<body>
    <div class="galaxy-container">
        <div class="starfield"></div>
    </div>

    <nav class="navbar">
        <span class="navbar-brand">Bala Saravanan</span>
        <div class="nav-links">
            <a href="#work">Work</a>
            <a href="#experience">Experience</a>
            <a href="#">Contact</a>
        </div>
        <button class="btn">Get In Touch</button>
    </nav>

    @yield('content')
</body>
</html>