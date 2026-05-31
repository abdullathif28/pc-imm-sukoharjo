@extends('layouts.public')
@section('title', 'Beranda')
@section('og_title', 'PC IMM Sukoharjo — Religiusitas, Intelektualitas, Humanitas')
@section('og_description', 'Website resmi Pimpinan Cabang Ikatan Mahasiswa Muhammadiyah Sukoharjo.')

@push('styles')
<style>
/* ============================================
   HOME PAGE — PC IMM SUKOHARJO
   Aesthetic: Editorial Islamic Geometric
   Ciri khas: Diagonal cuts + Gold accents +
              Geometric patterns + Bold serif
============================================ */

/* ===== HERO ===== */
.hero-wrap {
    min-height: 100svh;
    background: linear-gradient(150deg, var(--c-red) 0%, #7B0000 60%, #3D0000 100%);
    position: relative;
    display: flex;
    align-items: center;
    overflow: hidden;
    padding: 6rem 0 4rem;
}

/* Pola geometris Islam di background */
.hero-wrap::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M40 0L80 40L40 80L0 40z'/%3E%3C/g%3E%3C/svg%3E");
    pointer-events: none;
}

/* Blur sphere kanan atas */
.hero-wrap::after {
    content: '';
    position: absolute;
    top: -100px;
    right: -100px;
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, rgba(249,168,37,0.18) 0%, transparent 70%);
    pointer-events: none;
}

.hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(249,168,37,0.15);
    border: 1px solid rgba(249,168,37,0.4);
    color: var(--c-gold);
    font-size: 0.72rem;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 6px 14px;
    border-radius: 99px;
    margin-bottom: 1.5rem;
}
.hero-eyebrow .dot {
    width: 6px;
    height: 6px;
    background: var(--c-gold);
    border-radius: 50%;
    animation: blink 1.5s ease-in-out infinite;
}
@keyframes blink { 0%,100%{opacity:1} 50%{opacity:0.3} }

.hero-title {
    font-family: var(--font-display);
    font-size: clamp(2.8rem, 7vw, 5.5rem);
    font-weight: 900;
    color: white;
    line-height: 1.05;
    margin-bottom: 1.5rem;
}
.hero-title .accent {
    color: var(--c-gold);
    display: block;
    position: relative;
}
.hero-title .accent::after {
    content: '';
    position: absolute;
    bottom: -4px;
    left: 0;
    width: 100%;
    height: 3px;
    background: linear-gradient(90deg, var(--c-gold), transparent);
    border-radius: 99px;
}

.hero-desc {
    color: rgba(255,255,255,0.7);
    font-size: 1.05rem;
    line-height: 1.8;
    max-width: 480px;
    margin-bottom: 2.5rem;
}

.hero-tri {
    display: flex;
    gap: 2rem;
    margin-bottom: 2.5rem;
}
.hero-tri-item {
    color: rgba(255,255,255,0.6);
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    display: flex;
    align-items: center;
    gap: 6px;
}
.hero-tri-item::before {
    content: '';
    width: 4px;
    height: 4px;
    background: var(--c-gold);
    border-radius: 50%;
}

/* Stats panel kanan */
.hero-stats-panel {
    background: rgba(255,255,255,0.06);
    backdrop-filter: blur(20px);
    border: 1px solid rgba(255,255,255,0.12);
    border-radius: 24px;
    padding: 2rem;
    position: relative;
    overflow: hidden;
}
.hero-stats-panel::before {
    content: '';
    position: absolute;
    top: -1px;
    left: 24px;
    right: 24px;
    height: 2px;
    background: linear-gradient(90deg, transparent, var(--c-gold), transparent);
}

