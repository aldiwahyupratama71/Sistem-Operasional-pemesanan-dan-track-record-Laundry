<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>LaundryKu — Laundry Premium</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700;900&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet" />
  <style>
    *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

    :root {
      --blue-0: #EBF4FF;
      --blue-1: #C3DFFE;
      --blue-2: #7EBCF9;
      --blue-3: #2E8CE4;
      --blue-4: #1A6CBF;
      --blue-5: #0D4A8A;
      --indigo-3: #4A5AE8;
      --indigo-4: #3344D0;
      --white: #FFFFFF;
      --off: #F8F9FC;
      --gray-1: #F1F4F9;
      --gray-2: #E2E8F2;
      --gray-3: #94A3B8;
      --gray-4: #64748B;
      --gray-5: #1E293B;
      --gold: #F59E0B;
    }

    html { scroll-behavior: smooth; }

    body {
      font-family: 'DM Sans', sans-serif;
      background: var(--white);
      color: var(--gray-5);
      overflow-x: hidden;
    }

    /* ── NAVBAR ─────────────────────────────────── */
    nav {
      position: fixed;
      top: 0; left: 0; right: 0;
      z-index: 100;
      background: rgba(255,255,255,0.85);
      backdrop-filter: blur(16px);
      border-bottom: 1px solid var(--gray-2);
      transition: box-shadow .3s;
    }
    nav.scrolled { box-shadow: 0 4px 24px rgba(0,0,0,.08); }

    .nav-inner {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 2rem;
      height: 68px;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .logo {
      font-family: 'Playfair Display', serif;
      font-size: 1.6rem;
      font-weight: 900;
      background: linear-gradient(135deg, var(--blue-3), var(--indigo-3));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      letter-spacing: -0.5px;
    }

    .nav-links { display: flex; align-items: center; gap: 2rem; list-style: none; }
    .nav-links a {
      text-decoration: none;
      color: var(--gray-4);
      font-size: .95rem;
      font-weight: 500;
      letter-spacing: .01em;
      position: relative;
      transition: color .2s;
    }
    .nav-links a::after {
      content: '';
      position: absolute;
      bottom: -4px; left: 0;
      width: 0; height: 2px;
      background: var(--blue-3);
      border-radius: 2px;
      transition: width .3s;
    }
    .nav-links a:hover { color: var(--blue-4); }
    .nav-links a:hover::after { width: 100%; }

    .btn-nav {
      display: inline-flex;
      align-items: center;
      gap: .4rem;
      background: linear-gradient(135deg, var(--blue-3), var(--indigo-3));
      color: #fff !important;
      padding: .55rem 1.3rem;
      border-radius: 999px;
      font-weight: 600;
      font-size: .9rem;
      transition: opacity .2s, transform .2s;
      text-decoration: none;
    }
    .btn-nav:hover { opacity: .88; transform: translateY(-1px); }
    .btn-nav::after { display: none !important; }

    /* ── HERO ───────────────────────────────────── */
    .hero {
      min-height: 100vh;
      display: flex;
      align-items: center;
      background: linear-gradient(140deg, #EBF4FF 0%, #F0F0FF 50%, #FFF 100%);
      position: relative;
      overflow: hidden;
      padding-top: 68px;
    }

    .hero-blob {
      position: absolute;
      border-radius: 50%;
      filter: blur(80px);
      opacity: .35;
      pointer-events: none;
    }
    .blob-1 {
      width: 520px; height: 520px;
      background: radial-gradient(circle, #7EBCF9, transparent 70%);
      top: -100px; right: -100px;
      animation: drift 8s ease-in-out infinite alternate;
    }
    .blob-2 {
      width: 380px; height: 380px;
      background: radial-gradient(circle, #A5B4FC, transparent 70%);
      bottom: 0; left: -80px;
      animation: drift 11s ease-in-out infinite alternate-reverse;
    }
    @keyframes drift { from { transform: translate(0,0); } to { transform: translate(30px, -30px); } }

    .hero-inner {
      max-width: 1200px;
      margin: 0 auto;
      padding: 5rem 2rem;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 4rem;
      align-items: center;
    }

    .hero-badge {
      display: inline-flex;
      align-items: center;
      gap: .5rem;
      background: var(--blue-0);
      color: var(--blue-4);
      padding: .4rem 1rem;
      border-radius: 999px;
      font-size: .8rem;
      font-weight: 600;
      letter-spacing: .04em;
      text-transform: uppercase;
      margin-bottom: 1.5rem;
      opacity: 0;
      animation: fadeUp .6s .1s forwards;
    }
    .hero-badge::before {
      content: '';
      width: 7px; height: 7px;
      background: var(--blue-3);
      border-radius: 50%;
      animation: pulse 2s infinite;
    }
    @keyframes pulse { 0%,100%{transform:scale(1);opacity:1} 50%{transform:scale(1.5);opacity:.6} }

    .hero h1 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.8rem, 5vw, 4.2rem);
      font-weight: 900;
      line-height: 1.1;
      letter-spacing: -1px;
      color: var(--gray-5);
      margin-bottom: 1.5rem;
      opacity: 0;
      animation: fadeUp .7s .25s forwards;
    }
    .hero h1 span {
      background: linear-gradient(135deg, var(--blue-3), var(--indigo-3));
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .hero p {
      font-size: 1.15rem;
      color: var(--gray-4);
      line-height: 1.8;
      max-width: 480px;
      margin-bottom: 2.5rem;
      opacity: 0;
      animation: fadeUp .7s .4s forwards;
    }

    .hero-actions {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
      opacity: 0;
      animation: fadeUp .7s .55s forwards;
    }

    .btn-primary {
      display: inline-flex; align-items: center; gap: .5rem;
      background: linear-gradient(135deg, var(--blue-3), var(--indigo-3));
      color: #fff;
      padding: .85rem 1.8rem;
      border-radius: 12px;
      font-weight: 600;
      font-size: 1rem;
      text-decoration: none;
      transition: transform .2s, box-shadow .2s;
      box-shadow: 0 6px 24px rgba(46,140,228,.35);
    }
    .btn-primary:hover { transform: translateY(-3px); box-shadow: 0 12px 32px rgba(46,140,228,.45); }

    .btn-outline {
      display: inline-flex; align-items: center; gap: .5rem;
      border: 1.5px solid var(--gray-2);
      color: var(--gray-5);
      padding: .85rem 1.8rem;
      border-radius: 12px;
      font-weight: 600;
      font-size: 1rem;
      text-decoration: none;
      transition: border-color .2s, background .2s, transform .2s;
    }
    .btn-outline:hover { border-color: var(--blue-2); background: var(--blue-0); transform: translateY(-2px); }

    .hero-stats {
      display: flex;
      gap: 2.5rem;
      margin-top: 3rem;
      opacity: 0;
      animation: fadeUp .7s .7s forwards;
    }
    .stat { }
    .stat-num {
      font-family: 'Playfair Display', serif;
      font-size: 2rem;
      font-weight: 900;
      color: var(--gray-5);
    }
    .stat-label {
      font-size: .8rem;
      color: var(--gray-3);
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: .05em;
    }

    .hero-img-wrap {
      position: relative;
      opacity: 0;
      animation: fadeIn .9s .3s forwards;
    }
    .hero-img-wrap img {
      width: 100%;
      border-radius: 28px;
      box-shadow: 0 30px 80px rgba(0,0,0,.15);
      display: block;
    }

    .floating-card {
      position: absolute;
      background: white;
      border-radius: 16px;
      padding: 1rem 1.2rem;
      box-shadow: 0 12px 40px rgba(0,0,0,.12);
      display: flex;
      align-items: center;
      gap: .8rem;
      font-size: .85rem;
      animation: float 4s ease-in-out infinite;
    }
    .fc-1 { bottom: -18px; left: -24px; animation-delay: 0s; }
    .fc-2 { top: -18px; right: -20px; animation-delay: 1.5s; }
    @keyframes float { 0%,100%{transform:translateY(0)} 50%{transform:translateY(-8px)} }

    .fc-icon {
      width: 40px; height: 40px;
      border-radius: 10px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.2rem;
    }
    .fc-1 .fc-icon { background: var(--blue-0); }
    .fc-2 .fc-icon { background: #FFF7E6; }

    .fc-text { line-height: 1.3; }
    .fc-label { font-weight: 600; color: var(--gray-5); }
    .fc-sub { color: var(--gray-3); font-size: .78rem; }

    @keyframes fadeUp { from { opacity:0; transform:translateY(24px); } to { opacity:1; transform:translateY(0); } }
    @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

    /* ── SECTION BASE ───────────────────────────── */
    section { padding: 100px 2rem; }
    .container { max-width: 1200px; margin: 0 auto; }

    .section-label {
      display: inline-block;
      font-size: .78rem;
      font-weight: 600;
      letter-spacing: .12em;
      text-transform: uppercase;
      color: var(--blue-3);
      margin-bottom: .8rem;
    }
    .section-title {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2rem, 3.5vw, 2.8rem);
      font-weight: 700;
      line-height: 1.2;
      color: var(--gray-5);
      margin-bottom: 1rem;
    }
    .section-sub {
      font-size: 1.05rem;
      color: var(--gray-4);
      line-height: 1.8;
      max-width: 560px;
    }

    /* ── SERVICES ───────────────────────────────── */
    #services { background: var(--off); }

    .services-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.5rem;
      margin-top: 3.5rem;
    }

    .service-card {
      background: white;
      border-radius: 20px;
      padding: 2.2rem;
      border: 1px solid var(--gray-2);
      transition: transform .3s, box-shadow .3s;
      position: relative;
      overflow: hidden;
    }
    .service-card::before {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 4px;
      background: linear-gradient(90deg, var(--blue-3), var(--indigo-3));
      transform: scaleX(0);
      transform-origin: left;
      transition: transform .4s;
      border-radius: 20px 20px 0 0;
    }
    .service-card:hover { transform: translateY(-6px); box-shadow: 0 20px 50px rgba(0,0,0,.1); }
    .service-card:hover::before { transform: scaleX(1); }

    .svc-icon {
      width: 56px; height: 56px;
      background: var(--blue-0);
      border-radius: 14px;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.6rem;
      margin-bottom: 1.5rem;
      transition: background .3s, transform .3s;
    }
    .service-card:hover .svc-icon { background: var(--blue-3); transform: scale(1.1); }

    .svc-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.35rem;
      font-weight: 700;
      color: var(--gray-5);
      margin-bottom: .6rem;
    }
    .svc-desc { font-size: .95rem; color: var(--gray-4); line-height: 1.75; }
    .svc-tag {
      display: inline-block;
      margin-top: 1.2rem;
      font-size: .78rem;
      font-weight: 600;
      padding: .3rem .8rem;
      border-radius: 999px;
      background: var(--blue-0);
      color: var(--blue-4);
    }

    /* ── PROCESS ────────────────────────────────── */
    #process { background: white; }

    .process-steps {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 0;
      margin-top: 4rem;
      position: relative;
    }
    .process-steps::before {
      content: '';
      position: absolute;
      top: 32px; left: 12.5%; right: 12.5%;
      height: 2px;
      background: var(--gray-2);
      z-index: 0;
    }

    .step {
      text-align: center;
      position: relative;
      z-index: 1;
      padding: 0 1.5rem;
    }
    .step-num {
      width: 64px; height: 64px;
      border-radius: 50%;
      background: white;
      border: 2px solid var(--gray-2);
      display: flex; align-items: center; justify-content: center;
      font-family: 'Playfair Display', serif;
      font-size: 1.4rem;
      font-weight: 900;
      color: var(--gray-3);
      margin: 0 auto 1.5rem;
      transition: all .4s;
    }
    .step:hover .step-num {
      background: linear-gradient(135deg, var(--blue-3), var(--indigo-3));
      border-color: transparent;
      color: white;
      transform: scale(1.1);
      box-shadow: 0 8px 24px rgba(46,140,228,.4);
    }
    .step-title { font-weight: 700; font-size: 1rem; color: var(--gray-5); margin-bottom: .4rem; }
    .step-desc { font-size: .88rem; color: var(--gray-4); line-height: 1.65; }

    /* ── PRICING ────────────────────────────────── */
    #pricing { background: var(--gray-5); }
    #pricing .section-title { color: white; }
    #pricing .section-label { color: var(--blue-2); }
    #pricing .section-sub { color: var(--gray-3); }

    .pricing-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.5rem;
      margin-top: 3.5rem;
    }

    .price-card {
      background: rgba(255,255,255,.06);
      border: 1px solid rgba(255,255,255,.12);
      border-radius: 24px;
      padding: 2.5rem;
      position: relative;
      overflow: hidden;
      transition: transform .3s, background .3s;
    }
    .price-card:hover { transform: translateY(-6px); background: rgba(255,255,255,.1); }

    .price-card.featured {
      background: linear-gradient(145deg, var(--blue-3), var(--indigo-3));
      border-color: transparent;
      box-shadow: 0 24px 60px rgba(46,140,228,.5);
    }
    .price-card.featured:hover { transform: translateY(-8px) scale(1.01); }

    .price-tag {
      position: absolute;
      top: 1.4rem; right: 1.4rem;
      background: var(--gold);
      color: #5A3800;
      font-size: .7rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: .08em;
      padding: .25rem .65rem;
      border-radius: 999px;
    }

    .price-name {
      font-size: .8rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: .1em;
      color: rgba(255,255,255,.6);
      margin-bottom: 1rem;
    }
    .price-card.featured .price-name { color: rgba(255,255,255,.8); }

    .price-amount {
      font-family: 'Playfair Display', serif;
      font-size: 3rem;
      font-weight: 900;
      color: white;
      line-height: 1;
      margin-bottom: .4rem;
    }
    .price-unit { font-size: .88rem; color: rgba(255,255,255,.5); margin-bottom: 2rem; }

    .price-features { list-style: none; margin-bottom: 2rem; }
    .price-features li {
      font-size: .92rem;
      color: rgba(255,255,255,.75);
      padding: .55rem 0;
      border-bottom: 1px solid rgba(255,255,255,.08);
      display: flex;
      align-items: center;
      gap: .6rem;
    }
    .price-features li::before {
      content: '✓';
      width: 18px; height: 18px;
      border-radius: 50%;
      background: rgba(255,255,255,.15);
      display: flex; align-items: center; justify-content: center;
      font-size: .7rem;
      flex-shrink: 0;
    }

    .price-btn {
      display: block;
      text-align: center;
      padding: .9rem;
      border-radius: 12px;
      font-weight: 600;
      font-size: .95rem;
      text-decoration: none;
      transition: all .2s;
    }
    .price-card:not(.featured) .price-btn {
      border: 1.5px solid rgba(255,255,255,.25);
      color: white;
    }
    .price-card:not(.featured) .price-btn:hover { background: rgba(255,255,255,.1); }
    .price-card.featured .price-btn {
      background: white;
      color: var(--blue-4);
    }
    .price-card.featured .price-btn:hover { background: var(--blue-0); }

    /* ── TESTIMONIALS ───────────────────────────── */
    #testimonials { background: var(--off); }

    .testimonial-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1.5rem;
      margin-top: 3.5rem;
    }

    .testi-card {
      background: white;
      border-radius: 20px;
      padding: 2rem;
      border: 1px solid var(--gray-2);
      transition: transform .3s, box-shadow .3s;
    }
    .testi-card:hover { transform: translateY(-4px); box-shadow: 0 16px 40px rgba(0,0,0,.08); }

    .stars { color: var(--gold); font-size: 1rem; letter-spacing: 1px; margin-bottom: 1rem; }
    .testi-text {
      font-size: .95rem;
      color: var(--gray-4);
      line-height: 1.75;
      font-style: italic;
      margin-bottom: 1.5rem;
    }
    .testi-author { display: flex; align-items: center; gap: .8rem; }
    .testi-avatar {
      width: 40px; height: 40px;
      border-radius: 50%;
      background: linear-gradient(135deg, var(--blue-2), var(--indigo-3));
      display: flex; align-items: center; justify-content: center;
      font-size: .85rem;
      font-weight: 700;
      color: white;
    }
    .testi-name { font-weight: 600; font-size: .9rem; color: var(--gray-5); }
    .testi-role { font-size: .78rem; color: var(--gray-3); }

    /* ── CTA ────────────────────────────────────── */
    #cta {
      background: linear-gradient(145deg, var(--blue-4) 0%, var(--indigo-4) 100%);
      text-align: center;
      padding: 120px 2rem;
      position: relative;
      overflow: hidden;
    }
    #cta::before {
      content: '';
      position: absolute;
      inset: 0;
      background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    #cta .container { position: relative; z-index: 1; }
    #cta h2 {
      font-family: 'Playfair Display', serif;
      font-size: clamp(2.2rem, 4vw, 3.2rem);
      font-weight: 900;
      color: white;
      margin-bottom: 1rem;
    }
    #cta p { font-size: 1.1rem; color: rgba(255,255,255,.75); margin-bottom: 2.5rem; max-width: 500px; margin-left: auto; margin-right: auto; }

    .btn-wa {
      display: inline-flex;
      align-items: center;
      gap: .7rem;
      background: #25D366;
      color: white;
      padding: 1rem 2.2rem;
      border-radius: 14px;
      font-weight: 700;
      font-size: 1.05rem;
      text-decoration: none;
      transition: transform .2s, box-shadow .2s;
      box-shadow: 0 8px 30px rgba(37,211,102,.45);
    }
    .btn-wa:hover { transform: translateY(-3px); box-shadow: 0 16px 40px rgba(37,211,102,.55); }

    /* ── FOOTER ─────────────────────────────────── */
    footer {
      background: #0A0F1E;
      color: rgba(255,255,255,.45);
      text-align: center;
      padding: 2rem;
      font-size: .88rem;
    }
    footer span { color: rgba(255,255,255,.7); font-weight: 600; }

    /* ── SCROLL REVEAL ──────────────────────────── */
    .reveal {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity .7s ease, transform .7s ease;
    }
    .reveal.visible { opacity: 1; transform: translateY(0); }
    .reveal-delay-1 { transition-delay: .1s; }
    .reveal-delay-2 { transition-delay: .2s; }
    .reveal-delay-3 { transition-delay: .3s; }
    .reveal-delay-4 { transition-delay: .4s; }

    /* ── TRACKING BAR ───────────────────────────── */
    .tracking-bar {
      background: var(--blue-0);
      border-top: 1px solid var(--blue-1);
      border-bottom: 1px solid var(--blue-1);
      padding: 1.2rem 2rem;
      text-align: center;
    }
    .tracking-bar p { font-size: .9rem; color: var(--blue-4); font-weight: 500; }
    .tracking-input-wrap {
      display: inline-flex;
      margin-top: .8rem;
      border-radius: 10px;
      overflow: hidden;
      border: 1.5px solid var(--blue-2);
      background: white;
    }
    .tracking-input {
      border: none;
      outline: none;
      padding: .6rem 1.2rem;
      font-family: 'DM Sans', sans-serif;
      font-size: .9rem;
      width: 240px;
    }
    .tracking-btn {
      background: var(--blue-3);
      color: white;
      border: none;
      padding: .6rem 1.2rem;
      font-family: 'DM Sans', sans-serif;
      font-size: .9rem;
      font-weight: 600;
      cursor: pointer;
      transition: background .2s;
    }
    .tracking-btn:hover { background: var(--blue-4); }

    /* ── RESPONSIVE ─────────────────────────────── */
    @media (max-width: 900px) {
      .hero-inner { grid-template-columns: 1fr; gap: 2rem; }
      .services-grid, .pricing-grid, .testimonial-grid { grid-template-columns: 1fr; }
      .process-steps { grid-template-columns: repeat(2, 1fr); gap: 2rem; }
      .process-steps::before { display: none; }
      .hero-stats { gap: 1.5rem; }
      .floating-card { display: none; }
    }
  </style>
