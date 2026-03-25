{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Balasaravanan S — UI/UX Designer & Laravel Developer based in Chennai. Designing intuitive interfaces and building enterprise-grade web applications.">
    <meta name="theme-color" content="#020617">
    <meta name="color-scheme" content="dark">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bala Portfolio</title>
    {{-- Preconnect for faster font load --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- Only load weights actually used: 400,700,900 for Roboto; 700,900 for Condensed --}}
    <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&family=Roboto+Condensed:wght@700;900&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&family=Roboto+Condensed:wght@700;900&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
    <noscript><link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&family=Roboto+Condensed:wght@700;900&display=swap" rel="stylesheet"></noscript>

    <style>
:root {
    --green:        #22c55e;
    --green-light:  #4ade80;
    --green-dim:    rgba(34,197,94,0.15);
    --green-glow:   rgba(34,197,94,0.35);
    --bg:           #020617;
    --bg-card:      rgba(15, 23, 42, 0.6);
    --surface:      rgba(255,255,255,0.04);
    --border:       rgba(255,255,255,0.08);
    --text:         #ffffff;
    --text-muted:   #94a3b8;
    --radius:       16px;
    --font-display: 'Roboto Condensed', sans-serif;
    --font-body:    'Roboto', sans-serif;
}

*, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

html { scroll-behavior: smooth; }

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
    will-change: transform;
    contain: strict;
}

@keyframes drift {
    from { transform: translate(0, 0); }
    to   { transform: translate(-50%, -50%); }
}

/* ── Nebula Glow ── */
.nebula {
    position: absolute;
    width: 800px;
    height: 800px;
    border-radius: 50%;
    background: radial-gradient(circle, var(--green-glow) 0%, transparent 70%);
    filter: blur(80px);        /* reduced from 100px — cheaper paint */
    opacity: 0.4;
    mix-blend-mode: screen;
    animation: nebulaPulse 10s ease-in-out infinite alternate;
    pointer-events: none;
    will-change: transform, opacity;
    contain: layout style;
}

@keyframes nebulaPulse {
    0%   { transform: scale(1) translate(10%, -10%);  opacity: 0.3; }
    100% { transform: scale(1.3) translate(-5%, 5%);  opacity: 0.5; }
}

/* ── Navbar ── */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 22px 64px;
    position: sticky;
    top: 0;
    z-index: 200;
    background: rgba(2,6,23,0.7);
    backdrop-filter: blur(12px);
    border-bottom: 1px solid var(--border);
    contain: layout style;      /* isolate navbar reflows */
}

.navbar-brand {
    font-family: var(--font-display);
    font-weight: 800;
    font-size: 20px;
    background: linear-gradient(90deg, #fff 60%, var(--green-light));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-decoration: none;
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

/* Hamburger */
.nav-hamburger {
    display: none;
    flex-direction: column;
    justify-content: center;
    gap: 5px;
    cursor: pointer;
    background: none;
    border: none;
    padding: 4px;
    z-index: 210;
}

.nav-hamburger span {
    display: block;
    width: 24px;
    height: 2px;
    background: var(--text);
    border-radius: 2px;
    transition: all 0.3s;
}

.nav-hamburger.open span:nth-child(1) { transform: translateY(7px) rotate(45deg); }
.nav-hamburger.open span:nth-child(2) { opacity: 0; }
.nav-hamburger.open span:nth-child(3) { transform: translateY(-7px) rotate(-45deg); }

/* Mobile drawer */
.mobile-drawer {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(2,6,23,0.97);
    backdrop-filter: blur(20px);
    z-index: 190;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 36px;
    opacity: 0;
    pointer-events: none;
    transition: opacity 0.3s;
}

.mobile-drawer.open {
    display: flex;
    opacity: 1;
    pointer-events: all;
}

.mobile-drawer a {
    font-family: var(--font-display);
    font-size: 36px;
    font-weight: 700;
    color: var(--text-muted);
    text-decoration: none;
    letter-spacing: 2px;
    transition: color 0.2s;
}
.mobile-drawer a:hover { color: var(--green-light); }

/* ── Buttons ── */
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
    text-decoration: none;
    display: inline-block;
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
/* Skip rendering off-screen sections until needed */
.portfolio, .experience {
    content-visibility: auto;
    contain-intrinsic-size: 0 600px;
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

/* ── Responsive Breakpoints ── */

/* Tablet */
@media (max-width: 1024px) {
    .navbar { padding: 18px 40px; }
    .hero, .portfolio, .experience { padding: 60px 40px; }
    h2 { font-size: 36px; }
}

/* Mobile */
@media (max-width: 768px) {
    .navbar { padding: 14px 16px; }
    .nav-links { display: none; }
    .desktop-cta { display: none !important; }
    .nav-hamburger { display: flex; }
    .hero, .portfolio, .experience { padding: 40px 16px; }
    h2 { font-size: 28px; margin-bottom: 24px; }
    .section-label { font-size: 10px; letter-spacing: 2px; }
    .nebula { width: 300px; height: 300px; opacity: 0.2; }
}

@media (max-width: 420px) {
    .navbar { padding: 12px 14px; }
    .hero, .portfolio, .experience { padding: 32px 14px; }
}
    
/* ── Navbar slide-down on load ── */
.navbar {
    animation: navSlideDown 0.6s cubic-bezier(0.22,1,0.36,1) both;
}
@keyframes navSlideDown {
    from { transform: translateY(-100%); opacity: 0; }
    to   { transform: translateY(0);     opacity: 1; }
}

/* ── Navbar brand subtle glow on hover ── */
.navbar-brand {
    transition: filter 0.3s;
    cursor: default;
}
.navbar-brand:hover {
    filter: drop-shadow(0 0 12px rgba(74,222,128,0.5));
}

/* ── Mobile drawer links slide in ── */
.mobile-drawer.open a {
    animation: drawerLinkIn 0.4s cubic-bezier(0.22,1,0.36,1) both;
}
.mobile-drawer.open a:nth-child(1) { animation-delay: 0.05s; }
.mobile-drawer.open a:nth-child(2) { animation-delay: 0.12s; }
.mobile-drawer.open a:nth-child(3) { animation-delay: 0.19s; }
@keyframes drawerLinkIn {
    from { opacity: 0; transform: translateX(-30px); }
    to   { opacity: 1; transform: translateX(0); }
}

</style>
</head>
<body>
    <div class="galaxy-container">
        <div class="starfield"></div>
    </div>

    {{-- Mobile Drawer --}}
    <div class="mobile-drawer" id="mobile-drawer">
        <a href="#work"       onclick="closeDrawer()">Work</a>
        <a href="#experience" onclick="closeDrawer()">Experience</a>
        <a href="#"           onclick="closeDrawer()">Contact</a>
    </div>

    <nav class="navbar">
        <span class="navbar-brand">Bala Saravanan</span>

        <div class="nav-links">
            <a href="#work">Work</a>
            <a href="#experience">Experience</a>
            <a href="#">Contact</a>
        </div>

        <button class="btn desktop-cta" style="display:block;">Get In Touch</button>

        <button class="nav-hamburger" id="hamburger" aria-label="Toggle menu" onclick="toggleDrawer()">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </nav>

    @yield('content')

    <script>
    function toggleDrawer() {
        const drawer = document.getElementById('mobile-drawer');
        const burger  = document.getElementById('hamburger');
        drawer.classList.toggle('open');
        burger.classList.toggle('open');
    }
    function closeDrawer() {
        document.getElementById('mobile-drawer').classList.remove('open');
        document.getElementById('hamburger').classList.remove('open');
    }
    </script>
</body>
</html>