.stat-item {
    padding: 1.25rem;
    border-radius: 16px;
    background: rgba(255,255,255,0.06);
    border: 1px solid rgba(255,255,255,0.08);
    text-align: center;
    transition: all 0.3s ease;
    cursor: default;
}
.stat-item:hover {
    background: rgba(249,168,37,0.12);
    border-color: rgba(249,168,37,0.3);
    transform: translateY(-4px);
}
.stat-number {
    font-family: var(--font-display);
    font-size: 2.4rem;
    font-weight: 900;
    color: white;
    line-height: 1;
    margin-bottom: 4px;
}
.stat-label {
    font-size: 0.72rem;
    color: rgba(255,255,255,0.5);
    letter-spacing: 1px;
    text-transform: uppercase;
    font-weight: 600;
}

/* Scroll indicator */
.hero-scroll {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
    color: rgba(255,255,255,0.4);
    font-size: 0.7rem;
    letter-spacing: 2px;
    text-transform: uppercase;
}
.hero-scroll-mouse {
    width: 22px;
    height: 36px;
    border: 2px solid rgba(255,255,255,0.25);
    border-radius: 11px;
    position: relative;
}
.hero-scroll-mouse::after {
    content: '';
    position: absolute;
    top: 6px;
    left: 50%;
    transform: translateX(-50%);
    width: 3px;
    height: 6px;
    background: rgba(255,255,255,0.4);
    border-radius: 99px;
    animation: scrollDown 1.5s ease-in-out infinite;
}
@keyframes scrollDown {
    0% { top: 6px; opacity: 1; }
    100% { top: 18px; opacity: 0; }
}

/* ===== FEATURED SECTION ===== */
.section-wrap { padding: 5rem 0; }
.section-wrap-alt { background: var(--c-surface2); }
[data-theme="dark"] .section-wrap-alt { background: var(--c-surface2); }

/* ===== BIDANG CARDS (animated) ===== */
.bidang-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 1.25rem; }
.bidang-card-new {
    background: var(--c-surface);
    border: 1px solid var(--c-border);
    border-radius: 20px;
    padding: 1.75rem;
    text-decoration: none;
    display: block;
    transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
    color: var(--c-text);
}
.bidang-card-new::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: linear-gradient(90deg, var(--c-red), var(--c-gold));
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 0.4s ease;
}
.bidang-card-new:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(183,28,28,0.12);
    border-color: rgba(183,28,28,0.2);
    color: var(--c-text);
}
.bidang-card-new:hover::before { transform: scaleX(1); }

.bidang-icon-wrap {
    width: 52px;
    height: 52px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    margin-bottom: 1.25rem;
    transition: transform 0.3s ease;
}
.bidang-card-new:hover .bidang-icon-wrap { transform: scale(1.1) rotate(-5deg); }

.bidang-singkatan {
    font-size: 0.65rem;
    letter-spacing: 2px;
    text-transform: uppercase;
    font-weight: 700;
    color: var(--c-red);
    margin-bottom: 0.3rem;
}
.bidang-nama {
    font-family: var(--font-display);
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--c-text);
    line-height: 1.3;
    margin-bottom: 0.75rem;
}
.bidang-desc {
    font-size: 0.85rem;
    color: var(--c-muted);
    line-height: 1.6;
    margin-bottom: 1.25rem;
}
.bidang-count-pill {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    font-size: 0.75rem;
    font-weight: 600;
    color: var(--c-red);
    background: rgba(183,28,28,0.08);
    padding: 4px 10px;
    border-radius: 99px;
}