</head>
<body>

<!-- NAVBAR -->
<nav id="navbar">
  <div class="nav-inner">
    <div class="logo">LaundryKu</div>
    <ul class="nav-links">
      <li><a href="#services">Layanan</a></li>
      <li><a href="#process">Proses</a></li>
      <li><a href="#pricing">Harga</a></li>
      <li><a href="#testimonials">Ulasan</a></li>
      <li><a href="/admin" class="btn-nav">Admin Login →</a></li>
    </ul>
  </div>
</nav>

<!-- HERO -->
<section class="hero" id="home">
  <div class="hero-blob blob-1"></div>
  <div class="hero-blob blob-2"></div>
  <div class="hero-inner">
    <div>
      <div class="hero-badge">✦ Laundry Premium Jakarta</div>
      <h1>Bersih. Cepat.<br /><span>Tanpa Repot.</span></h1>
      <p>Layanan laundry modern dengan teknologi terkini. Pakaian Anda kami jaga dengan standar kebersihan profesional.</p>
      <div class="hero-actions">
        <a href="#pricing" class="btn-primary">
          <span>Lihat Harga</span>
          <span>→</span>
        </a>
        <a href="#tracking" class="btn-outline">
          <span>🔍</span>
          <span>Tracking Pesanan</span>
        </a>
      </div>
      <div class="hero-stats">
        <div class="stat">
          <div class="stat-num">12K+</div>
          <div class="stat-label">Pelanggan</div>
        </div>
        <div class="stat">
          <div class="stat-num">4.9★</div>
          <div class="stat-label">Rating</div>
        </div>
        <div class="stat">
          <div class="stat-num">3 Jam</div>
          <div class="stat-label">Express Selesai</div>
        </div>
      </div>
    </div>
    <div class="hero-img-wrap">
      <img src="https://images.unsplash.com/photo-1521656693074-0ef32e80a5d5?w=700&q=80" alt="Laundry profesional" />
      <div class="floating-card fc-1">
        <div class="fc-icon">🧺</div>
        <div class="fc-text">
          <div class="fc-label">Pesanan Baru</div>
          <div class="fc-sub">3 kg · Regular</div>
        </div>
      </div>
      <div class="floating-card fc-2">
        <div class="fc-icon">⭐</div>
        <div class="fc-text">
          <div class="fc-label">Puas Banget!</div>
          <div class="fc-sub">Rini A. — 2 menit lalu</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TRACKING -->
