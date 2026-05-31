@extends('layouts.public')
@section('title', $bidang->nama)
@section('og_title', $bidang->nama . ' — PC IMM Sukoharjo')
@section('og_description', Str::limit($bidang->deskripsi, 160))
@section('show_share')

@push('styles')
<style>
/* ============================================
   DETAIL BIDANG — Rich Page
   Aesthetic: Bold editorial dengan aksen
   warna bidang yang dinamis
============================================ */

/* ===== PAGE HEADER ===== */
.bidang-header {
    background: linear-gradient(150deg, var(--c-red) 0%, #6D0000 100%);
    padding: 5rem 0 3rem;
    position: relative;
    overflow: hidden;
}
.bidang-header::before {
    content: '';
    position: absolute;
    inset: 0;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M40 0L80 40L40 80L0 40z'/%3E%3C/g%3E%3C/svg%3E");
}
.bidang-header::after {
    content: '';
    position: absolute;
    top: -80px;
    right: -80px;
    width: 400px;
    height: 400px;
    background: radial-gradient(circle, rgba(249,168,37,0.15) 0%, transparent 70%);
}
.bidang-header-content { position: relative; z-index: 2; }

.bidang-header-icon {
    width: 72px;
    height: 72px;
    background: rgba(249,168,37,0.2);
    border: 2px solid rgba(249,168,37,0.4);
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    margin-bottom: 1.25rem;
}
.bidang-header-singkatan {
    font-size: 0.7rem;
    letter-spacing: 3px;
    text-transform: uppercase;
    font-weight: 700;
    color: var(--c-gold);
    margin-bottom: 0.5rem;
}
.bidang-header-title {
    font-family: var(--font-display);
    font-size: clamp(2rem, 5vw, 3.2rem);
    font-weight: 900;
    color: white;
    line-height: 1.1;
    margin-bottom: 1rem;
}
.bidang-header-desc {
    color: rgba(255,255,255,0.7);
    font-size: 1rem;
    line-height: 1.7;
    max-width: 580px;
}

/* Stat pills di header */
.header-stats {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
    flex-wrap: wrap;
}
.header-stat-pill {
    background: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.15);
    border-radius: 99px;
    padding: 0.5rem 1.25rem;
    color: white;
    font-size: 0.85rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 6px;
}
.header-stat-pill i { color: var(--c-gold); }

/* ===== BREADCRUMB ===== */
.breadcrumb-wrap {
    padding: 0.75rem 0;
    border-bottom: 1px solid var(--c-border);
    background: var(--c-surface);
}
.bc-item {
    font-size: 0.82rem;
    color: var(--c-muted);
    text-decoration: none;
    transition: color 0.2s;
}
.bc-item:hover { color: var(--c-red); }
.bc-sep { margin: 0 6px; color: var(--c-border); font-size: 0.7rem; }

/* ===== SECTION WRAPPER ===== */
.rich-section { padding: 4rem 0; }
.rich-section + .rich-section { padding-top: 0; }
.rich-section-alt { background: var(--c-surface2); }