/* ===== BERITA CARDS ===== */
.news-card {
    background: var(--c-surface);
    border: 1px solid var(--c-border);
    border-radius: 20px;
    overflow: hidden;
    transition: all 0.35s ease;
    text-decoration: none;
    display: block;
    color: var(--c-text);
    height: 100%;
}
.news-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 40px rgba(183,28,28,0.1);
    color: var(--c-text);
}
.news-card-img {
    height: 200px;
    object-fit: cover;
    width: 100%;
}
.news-card-img-placeholder {
    height: 200px;
    background: linear-gradient(135deg, var(--c-red), #5D0000);
    display: flex;
    align-items: center;
    justify-content: center;
}
.news-card-body { padding: 1.5rem; }
.news-meta {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 0.85rem;
    flex-wrap: wrap;
}
.badge-jenis {
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 0.5px;
    padding: 3px 10px;
    border-radius: 99px;
    text-transform: uppercase;
}
.badge-berita  { background: rgba(183,28,28,0.1); color: var(--c-red); }
.badge-kegiatan { background: rgba(249,168,37,0.15); color: #B8860B; }
.badge-proker  { background: rgba(21,101,192,0.1); color: #1565C0; }
[data-theme="dark"] .badge-kegiatan { color: var(--c-gold); }

.news-title {
    font-family: var(--font-display);
    font-size: 1.05rem;
    font-weight: 700;
    line-height: 1.4;
    margin-bottom: 0.6rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.news-excerpt {
    font-size: 0.85rem;
    color: var(--c-muted);
    line-height: 1.6;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* ===== KEGIATAN CARDS ===== */
.event-card {
    background: var(--c-surface);
    border: 1px solid var(--c-border);
    border-radius: 20px;
    overflow: hidden;
    display: flex;
    gap: 0;
    text-decoration: none;
    color: var(--c-text);
    transition: all 0.35s ease;
}
.event-card:hover {
    transform: translateX(6px);
    box-shadow: var(--shadow-md);
    color: var(--c-text);
    border-color: rgba(183,28,28,0.25);
}
.event-date-block {
    min-width: 80px;
    background: linear-gradient(150deg, var(--c-red), #7B0000);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 1.25rem 0.75rem;
    text-align: center;
}
.event-day {
    font-family: var(--font-display);
    font-size: 2rem;
    font-weight: 900;
    color: white;
    line-height: 1;
}
.event-month {
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: var(--c-gold);
}
.event-body { padding: 1.25rem 1.5rem; flex: 1; }
.event-title {
    font-family: var(--font-display);
    font-size: 1rem;
    font-weight: 700;
    margin-bottom: 0.4rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.event-loc {
    font-size: 0.8rem;
    color: var(--c-muted);
    display: flex;
    align-items: center;
    gap: 4px;
}

/* ===== CTA SECTION ===== */
.cta-section {
    background: linear-gradient(135deg, var(--c-dark) 0%, #3D0000 100%);
    padding: 5rem 0;
    position: relative;
    overflow: hidden;
}
.cta-section::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 60 60'%3E%3Cg fill='%23ffffff' fill-opacity='0.02'%3E%3Cpath d='M30 0L60 30L30 60L0 30z'/%3E%3C/g%3E%3C/svg%3E");
}
[data-theme="dark"] .cta-section {
    background: linear-gradient(135deg, #0D0505 0%, #2A0000 100%);
}
.cta-title {
    font-family: var(--font-display);
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 900;
    color: white;
    line-height: 1.1;
}
.cta-title .gold { color: var(--c-gold); }

/* ===== GALERI SECTION ===== */
.gallery-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: 220px 220px;
    gap: 12px;
    border-radius: 20px;
    overflow: hidden;
}
.gallery-item {
    position: relative;
    overflow: hidden;
    cursor: pointer;
}
.gallery-item:first-child {
    grid-column: span 2;
    grid-row: span 2;
}
.gallery-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}
.gallery-item:hover img { transform: scale(1.08); }
.gallery-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(to top, rgba(183,28,28,0.7), transparent);
    opacity: 0;
    transition: opacity 0.3s ease;
    display: flex;
    align-items: flex-end;
    padding: 1rem;
}
.gallery-item:hover .gallery-overlay { opacity: 1; }
.gallery-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, var(--c-red) 0%, #5D0000 100%);
    display: flex;
    align-items: center;
    justify-content: center;
}

@media (max-width: 768px) {
    .gallery-grid {
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: 160px 160px 160px;
    }
    .gallery-item:first-child { grid-column: span 2; grid-row: span 1; }
    .hero-tri { flex-wrap: wrap; gap: 1rem; }
}
</style>
@endpush

@section('content')

{{-- ===== HERO SECTION ===== --}}
<section class="hero-wrap">
    <div class="container position-relative" style="z-index:2;">
        <div class="row align-items-center g-5">

            {{-- Kiri: Teks --}}
            <div class="col-lg-7" data-aos="fade-right" data-aos-duration="800">
                <div class="hero-eyebrow">
                    <span class="dot"></span>
                    Pimpinan Cabang IMM Sukoharjo
                </div>

                <h1 class="hero-title">
                    Bersama<br>Membangun
                    <span class="accent">Umat &amp; Bangsa</span>
                </h1>

                <p class="hero-desc">
                    Ikatan Mahasiswa Muhammadiyah Sukoharjo — wadah mahasiswa Muslim yang bergerak dalam pengembangan intelektual, spiritual, dan sosial untuk kemajuan masyarakat.
                </p>

                <div class="hero-tri">
                    <div class="hero-tri-item">Religiusitas</div>
                    <div class="hero-tri-item">Intelektualitas</div>
                    <div class="hero-tri-item">Humanitas</div>
                </div>

                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('konten') }}" class="btn-primary-imm">
                        <i class="bi bi-newspaper"></i> Jelajahi Konten
                    </a>
                    <a href="{{ route('tentang') }}" class="btn-outline-imm" style="border-color:rgba(255,255,255,0.4);color:white;">
                        <i class="bi bi-info-circle"></i> Tentang Kami
                    </a>
                </div>
            </div>

            {{-- Kanan: Stats Panel --}}
            <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200" data-aos-duration="800">
                <div class="hero-stats-panel">
                    <p style="font-size:0.7rem;letter-spacing:2px;text-transform:uppercase;color:rgba(255,255,255,0.4);font-weight:700;margin-bottom:1.25rem;text-align:center;">Dalam Angka</p>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="stat-item">
                                <div class="stat-number" data-count="{{ $stats['total_bidang'] }}">0</div>
                                <div class="stat-label">Bidang Aktif</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-item">
                                <div class="stat-number" data-count="{{ $stats['total_konten'] }}">0</div>
                                <div class="stat-label">Total Konten</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-item">
                                <div class="stat-number" data-count="{{ $stats['total_berita'] }}">0</div>
                                <div class="stat-label">Berita</div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="stat-item">
                                <div class="stat-number" data-count="{{ $stats['total_kegiatan'] }}">0</div>
                                <div class="stat-label">Kegiatan</div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 pt-3" style="border-top:1px solid rgba(255,255,255,0.08);text-align:center;">
                        <a href="{{ route('komisariat') }}" style="font-size:0.8rem;color:rgba(255,255,255,0.5);text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--c-gold)'" onmouseout="this.style.color='rgba(255,255,255,0.5)'">
                            <i class="bi bi-building me-1"></i> Lihat semua komisariat →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hero-scroll">
        <div class="hero-scroll-mouse"></div>
        <span>Scroll</span>
    </div>
</section>

{{-- ===== BERITA TERKINI ===== --}}
<section class="section-wrap geo-pattern">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5" data-aos="fade-up">
            <div>
                <div class="section-label mb-2">Terbaru</div>
                <h2 class="section-heading">Berita Terkini</h2>
            </div>
            <a href="{{ route('konten', ['jenis' => 'berita']) }}" class="btn-outline-imm" style="font-size:0.85rem;padding:0.5rem 1.2rem;">
                Semua <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">
            @forelse($beritaTerbaru as $index => $berita)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">
                <a href="{{ route('konten.detail', $berita->slug) }}" class="news-card">
                    @if($berita->thumbnail)
                        <img src="{{ asset('storage/'.$berita->thumbnail) }}" class="news-card-img" alt="{{ $berita->judul }}">
                    @else
                        <div class="news-card-img-placeholder">
                            <i class="bi bi-newspaper" style="font-size:2.5rem;color:rgba(255,255,255,0.3);"></i>
                        </div>
                    @endif
                    <div class="news-card-body">
                        <div class="news-meta">
                            <span class="badge-jenis badge-berita">{{ $berita->bidang->singkatan ?? 'IMM' }}</span>
                            <span style="font-size:0.75rem;color:var(--c-muted);">{{ $berita->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="news-title">{{ $berita->judul }}</div>
                        <div class="news-excerpt">{{ $berita->ringkasan ?: Str::limit(strip_tags($berita->isi), 100) }}</div>
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12 text-center py-5" style="color:var(--c-muted);">
                <i class="bi bi-newspaper" style="font-size:3rem;opacity:0.3;"></i>
                <p class="mt-2">Belum ada berita.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

{{-- ===== BIDANG ===== --}}
<section class="section-wrap section-wrap-alt">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <div class="section-label mb-2 justify-content-center">Organisasi</div>
            <h2 class="section-heading">Bidang PC IMM Sukoharjo</h2>
            <p style="color:var(--c-muted);max-width:520px;margin:0.75rem auto 0;font-size:0.95rem;">
                Setiap bidang memiliki fokus, program kerja, dan kontribusi nyata bagi kader dan masyarakat.
            </p>
        </div>

        <div class="bidang-grid">
            @php
                $bidangIcons = ['🏛️','🔬','🕌','🤝','⚖️','📢','💼','🎨','❤️','📚'];
                $bidangColors = [
                    'rgba(183,28,28,0.08)',
                    'rgba(74,20,140,0.08)',
                    'rgba(1,87,155,0.08)',
                    'rgba(230,81,0,0.08)',
                    'rgba(38,50,56,0.08)',
                    'rgba(0,96,100,0.08)',
                ];
            @endphp
            @foreach($bidangs as $index => $bidang)
            <a href="{{ route('bidang.detail', $bidang) }}" class="bidang-card-new" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 80 }}">
                <div class="bidang-icon-wrap" style="background: {{ $bidangColors[$index % count($bidangColors)] }};">
                    {{ $bidangIcons[$index % count($bidangIcons)] }}
                </div>
                <div class="bidang-singkatan">{{ $bidang->singkatan }}</div>
                <div class="bidang-nama">{{ $bidang->nama }}</div>
                <div class="bidang-desc">{{ Str::limit($bidang->deskripsi, 90) }}</div>
                <div class="d-flex align-items-center justify-content-between">
                    <span class="bidang-count-pill">
                        <i class="bi bi-file-text"></i> {{ $bidang->kontens_count }} konten
                    </span>
                    <span style="font-size:0.8rem;font-weight:600;color:var(--c-red);">Lihat <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== KEGIATAN MENDATANG ===== --}}