<div class="tracking-bar" id="tracking" style="padding: 3.5rem 2rem; background: linear-gradient(to bottom, var(--blue-0), #fff); border-top: 1px solid var(--blue-1); border-bottom: 1px solid var(--gray-2);">
  <div class="container" style="max-width: 800px; margin: 0 auto; text-align: center;">
    <h3 style="font-family: 'Playfair Display', serif; font-size: 2rem; color: var(--blue-5); margin-bottom: 0.5rem;">🔍 Lacak Pesanan Laundry</h3>
    <p style="color: var(--gray-4); font-size: 1rem; margin-bottom: 1.8rem; max-width: 600px; margin-left: auto; margin-right: auto;">Masukkan nomor invoice transaksi Anda untuk melihat progres pengerjaan secara real-time.</p>
    
    <div class="tracking-input-wrap" style="box-shadow: 0 8px 30px rgba(46,140,228,0.15); display: inline-flex; border-radius: 12px; overflow: hidden; border: 2.5px solid var(--blue-3); background: white; margin-bottom: 1rem; width: 100%; max-width: 520px; transition: border-color 0.3s;">
      <input class="tracking-input" placeholder="Contoh: INV-20260520-5EC12" id="trackInput" style="border: none; outline: none; padding: 0.9rem 1.5rem; font-family: 'DM Sans', sans-serif; font-size: 1rem; flex-grow: 1;" />
      <button class="tracking-btn" onclick="trackOrder()" style="background: var(--blue-3); color: white; border: none; padding: 0.9rem 2rem; font-family: 'DM Sans', sans-serif; font-size: 1rem; font-weight: 600; cursor: pointer; transition: background .2s;">Lacak →</button>
    </div>

    <!-- Error message element -->
    <div id="trackError" style="color: #DC2626; font-size: 0.9rem; font-weight: 600; min-height: 1.5rem; margin-top: 0.5rem; display: none;"></div>

    <!-- Results Panel (Hidden by default) -->
    <div id="trackResultPanel" style="display: none; background: white; border: 1px solid var(--gray-2); border-radius: 24px; padding: 2.5rem; text-align: left; box-shadow: 0 20px 50px rgba(0,0,0,0.06); animation: fadeUp 0.4s forwards; margin-top: 2rem;">
      <div style="display: flex; justify-content: space-between; align-items: flex-start; border-bottom: 1px dashed var(--gray-2); padding-bottom: 1.2rem; margin-bottom: 1.8rem; flex-wrap: wrap; gap: 1rem;">
        <div>
          <span style="font-size: 0.8rem; text-transform: uppercase; color: var(--gray-3); font-weight: 600; letter-spacing: 0.05em;">Nomor Invoice</span>
          <h4 id="resInvoice" style="font-size: 1.3rem; color: var(--gray-5); font-weight: 700; font-family: 'DM Sans', sans-serif;">-</h4>
        </div>
        <div style="text-align: right;" class="mobile-align-left">
          <span style="font-size: 0.8rem; text-transform: uppercase; color: var(--gray-3); font-weight: 600; letter-spacing: 0.05em;">Pelanggan</span>
          <h4 id="resCustomer" style="font-size: 1.2rem; color: var(--gray-5); font-weight: 700;">-</h4>
        </div>
      </div>

      <!-- Transaction Details Grid -->
      <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-bottom: 2.5rem;" id="resDetailsGrid">
        <div>
          <span style="font-size: 0.8rem; color: var(--gray-4); display: block; margin-bottom: 0.2rem;">Paket Laundry</span>
          <strong id="resPackage" style="color: var(--gray-5); font-size: 1rem;">-</strong>
        </div>
        <div>
          <span style="font-size: 0.8rem; color: var(--gray-4); display: block; margin-bottom: 0.2rem;">Berat Cucian</span>
          <strong id="resWeight" style="color: var(--gray-5); font-size: 1rem;">- Kg</strong>
        </div>
        <div>
          <span style="font-size: 0.8rem; color: var(--gray-4); display: block; margin-bottom: 0.2rem;">Total Biaya</span>
          <strong id="resTotal" style="color: var(--blue-4); font-size: 1rem;">Rp -</strong>
        </div>
        <div>
          <span style="font-size: 0.8rem; color: var(--gray-4); display: block; margin-bottom: 0.2rem;">Status Bayar</span>
          <span id="resPaymentStatus" style="font-size: 0.8rem; font-weight: 700; padding: 0.25rem 0.75rem; border-radius: 999px; display: inline-block;">-</span>
        </div>
      </div>

      <!-- Visual Stepper Progress -->
      <div style="margin-bottom: 2.5rem; padding: 1rem 0;">
        <span style="font-size: 0.8rem; text-transform: uppercase; color: var(--gray-3); font-weight: 600; letter-spacing: 0.05em; display: block; margin-bottom: 2rem;">Progres Pengerjaan</span>
        
        <!-- Stepper Line and Nodes -->
        <div style="display: flex; justify-content: space-between; position: relative; width: 100%; margin: 0 auto; padding-bottom: 0.5rem;" id="stepperContainer">
          <!-- The background bar -->
          <div style="position: absolute; top: 18px; left: 5%; right: 5%; height: 4px; background: var(--gray-2); z-index: 0; border-radius: 2px;"></div>
          <!-- The active progress bar -->
          <div id="stepperProgressBar" style="position: absolute; top: 18px; left: 5%; width: 0%; height: 4px; background: var(--blue-3); z-index: 0; transition: width 0.6s ease; border-radius: 2px;"></div>
          
          <!-- Step 1: Pending -->
          <div class="step-node" data-step="pending" style="text-align: center; z-index: 1; flex: 1;">
            <div class="node-icon" style="width: 40px; height: 40px; border-radius: 50%; background: white; border: 3px solid var(--gray-2); display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem; font-size: 0.9rem; font-weight: bold; transition: all 0.4s; color: var(--gray-3);">1</div>
            <div class="node-label" style="font-size: 0.8rem; font-weight: 600; color: var(--gray-4); transition: color 0.4s;">Antrean</div>
          </div>
          <!-- Step 2: Washing -->
          <div class="step-node" data-step="washing" style="text-align: center; z-index: 1; flex: 1;">
            <div class="node-icon" style="width: 40px; height: 40px; border-radius: 50%; background: white; border: 3px solid var(--gray-2); display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem; font-size: 0.9rem; font-weight: bold; transition: all 0.4s; color: var(--gray-3);">2</div>
            <div class="node-label" style="font-size: 0.8rem; font-weight: 600; color: var(--gray-4); transition: color 0.4s;">Dicuci</div>
          </div>
          <!-- Step 3: Drying -->
          <div class="step-node" data-step="drying" style="text-align: center; z-index: 1; flex: 1;">
            <div class="node-icon" style="width: 40px; height: 40px; border-radius: 50%; background: white; border: 3px solid var(--gray-2); display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem; font-size: 0.9rem; font-weight: bold; transition: all 0.4s; color: var(--gray-3);">3</div>
            <div class="node-label" style="font-size: 0.8rem; font-weight: 600; color: var(--gray-4); transition: color 0.4s;">Dikeringkan</div>
          </div>
          <!-- Step 4: Ironing -->
          <div class="step-node" data-step="ironing" style="text-align: center; z-index: 1; flex: 1;">
            <div class="node-icon" style="width: 40px; height: 40px; border-radius: 50%; background: white; border: 3px solid var(--gray-2); display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem; font-size: 0.9rem; font-weight: bold; transition: all 0.4s; color: var(--gray-3);">4</div>
            <div class="node-label" style="font-size: 0.8rem; font-weight: 600; color: var(--gray-4); transition: color 0.4s;">Disetrika</div>
          </div>
          <!-- Step 5: Done -->
          <div class="step-node" data-step="done" style="text-align: center; z-index: 1; flex: 1;">
            <div class="node-icon" style="width: 40px; height: 40px; border-radius: 50%; background: white; border: 3px solid var(--gray-2); display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem; font-size: 0.9rem; font-weight: bold; transition: all 0.4s; color: var(--gray-3);">5</div>
            <div class="node-label" style="font-size: 0.8rem; font-weight: 600; color: var(--gray-4); transition: color 0.4s;">Siap Diambil</div>
          </div>
          <!-- Step 6: Picked Up -->
          <div class="step-node" data-step="picked_up" style="text-align: center; z-index: 1; flex: 1;">
            <div class="node-icon" style="width: 40px; height: 40px; border-radius: 50%; background: white; border: 3px solid var(--gray-2); display: flex; align-items: center; justify-content: center; margin: 0 auto 0.5rem; font-size: 0.9rem; font-weight: bold; transition: all 0.4s; color: var(--gray-3);">6</div>
            <div class="node-label" style="font-size: 0.8rem; font-weight: 600; color: var(--gray-4); transition: color 0.4s;">Diambil</div>
          </div>
        </div>
      </div>

      <!-- Action Buttons -->
      <div style="display: flex; justify-content: flex-end; gap: 1rem; border-top: 1px solid var(--gray-2); padding-top: 1.5rem; flex-wrap: wrap;">
        <a id="resDownloadPdf" href="#" class="btn-outline" style="padding: 0.7rem 1.4rem; font-size: 0.9rem; display: flex; align-items: center; gap: 0.5rem; border-radius: 10px; text-decoration: none;">
          <span>📄</span>
          <span>Unduh Invoice PDF</span>
        </a>
        <a id="resHelpWa" href="#" target="_blank" class="btn-primary" style="padding: 0.7rem 1.4rem; font-size: 0.9rem; display: flex; align-items: center; gap: 0.5rem; border-radius: 10px; background: linear-gradient(135deg, #10B981, #059669); box-shadow: none; text-decoration: none;">
          <span>💬</span>
          <span>Tanya Admin</span>
        </a>
      </div>
    </div>
  </div>