/* ===== PROGRAM KERJA DENGAN PROGRESS ===== */
.proker-card {
    background: var(--c-surface);
    border: 1px solid var(--c-border);
    border-radius: 20px;
    padding: 1.75rem;
    transition: all 0.3s ease;
    height: 100%;
}
.proker-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
    border-color: rgba(183,28,28,0.2);
}
.proker-number {
    font-family: var(--font-display);
    font-size: 2.5rem;
    font-weight: 900;
    color: rgba(183,28,28,0.1);
    line-height: 1;
    margin-bottom: 0.5rem;
}
.proker-title {
    font-family: var(--font-display);
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--c-text);
    margin-bottom: 0.6rem;
    line-height: 1.35;
}
.proker-desc {
    font-size: 0.85rem;
    color: var(--c-muted);
    line-height: 1.6;
    margin-bottom: 1.25rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
/* Progress bar capaian */
.progress-wrap { margin-bottom: 0.75rem; }
.progress-label {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 4px;
    font-size: 0.75rem;
    font-weight: 600;
    color: var(--c-muted);
}
.progress-bar-wrap {
    height: 6px;
    background: var(--c-border);
    border-radius: 99px;
    overflow: hidden;
}
.progress-bar-fill {
    height: 100%;
    border-radius: 99px;
    background: linear-gradient(90deg, var(--c-red), var(--c-gold));
    transition: width 1.2s cubic-bezier(0.4, 0, 0.2, 1);
    width: 0;
}
.proker-date-range {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 0.78rem;
    color: var(--c-muted);
    margin-top: 0.75rem;
}
.proker-link {
    font-size: 0.82rem;
    font-weight: 700;
    color: var(--c-red);
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    margin-top: 0.75rem;
    transition: gap 0.2s ease;
}
.proker-link:hover { gap: 8px; color: var(--c-red); }

/* ===== BERITA TERKAIT ===== */
.berita-list-item {
    background: var(--c-surface);
    border: 1px solid var(--c-border);
    border-radius: 16px;
    overflow: hidden;
    display: flex;
    text-decoration: none;
    color: var(--c-text);
    transition: all 0.3s ease;
    height: 100%;
}
.berita-list-item:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-md);
    color: var(--c-text);
}
.berita-list-img {
    width: 120px;
    min-width: 120px;
    object-fit: cover;
}
.berita-list-img-placeholder {
    width: 120px;
    min-width: 120px;
    background: linear-gradient(135deg, var(--c-red), #5D0000);
    display: flex;
    align-items: center;
    justify-content: center;
}
.berita-list-body {
    padding: 1rem 1.25rem;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
.berita-list-title {
    font-family: var(--font-display);
    font-size: 0.95rem;
    font-weight: 700;
    line-height: 1.4;
    margin-bottom: 0.4rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
.berita-list-meta { font-size: 0.78rem; color: var(--c-muted); }

/* ===== KEGIATAN GRID ===== */
.kegiatan-card {
    background: var(--c-surface);
    border: 1px solid var(--c-border);
    border-radius: 20px;
    overflow: hidden;
    text-decoration: none;
    color: var(--c-text);
    display: block;
    transition: all 0.3s ease;
    height: 100%;
}
.kegiatan-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--shadow-lg);
    color: var(--c-text);
}
.kegiatan-card-top {
    height: 140px;
    background: linear-gradient(135deg, var(--c-red) 0%, #7B0000 100%);
    display: flex;
    align-items: flex-end;
    padding: 1rem;
    position: relative;
}
.kegiatan-date-badge {
    position: absolute;
    top: 12px;
    right: 12px;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255,255,255,0.2);
    border-radius: 10px;
    padding: 6px 10px;
    text-align: center;
    color: white;
}
.kegiatan-date-badge .kd-day {
    font-family: var(--font-display);
    font-size: 1.4rem;
    font-weight: 900;
    line-height: 1;
}
.kegiatan-date-badge .kd-month {
    font-size: 0.62rem;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: var(--c-gold);
}
.kegiatan-card-body { padding: 1.25rem; }
.kegiatan-card-title {
    font-family: var(--font-display);
    font-size: 1rem;
    font-weight: 700;
    line-height: 1.35;
    margin-bottom: 0.5rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* ===== EMPTY STATE ===== */
.empty-state {
    padding: 4rem 2rem;
    text-align: center;
    color: var(--c-muted);
}
.empty-state i { font-size: 3rem; opacity: 0.25; display: block; margin-bottom: 1rem; }

@media (max-width: 768px) {
    .bidang-header { padding: 4rem 0 2.5rem; }
    .header-stats { gap: 0.6rem; }
}
</style>
@endpush

@section('content')

{{-- ===== BREADCRUMB ===== --}}
<div class="breadcrumb-wrap">
    <div class="container">
        <div class="d-flex align-items-center flex-wrap gap-1">
            <a href="{{ route('home') }}" class="bc-item">Beranda</a>
            <span class="bc-sep"><i class="bi bi-chevron-right"></i></span>
            <a href="{{ route('bidang') }}" class="bc-item">Bidang</a>
            <span class="bc-sep"><i class="bi bi-chevron-right"></i></span>
            <span style="font-size:0.82rem;color:var(--c-text);font-weight:600;">{{ $bidang->singkatan ?? $bidang->nama }}</span>
        </div>
    </div>
</div>

{{-- ===== HEADER ===== --}}
<section class="bidang-header">
    <div class="container bidang-header-content">
        <div class="row align-items-center g-4">
            <div class="col-lg-8" data-aos="fade-right">
                <div class="bidang-header-icon">
                    @php
                        $icons = ['🏛️','🔬','🕌','🤝','⚖️','📢','💼','🎨','❤️','📚'];
                        // Ambil dari DB jika ada, fallback ke urutan
                        echo $bidang->icon ?? $icons[($bidang->urutan - 1) % count($icons)];
                    @endphp
                </div>
                <div class="bidang-header-singkatan">{{ $bidang->singkatan }}</div>
                <h1 class="bidang-header-title">{{ $bidang->nama }}</h1>
                <p class="bidang-header-desc">{{ $bidang->deskripsi }}</p>

                <div class="header-stats">
                    <div class="header-stat-pill">
                        <i class="bi bi-newspaper"></i>
                        {{ $berita->total() }} Berita
                    </div>
                    <div class="header-stat-pill">
                        <i class="bi bi-calendar-event"></i>
                        {{ $kegiatan->count() }} Kegiatan
                    </div>
                    <div class="header-stat-pill">
                        <i class="bi bi-list-check"></i>
                        {{ $proker->count() }} Program Kerja
                    </div>
                </div>
            </div>

            {{-- Foto bidang (jika ada) --}}
            @if($bidang->foto)
            <div class="col-lg-4" data-aos="fade-left">
                <img src="{{ asset('storage/'.$bidang->foto) }}" alt="{{ $bidang->nama }}"
                    style="width:100%;border-radius:20px;object-fit:cover;max-height:260px;border:3px solid rgba(255,255,255,0.15);">
            </div>
            @endif
        </div>
    </div>
</section>

{{-- ===== PROGRAM KERJA ===== --}}
@if($proker->count() > 0)
<section class="rich-section rich-section-alt">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4" data-aos="fade-up">
            <div>
                <div class="section-label mb-2">Proker</div>
                <h2 class="section-heading" style="font-size:clamp(1.5rem,3vw,2rem);">Program Kerja</h2>
            </div>
            <a href="{{ route('konten', ['bidang_id' => $bidang->id, 'jenis' => 'program_kerja']) }}" class="btn-outline-imm" style="font-size:0.85rem;padding:0.5rem 1.2rem;">
                Semua <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">
            @foreach($proker as $index => $p)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">
                <div class="proker-card">
                    <div class="proker-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>

                    <a href="{{ route('konten.detail', $p->slug) }}" style="text-decoration:none;">
                        <div class="proker-title">{{ $p->judul }}</div>
                    </a>
                    <div class="proker-desc">{{ $p->ringkasan ?: Str::limit(strip_tags($p->isi), 100) }}</div>

                    {{-- Progress bar berdasarkan tanggal --}}
                    @if($p->tanggal_mulai && $p->tanggal_selesai)
                    @php
                        $start    = $p->tanggal_mulai->timestamp;
                        $end      = $p->tanggal_selesai->timestamp;
                        $now      = now()->timestamp;
                        $progress = $end > $start
                            ? min(100, max(0, round((($now - $start) / ($end - $start)) * 100)))
                            : 0;
                        $statusLabel = $progress >= 100 ? 'Selesai' : ($progress <= 0 ? 'Belum mulai' : 'Berjalan');
                        $statusColor = $progress >= 100 ? '#2E7D32' : ($progress <= 0 ? 'var(--c-muted)' : 'var(--c-red)');
                    @endphp
                    <div class="progress-wrap">
                        <div class="progress-label">
                            <span>Capaian</span>
                            <span style="color:{{ $statusColor }};">{{ $statusLabel }} · {{ $progress }}%</span>
                        </div>
                        <div class="progress-bar-wrap">
                            <div class="progress-bar-fill" data-progress="{{ $progress }}"></div>
                        </div>
                    </div>
                    <div class="proker-date-range">
                        <i class="bi bi-calendar-range" style="color:var(--c-red);"></i>
                        {{ $p->tanggal_mulai->format('d M Y') }} — {{ $p->tanggal_selesai->format('d M Y') }}
                    </div>
                    @endif

                    <a href="{{ route('konten.detail', $p->slug) }}" class="proker-link">
                        Baca selengkapnya <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===== KEGIATAN ===== --}}