<section class="section-wrap">
    <div class="container">
        <div class="row g-5 align-items-start">
            <div class="col-lg-4" data-aos="fade-right">
                <div class="section-label mb-2">Agenda</div>
                <h2 class="section-heading mb-3">Kegiatan<br>Mendatang</h2>
                <p style="color:var(--c-muted);font-size:0.95rem;line-height:1.7;margin-bottom:2rem;">
                    Ikuti berbagai kegiatan dari seluruh bidang PC IMM Sukoharjo — dari pengkaderan, kajian, hingga bakti sosial.
                </p>
                <a href="{{ route('konten', ['jenis' => 'kegiatan']) }}" class="btn-outline-imm">
                    Semua Kegiatan <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="col-lg-8">
                <div class="d-flex flex-column gap-3">
                    @forelse($kegiatanTerbaru as $index => $kegiatan)
                    <a href="{{ route('konten.detail', $kegiatan->slug) }}" class="event-card" data-aos="fade-left" data-aos-delay="{{ $index * 80 }}">
                        <div class="event-date-block">
                            @if($kegiatan->tanggal_mulai)
                                <div class="event-day">{{ $kegiatan->tanggal_mulai->format('d') }}</div>
                                <div class="event-month">{{ $kegiatan->tanggal_mulai->format('M') }}</div>
                            @else
                                <div class="event-day" style="font-size:1.5rem;">—</div>
                            @endif
                        </div>
                        <div class="event-body">
                            <span class="badge-jenis badge-kegiatan" style="margin-bottom:0.5rem;display:inline-block;">{{ $kegiatan->bidang->singkatan ?? 'IMM' }}</span>
                            <div class="event-title">{{ $kegiatan->judul }}</div>
                            @if($kegiatan->lokasi)
                            <div class="event-loc mt-1">
                                <i class="bi bi-geo-alt-fill" style="color:var(--c-red);"></i>
                                {{ $kegiatan->lokasi }}
                            </div>
                            @endif
                        </div>
                        <div style="display:flex;align-items:center;padding:0 1.25rem;color:var(--c-muted);">
                            <i class="bi bi-chevron-right"></i>
                        </div>
                    </a>
                    @empty
                    <div class="text-center py-4" style="color:var(--c-muted);">
                        <i class="bi bi-calendar-x" style="font-size:2.5rem;opacity:0.3;"></i>
                        <p class="mt-2 small">Belum ada kegiatan terjadwal.</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== GALERI FOTO ===== --}}