</div>

<!-- SERVICES -->
<section id="services">
  <div class="container">
    <div class="reveal">
      <div class="section-label">Layanan Kami</div>
      <h2 class="section-title">Solusi Lengkap<br />untuk Pakaian Anda</h2>
      <p class="section-sub">Dari cuci reguler hingga perawatan khusus, kami siap memberikan hasil terbaik.</p>
    </div>
    <div class="services-grid">
      <div class="service-card reveal reveal-delay-1">
        <div class="svc-icon">🫧</div>
        <div class="svc-title">Cuci & Kering</div>
        <p class="svc-desc">Pakaian dicuci bersih menggunakan deterjen premium dan dikeringkan sempurna dengan teknologi modern.</p>
        <span class="svc-tag">Mulai Rp 7K/kg</span>
      </div>
      <div class="service-card reveal reveal-delay-2">
        <div class="svc-icon">⚡</div>
        <div class="svc-title">Express Laundry</div>
        <p class="svc-desc">Butuh cepat? Laundry Anda selesai dalam 3–5 jam. Cocok untuk keperluan mendadak.</p>
        <span class="svc-tag">Mulai Rp 12K/kg</span>
      </div>
      <div class="service-card reveal reveal-delay-3">
        <div class="svc-icon">👔</div>
        <div class="svc-title">Setrika Premium</div>
        <p class="svc-desc">Hasil setrika rapi dan harum, bebas kusut. Tersedia layanan antar-jemput di area tertentu.</p>
        <span class="svc-tag">Mulai Rp 20K/kg</span>
      </div>
    </div>
  </div>