@if($kegiatan->count() > 0)
<section class="rich-section">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4" data-aos="fade-up">
            <div>
                <div class="section-label mb-2">Agenda</div>
                <h2 class="section-heading" style="font-size:clamp(1.5rem,3vw,2rem);">Kegiatan Bidang</h2>
            </div>
            <a href="{{ route('konten', ['bidang_id' => $bidang->id, 'jenis' => 'kegiatan']) }}" class="btn-outline-imm" style="font-size:0.85rem;padding:0.5rem 1.2rem;">
                Semua <i class="bi bi-arrow-right"></i>
            </a>
        </div>
        <div class="row g-4">
            @foreach($kegiatan as $index => $k)
            <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">
                <a href="{{ route('konten.detail', $k->slug) }}" class="kegiatan-card">
                    <div class="kegiatan-card-top">
                        @if($k->tanggal_mulai)
                        <div class="kegiatan-date-badge">
                            <div class="kd-day">{{ $k->tanggal_mulai->format('d') }}</div>
                            <div class="kd-month">{{ $k->tanggal_mulai->format('M Y') }}</div>
                        </div>
                        @endif
                        <div>
                            <span style="font-size:0.68rem;font-weight:700;color:var(--c-gold);letter-spacing:1.5px;text-transform:uppercase;">Kegiatan</span>
                        </div>
                    </div>
                    <div class="kegiatan-card-body">
                        <div class="kegiatan-card-title">{{ $k->judul }}</div>
                        @if($k->lokasi)
                        <div style="font-size:0.8rem;color:var(--c-muted);display:flex;align-items:center;gap:4px;">
                            <i class="bi bi-geo-alt-fill" style="color:var(--c-red);"></i>
                            {{ $k->lokasi }}
                        </div>
                        @endif
                        <div style="font-size:0.82rem;color:var(--c-muted);margin-top:0.5rem;">
                            {{ Str::limit($k->ringkasan, 80) }}
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ===== BERITA TERKAIT ===== --}}
<section class="rich-section @if($kegiatan->count() > 0) rich-section-alt @endif">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4" data-aos="fade-up">
            <div>
                <div class="section-label mb-2">Informasi</div>
                <h2 class="section-heading" style="font-size:clamp(1.5rem,3vw,2rem);">Berita Terkait</h2>
            </div>
        </div>

        @if($berita->count() > 0)
        <div class="d-flex flex-column gap-3">
            @foreach($berita as $index => $b)
            <a href="{{ route('konten.detail', $b->slug) }}" class="berita-list-item" data-aos="fade-up" data-aos-delay="{{ $index * 60 }}">
                @if($b->thumbnail)
                    <img src="{{ asset('storage/'.$b->thumbnail) }}" class="berita-list-img" alt="{{ $b->judul }}">
                @else
                    <div class="berita-list-img-placeholder">
                        <i class="bi bi-newspaper" style="font-size:1.5rem;color:rgba(255,255,255,0.3);"></i>
                    </div>
                @endif
                <div class="berita-list-body">
                    <div class="berita-list-title">{{ $b->judul }}</div>
                    <div class="berita-list-meta d-flex gap-3 flex-wrap">
                        <span><i class="bi bi-clock me-1"></i>{{ $b->created_at->diffForHumans() }}</span>
                        <span><i class="bi bi-eye me-1"></i>{{ number_format($b->views) }} views</span>
                    </div>
                </div>
                <div style="display:flex;align-items:center;padding:0 1.25rem;color:var(--c-muted);">
                    <i class="bi bi-chevron-right"></i>
                </div>
            </a>
            @endforeach
        </div>

        {{-- Pagination --}}
        @if($berita->hasPages())
        <div class="d-flex justify-content-center mt-5">
            {{ $berita->links('pagination::bootstrap-5') }}
        </div>
        @endif

        @else
        <div class="empty-state">
            <i class="bi bi-newspaper"></i>
            Belum ada berita dari bidang ini.
        </div>
        @endif
    </div>