@if(\Schema::hasTable('medias'))
@php
    $galeriItems = \App\Models\Media::whereHas('konten', fn($q) => $q->published())
        ->where('tipe', 'foto')->latest()->take(5)->get();
@endphp
@if($galeriItems->count() > 0)
<section class="section-wrap section-wrap-alt">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-5" data-aos="fade-up">
            <div>
                <div class="section-label mb-2">Dokumentasi</div>
                <h2 class="section-heading">Galeri Kegiatan</h2>
            </div>
        </div>
        <div class="gallery-grid" data-aos="fade-up">
            @for($i = 0; $i < 5; $i++)
            <div class="gallery-item">
                @if(isset($galeriItems[$i]))
                    <img src="{{ asset('storage/'.$galeriItems[$i]->file_path) }}" alt="Galeri IMM">
                    <div class="gallery-overlay">
                        <span style="color:white;font-size:0.8rem;font-weight:600;">
                            <i class="bi bi-zoom-in me-1"></i> Lihat
                        </span>
                    </div>
                @else
                    <div class="gallery-placeholder">
                        <i class="bi bi-image" style="font-size:2rem;color:rgba(255,255,255,0.2);"></i>
                    </div>
                @endif
            </div>
            @endfor
        </div>
    </div>
</section>
@endif
@endif

{{-- ===== CTA ===== --}}
<section class="cta-section">
    <div class="container text-center position-relative" style="z-index:2;" data-aos="fade-up">
        <div class="section-label mb-3 justify-content-center" style="color:rgba(249,168,37,0.7);">Bergabung</div>
        <h2 class="cta-title mb-3">
            Ikut Bergerak<br>Bersama <span class="gold">IMM Sukoharjo</span>
        </h2>
        <p style="color:rgba(255,255,255,0.6);max-width:480px;margin:0 auto 2.5rem;font-size:1rem;line-height:1.7;">
            Bersama membangun gerakan mahasiswa Muslim yang berkomitmen untuk kemajuan umat, bangsa, dan kemanusiaan.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('tentang') }}" class="btn-primary-imm" style="background:linear-gradient(135deg,var(--c-gold),#E65100);color:#1A0A0A;">
                <i class="bi bi-info-circle"></i> Tentang IMM
            </a>
            <a href="{{ route('komisariat') }}" class="btn-outline-imm" style="border-color:rgba(255,255,255,0.3);color:white;">
                <i class="bi bi-building"></i> Lihat Komisariat
            </a>
        </div>
    </div>
</section>

@endsection