</section>

<!-- PROCESS -->
<section id="process">
  <div class="container">
    <div class="reveal" style="text-align:center; margin-bottom:1rem;">
      <div class="section-label">Cara Kerja</div>
      <h2 class="section-title">Mudah dalam 4 Langkah</h2>
    </div>
    <div class="process-steps">
      <div class="step reveal reveal-delay-1">
        <div class="step-num">1</div>
        <div class="step-title">Antar atau Jemput</div>
        <p class="step-desc">Antar langsung ke gerai atau hubungi kami untuk layanan jemput di rumah Anda.</p>
      </div>
      <div class="step reveal reveal-delay-2">
        <div class="step-num">2</div>
        <div class="step-title">Proses & Cuci</div>
        <p class="step-desc">Pakaian dicuci, dikeringkan, dan disetrika menggunakan standar higienis terbaik.</p>
      </div>
      <div class="step reveal reveal-delay-3">
        <div class="step-num">3</div>
        <div class="step-title">Notifikasi Selesai</div>
        <p class="step-desc">Anda mendapat notifikasi WhatsApp saat laundry siap diambil atau diantar.</p>
      </div>
      <div class="step reveal reveal-delay-4">
        <div class="step-num">4</div>
        <div class="step-title">Ambil atau Terima</div>
        <p class="step-desc">Ambil sendiri atau pilih layanan antar ke pintu rumah. Bayar via transfer atau tunai.</p>
      </div>
    </div>
  </div>