</section>

{{-- ===== EXPLORE BIDANG LAIN ===== --}}
<section class="rich-section" style="background: linear-gradient(135deg, var(--c-dark) 0%, #3D0000 100%); padding: 3rem 0;">
    <div class="container text-center" data-aos="fade-up">
        <p style="color:rgba(255,255,255,0.5);font-size:0.8rem;letter-spacing:2px;text-transform:uppercase;margin-bottom:1rem;">Jelajahi Lebih</p>
        <h3 style="font-family:var(--font-display);color:white;font-weight:700;margin-bottom:1.5rem;">Bidang Lainnya</h3>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('bidang') }}" class="btn-primary-imm" style="background:linear-gradient(135deg,var(--c-gold),#E65100);color:#1A0A0A;">
                <i class="bi bi-diagram-3"></i> Semua Bidang
            </a>
            <a href="{{ route('home') }}" class="btn-outline-imm" style="border-color:rgba(255,255,255,0.3);color:white;">
                <i class="bi bi-house"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
/* Animate progress bars saat masuk viewport */
const progressObserver = new IntersectionObserver((entries) => {
    entries.forEach(e => {
        if (e.isIntersecting) {
            const bar = e.target;
            bar.style.width = bar.dataset.progress + '%';
            progressObserver.unobserve(bar);
        }
    });
}, { threshold: 0.3 });

document.querySelectorAll('.progress-bar-fill[data-progress]').forEach(el => {
    progressObserver.observe(el);
});
</script>
@endpush