</section>

<!-- PRICING -->
<section id="pricing">
  <div class="container">
    <div class="reveal">
      <div class="section-label">Harga Transparan</div>
      <h2 class="section-title">Pilih Paket<br />Sesuai Kebutuhan</h2>
      <p class="section-sub">Harga terjangkau tanpa biaya tersembunyi. Semua paket sudah termasuk deterjen premium.</p>
    </div>
    <div class="pricing-grid">
      @foreach($packages as $index => $package)
      <div class="price-card {{ $package->name === 'Express' ? 'featured' : '' }} reveal reveal-delay-{{ $index + 1 }}">
        @if($package->name === 'Express')
        <div class="price-tag">Terpopuler</div>
        @endif
        <div class="price-name">{{ $package->name }}</div>
        <div class="price-amount">{{ number_format($package->price / 1000, 0) }}K</div>
        <div class="price-unit">Per {{ $package->unit === 'kg' ? 'kilogram' : 'pcs' }} · {{ $package->estimated_days }} hari</div>
        <p style="color: rgba(255,255,255,0.7); font-size: 0.9rem; margin-bottom: 1.5rem; line-height: 1.5; min-height: 2.7em;">{{ $package->description }}</p>
        <ul class="price-features" style="margin-bottom: 1.5rem;">
          <li>Cuci + Kering</li>
          <li>Deterjen premium</li>
          <li>Pewangi pilihan</li>
          <li>Notifikasi status</li>
        </ul>
        <a href="https://wa.me/628123456789?text=Halo%20LaundryKu,%20saya%20tertarik%20dengan%20paket%20{{ $package->name }}." class="price-btn">Pesan Sekarang</a>
      </div>
      @endforeach
    </div>

    <!-- Price Calculator Widget -->
    <div class="reveal" style="margin-top: 5rem; display: flex; justify-content: center;">
      <div style="background: rgba(255, 255, 255, 0.05); border: 1px solid rgba(255, 255, 255, 0.12); border-radius: 24px; padding: 2.5rem; max-width: 600px; width: 100%; box-shadow: 0 30px 80px rgba(0,0,0,0.25); backdrop-filter: blur(16px); position: relative; overflow: hidden;">
        <div style="position: absolute; top: -50px; right: -50px; width: 150px; height: 150px; background: radial-gradient(circle, var(--blue-3), transparent 70%); opacity: 0.15; border-radius: 50%; pointer-events: none;"></div>
        <div style="position: absolute; bottom: -50px; left: -50px; width: 120px; height: 120px; background: radial-gradient(circle, var(--indigo-3), transparent 70%); opacity: 0.15; border-radius: 50%; pointer-events: none;"></div>

        <h3 style="font-family: 'Playfair Display', serif; color: white; font-size: 1.8rem; margin-bottom: 0.5rem; text-align: center; display: flex; align-items: center; justify-content: center; gap: 0.5rem;">🧮 Kalkulator Simulasi Harga</h3>
        <p style="color: var(--gray-3); font-size: 0.95rem; margin-bottom: 2rem; text-align: center;">Hitung perkiraan biaya laundry Anda secara instan</p>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.8rem;">
          <div>
            <label style="display: block; color: rgba(255,255,255,0.8); font-size: 0.85rem; font-weight: 600; margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.05em;">Pilih Paket</label>
            <select id="calcPackage" style="width: 100%; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.2); color: white; border-radius: 10px; padding: 0.8rem; outline: none; font-family: 'DM Sans', sans-serif; font-size: 0.95rem; cursor: pointer; transition: all 0.3s;" onchange="calculatePrice()">
              @foreach($packages as $package)
                <option value="{{ $package->price }}" data-name="{{ $package->name }}" data-unit="{{ $package->unit }}" data-days="{{ $package->estimated_days }}" style="background: var(--gray-5); color: white;">{{ $package->name }} (Rp {{ number_format($package->price, 0, ',', '.') }}/{{ $package->unit }})</option>
              @endforeach
            </select>
          </div>
          <div>
            <label style="display: block; color: rgba(255,255,255,0.8); font-size: 0.85rem; font-weight: 600; margin-bottom: 0.5rem; text-transform: uppercase; letter-spacing: 0.05em;">Berat / Jumlah</label>
            <div style="position: relative; display: flex; align-items: center;">
              <input type="number" id="calcWeight" value="3" min="1" max="100" style="width: 100%; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.2); color: white; border-radius: 10px; padding: 0.8rem; padding-right: 2.5rem; outline: none; font-family: 'DM Sans', sans-serif; font-size: 0.95rem; transition: all 0.3s;" oninput="calculatePrice()">
              <span id="calcUnitLabel" style="position: absolute; right: 1rem; color: rgba(255,255,255,0.5); font-size: 0.9rem; font-weight: 600;">kg</span>
            </div>
          </div>
        </div>

        <div style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06); border-radius: 16px; padding: 1.5rem; text-align: center; margin-bottom: 2rem; backdrop-filter: blur(5px);">
          <div style="font-size: 0.85rem; color: var(--gray-3); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 0.3rem;">Total Estimasi</div>
          <div id="calcTotal" style="font-family: 'Playfair Display', serif; font-size: 2.5rem; font-weight: 900; color: var(--blue-2); line-height: 1.2;">Rp 0</div>
          <div id="calcEstimation" style="font-size: 0.85rem; color: rgba(255,255,255,0.6); margin-top: 0.5rem;">Estimasi selesai: -</div>
        </div>

        <a id="calcWaBtn" href="#" target="_blank" style="display: block; text-align: center; background: #25D366; color: white; padding: 1rem; border-radius: 12px; font-weight: 700; font-size: 1.05rem; text-decoration: none; transition: transform .2s, box-shadow .2s; box-shadow: 0 8px 25px rgba(37,211,102,0.4); display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
          Order Sekarang Lewat WhatsApp
        </a>
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section id="testimonials">
  <div class="container">
    <div class="reveal" style="text-align:center;">
      <div class="section-label">Ulasan Pelanggan</div>
      <h2 class="section-title">Yang Mereka Katakan</h2>
    </div>
    <div class="testimonial-grid">
      <div class="testi-card reveal reveal-delay-1">
        <div class="stars">★★★★★</div>
        <p class="testi-text">"Hasil cuciannya bersih banget dan wangi tahan lama. Express-nya beneran 3 jam, cocok banget buat saya yang sibuk!"</p>
        <div class="testi-author">
          <div class="testi-avatar">RA</div>
          <div>
            <div class="testi-name">Rini Andriani</div>
            <div class="testi-role">Pelanggan Express · Kebayoran</div>
          </div>
        </div>
      </div>
      <div class="testi-card reveal reveal-delay-2">
        <div class="stars">★★★★★</div>
        <p class="testi-text">"Pelayanan ramah, harga bersaing. Pakaian kerja saya selalu rapi berkat layanan setrika premium mereka. Highly recommended!"</p>
        <div class="testi-author">
          <div class="testi-avatar">BW</div>
          <div>
            <div class="testi-name">Bima Wicaksono</div>
            <div class="testi-role">Pelanggan Premium · Sudirman</div>
          </div>
        </div>
      </div>
      <div class="testi-card reveal reveal-delay-3">
        <div class="stars">★★★★★</div>
        <p class="testi-text">"Antar jemput tepat waktu, notifikasi WhatsApp sangat membantu. Sudah langganan hampir setahun dan gak pernah kecewa."</p>
        <div class="testi-author">
          <div class="testi-avatar">DP</div>
          <div>
            <div class="testi-name">Dewi Puspita</div>
            <div class="testi-role">Pelanggan Regular · Menteng</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section id="cta">
  <div class="container">
    <h2 class="reveal">Siap Mulai?<br />Hubungi Kami Sekarang</h2>
    <p class="reveal reveal-delay-1">Nikmati kemudahan laundry profesional. Tim kami siap melayani Anda hari ini.</p>
    <a href="https://wa.me/628123456789" class="btn-wa reveal reveal-delay-2">
      <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
      Chat di WhatsApp
    </a>
  </div>
</section>

<!-- FOOTER -->
<footer>
  <p>© 2026 <span>LaundryKu</span>. All rights reserved. · Dibuat dengan ♥ di Jakarta</p>
</footer>

<script>
  // Navbar scroll effect
  const navbar = document.getElementById('navbar');
  window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 20);
  });

  // Scroll reveal
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
  }, { threshold: 0.12 });
  document.querySelectorAll('.reveal').forEach(el => observer.observe(el));

  // Dynamic Price Calculator
  function calculatePrice() {
    const calcPkg = document.getElementById('calcPackage');
    if (!calcPkg) return;
    
    const selectedOpt = calcPkg.options[calcPkg.selectedIndex];
    if (!selectedOpt) return;
    
    const price = parseInt(selectedOpt.value) || 0;
    const name = selectedOpt.getAttribute('data-name');
    const unit = selectedOpt.getAttribute('data-unit');
    const days = parseInt(selectedOpt.getAttribute('data-days')) || 1;
    
    const weightInput = document.getElementById('calcWeight');
    let weight = parseFloat(weightInput.value) || 1;
    if (weight < 1) { weight = 1; weightInput.value = 1; }
    
    // Update unit label
    document.getElementById('calcUnitLabel').textContent = unit;
    
    // Calculate total price
    const total = weight * price;
    document.getElementById('calcTotal').textContent = 'Rp ' + total.toLocaleString('id-ID');
    
    // Calculate estimated completion date
    const estDate = new Date();
    estDate.setDate(estDate.getDate() + days);
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const dateString = estDate.toLocaleDateString('id-ID', options);
    document.getElementById('calcEstimation').textContent = 'Estimasi selesai: ' + dateString + ' (± ' + days + ' hari)';
    
    // Update WhatsApp button URL
    const calcWaBtn = document.getElementById('calcWaBtn');
    const waText = encodeURIComponent(
      `Halo LaundryKu, saya ingin memesan layanan laundry:\n\n` +
      `- Paket: ${name}\n` +
      `- Jumlah/Berat: ${weight} ${unit}\n` +
      `- Estimasi Biaya: Rp ${total.toLocaleString('id-ID')}\n\n` +
      `Mohon diinfokan untuk proses selanjutnya. Terima kasih!`
    );
    calcWaBtn.href = `https://wa.me/628123456789?text=${waText}`;
  }

  // Real-time Order Tracking via AJAX
  function trackOrder() {
    const invoiceCode = document.getElementById('trackInput').value.trim();
    const errorEl = document.getElementById('trackError');
    const resultPanel = document.getElementById('trackResultPanel');
    
    if (!invoiceCode) {
      errorEl.textContent = '⚠ Masukkan kode invoice terlebih dahulu.';
      errorEl.style.display = 'block';
      resultPanel.style.display = 'none';
      return;
    }
    
    errorEl.style.display = 'none';
    
    // Call endpoint
    fetch('/track/' + encodeURIComponent(invoiceCode))
      .then(response => {
        if (!response.ok) {
          throw new Error('Invoice tidak ditemukan.');
        }
        return response.json();
      })
      .then(data => {
        if (data.success) {
          // Fill text details
          document.getElementById('resInvoice').textContent = data.invoice;
          document.getElementById('resCustomer').textContent = data.customer;
          document.getElementById('resPackage').textContent = data.package;
          document.getElementById('resWeight').textContent = data.weight + ' Kg';
          document.getElementById('resTotal').textContent = 'Rp ' + data.total_price;
          
          // Payment status styling
          const payStatus = document.getElementById('resPaymentStatus');
          payStatus.textContent = data.payment_status === 'paid' ? 'LUNAS' : 'BELUM LUNAS';
          if (data.payment_status === 'paid') {
            payStatus.style.background = '#D1FAE5';
            payStatus.style.color = '#065F46';
          } else {
            payStatus.style.background = '#FEF3C7';
            payStatus.style.color = '#92400E';
          }
          
          // Update PDF download link
          document.getElementById('resDownloadPdf').href = '/invoice/' + data.id;
          
          // Update WA help link
          const waText = encodeURIComponent(
            `Halo Admin LaundryKu, saya ingin bertanya tentang pesanan saya:\n` +
            `- Invoice: ${data.invoice}\n` +
            `- Status: ${data.status.toUpperCase()}\n` +
            `Terima kasih.`
          );
          document.getElementById('resHelpWa').href = `https://wa.me/628123456789?text=${waText}`;
          
          // Update Stepper Progress
          updateStepper(data.status);
          
          // Show panel
          resultPanel.style.display = 'block';
          
          // Smooth scroll to results
          setTimeout(() => {
            resultPanel.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
          }, 100);
        }
      })
      .catch(err => {
        errorEl.textContent = '❌ Kode pesanan tidak ditemukan. Hubungi kami via WhatsApp jika ada kendala.';
        errorEl.style.display = 'block';
        resultPanel.style.display = 'none';
      });
  }

  // Update Stepper UI based on current status
  function updateStepper(status) {
    const statuses = ['pending', 'washing', 'drying', 'ironing', 'done', 'picked_up'];
    const currentIndex = statuses.indexOf(status);
    
    // Calculate percentage width of the progress bar
    let progressPercentage = 0;
    if (currentIndex > 0) {
      progressPercentage = (currentIndex / (statuses.length - 1)) * 90; // Up to 90%
    }
    document.getElementById('stepperProgressBar').style.width = `${progressPercentage}%`;
    
    // Highlight step nodes
    const stepNodes = document.querySelectorAll('.step-node');
    stepNodes.forEach((node) => {
      const nodeStep = node.getAttribute('data-step');
      const nodeIndex = statuses.indexOf(nodeStep);
      
      const icon = node.querySelector('.node-icon');
      const label = node.querySelector('.node-label');
      
      // Reset styling
      icon.style.boxShadow = 'none';
      
      if (nodeIndex < currentIndex) {
        // Step is completed
        icon.style.background = 'var(--blue-3)';
        icon.style.borderColor = 'var(--blue-3)';
        icon.style.color = 'white';
        icon.innerHTML = '✓';
        label.style.color = 'var(--blue-4)';
      } else if (nodeIndex === currentIndex) {
        // Current step is active
        icon.style.background = 'white';
        icon.style.borderColor = 'var(--blue-3)';
        icon.style.color = 'var(--blue-3)';
        icon.innerHTML = (nodeIndex + 1).toString();
        icon.style.boxShadow = '0 0 0 4px rgba(46, 140, 228, 0.25)';
        label.style.color = 'var(--blue-5)';
        label.style.fontWeight = '700';
      } else {
        // Future steps
        icon.style.background = 'white';
        icon.style.borderColor = 'var(--gray-2)';
        icon.style.color = 'var(--gray-3)';
        icon.innerHTML = (nodeIndex + 1).toString();
        label.style.color = 'var(--gray-4)';
        label.style.fontWeight = '600';
      }
    });
  }

  // Setup listeners and initialize calculator
  document.addEventListener('DOMContentLoaded', () => {
    calculatePrice();
    
    const trackInput = document.getElementById('trackInput');
    if (trackInput) {
      trackInput.addEventListener('keydown', e => { 
        if (e.key === 'Enter') trackOrder(); 
      });
    }
  });

  // Animated counter
  function animateCounters() {
    document.querySelectorAll('.stat-num').forEach(el => {
      const text = el.textContent;
      const num = parseFloat(text.replace(/[^0-9.]/g, ''));
      if (!num) return;
      let start = 0, duration = 1500, startTime = null;
      const suffix = text.replace(/[0-9.]/g, '');
      function step(ts) {
        if (!startTime) startTime = ts;
        const progress = Math.min((ts - startTime) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        el.textContent = (num >= 1000 ? Math.floor(eased * num / 1000) + 'K' : (eased * num).toFixed(num % 1 !== 0 ? 1 : 0)) + suffix;
        if (progress < 1) requestAnimationFrame(step);
        else el.textContent = text;
      }
      requestAnimationFrame(step);
    });
  }
  
  const heroObs = new IntersectionObserver(entries => {
    if (entries[0].isIntersecting) { animateCounters(); heroObs.disconnect(); }
  }, { threshold: .5 });
  const statsEl = document.querySelector('.hero-stats');
  if (statsEl) heroObs.observe(statsEl);
</script>
</body>
</html>