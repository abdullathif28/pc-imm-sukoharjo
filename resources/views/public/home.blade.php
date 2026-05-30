@extends('layouts.public')
@section('title', 'Beranda')

@section('content')

{{-- CSS Custom untuk Tema Merah-Putih-Kuning --}}
<style>
    :root {
        --imm-red: #C62828;      /* Merah elegan */
        --imm-red-dark: #8E0000; /* Merah gelap untuk gradien */
        --imm-yellow: #FBC02D;   /* Kuning emas untuk aksen */
        --imm-white: #FFFFFF;
        --imm-light: #F8F9FA;
        --imm-dark: #212529;
    }

    /* Hero Section */
    .hero-section {
        background: linear-gradient(135deg, var(--imm-red-dark) 0%, var(--imm-red) 100%);
        padding: 5rem 0;
        position: relative;
        overflow: hidden;
    }
    
    /* Aksen pola background opsional di Hero */
    .hero-section::before {
        content: '';
        position: absolute;
        top: -50px;
        right: -50px;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(251, 192, 45, 0.1) 0%, rgba(255,255,255,0) 70%);
    }

    .hero-badge {
        background-color: rgba(255, 255, 255, 0.15);
        border: 1px solid rgba(251, 192, 45, 0.5); /* Aksen kuning */
        color: var(--imm-yellow);
        font-weight: 500;
        letter-spacing: 0.5px;
    }

    .hero-title span {
        color: var(--imm-yellow);
        font-weight: 800;
    }

    .btn-hero-primary {
        background-color: var(--imm-yellow);
        color: var(--imm-red-dark);
        font-weight: 700;
        border-radius: 50px;
        padding: 0.6rem 1.5rem;
        transition: all 0.3s ease;
        border: 2px solid var(--imm-yellow);
    }

    .btn-hero-primary:hover {
        background-color: transparent;
        color: var(--imm-yellow);
        transform: translateY(-2px);
    }

    .btn-hero-outline {
        background-color: transparent;
        color: var(--imm-white);
        font-weight: 600;
        border-radius: 50px;
        padding: 0.6rem 1.5rem;
        border: 2px solid rgba(255, 255, 255, 0.5);
        transition: all 0.3s ease;
    }

    .btn-hero-outline:hover {
        background-color: var(--imm-white);
        color: var(--imm-red);
        border-color: var(--imm-white);
    }

    .hero-stat-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 12px;
        text-align: center;
        transition: transform 0.3s ease;
        border-bottom: 3px solid transparent;
    }

    .hero-stat-card:hover {
        transform: translateY(-5px);
        border-bottom: 3px solid var(--imm-yellow);
    }

    .hero-stat-number {
        font-size: 2rem;
        font-weight: 800;
        color: var(--imm-white);
        line-height: 1.2;
    }

    /* Section Titles & Dividers */
    .section-title {
        color: var(--imm-dark);
        font-weight: 800;
    }
    
    .section-divider {
        width: 60px;
        height: 4px;
        background-color: var(--imm-red);
        border-radius: 2px;
        position: relative;
    }

    .section-divider::after {
        content: '';
        position: absolute;
        right: -12px;
        top: -1px;
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background-color: var(--imm-yellow);
    }

    /* Cards Umum */
    .card-custom {
        border: none;
        border-radius: 16px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        overflow: hidden;
        background: var(--imm-white);
    }

    .card-custom:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(198, 40, 40, 0.1);
    }

    /* Berita Badges & Gradients */
    .badge-berita {
        background-color: var(--imm-red);
        color: white;
        font-weight: 600;
        border-radius: 4px;
    }

    .card-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        z-index: 2;
    }

    .img-placeholder {
        background: linear-gradient(135deg, var(--imm-red), var(--imm-red-dark));
        height: 200px;
    }

    /* Bidang Cards */
    .bidang-card {
        border-radius: 16px;
        border: 1px solid rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .bidang-card:hover {
        border-color: var(--imm-red);
    }

    .bidang-icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
    }

    /* Utilities */
    .text-imm-primary { color: var(--imm-red); }
    .text-imm-accent { color: var(--imm-yellow); }
    .bg-imm-light { background-color: var(--imm-light); }
    
    .btn-outline-imm {
        color: var(--imm-red);
        border: 2px solid var(--imm-red);
        border-radius: 50px;
        font-weight: 600;
        transition: all 0.3s;
    }
    
    .btn-outline-imm:hover {
        background-color: var(--imm-red);
        color: white;
    }

    .date-box {
        background: rgba(198, 40, 40, 0.08);
        border-left: 3px solid var(--imm-red);
    }
</style>

{{-- Hero Section --}}
<section class="hero-section">
    <div class="container position-relative">
        <div class="row align-items-center g-5">
            <div class="col-lg-7" data-aos="fade-right">
                <span class="badge hero-badge px-3 py-2 mb-3">
                    <i class="bi bi-stars me-1"></i> Pimpinan Cabang IMM Sukoharjo
                </span>
                <h1 class="hero-title text-white mb-4">
                    Bersama Membangun<br>
                    <span>Umat & Bangsa</span><br>
                    yang Berkemajuan
                </h1>
                <p class="text-white mb-4" style="opacity:0.9; font-size:1.05rem; line-height:1.8; max-width:520px;">
                    Ikatan Mahasiswa Muhammadiyah Sukoharjo — wadah mahasiswa Muslim yang bergerak dalam pengembangan intelektual, spiritual, dan sosial untuk kemajuan masyarakat.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('konten') }}" class="btn btn-hero-primary">
                        <i class="bi bi-newspaper me-2"></i>Lihat Konten
                    </a>
                    <a href="{{ route('bidang') }}" class="btn btn-hero-outline">
                        <i class="bi bi-diagram-3 me-2"></i>Bidang Kami
                    </a>
                </div>
            </div>
            <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="hero-stat-card p-3">
                            <div class="hero-stat-number">{{ $stats['total_bidang'] }}</div>
                            <div class="text-white-50 small">Bidang Aktif</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="hero-stat-card p-3">
                            <div class="hero-stat-number">{{ $stats['total_konten'] }}</div>
                            <div class="text-white-50 small">Total Konten</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="hero-stat-card p-3">
                            <div class="hero-stat-number">{{ $stats['total_berita'] }}</div>
                            <div class="text-white-50 small">Berita</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="hero-stat-card p-3">
                            <div class="hero-stat-number">{{ $stats['total_kegiatan'] }}</div>
                            <div class="text-white-50 small">Kegiatan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Berita Terbaru --}}
<section class="py-5 bg-imm-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div data-aos="fade-right">
                <p class="text-imm-primary fw-bold mb-1 small"><i class="bi bi-newspaper me-1"></i> TERBARU</p>
                <h2 class="section-title mb-2">Berita Terkini</h2>
                <div class="section-divider"></div>
            </div>
            <a href="{{ route('konten', ['jenis' => 'berita']) }}" class="btn btn-outline-imm btn-sm px-3" data-aos="fade-left">
                Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
        <div class="row g-4">
            @forelse($beritaTerbaru as $index => $berita)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <a href="{{ route('konten.detail', $berita->slug) }}" class="text-decoration-none">
                        <div class="card card-custom h-100">
                            <div class="position-relative">
                                @if($berita->thumbnail)
                                    <img src="{{ asset('storage/'.$berita->thumbnail) }}" class="card-img-top" alt="{{ $berita->judul }}" style="height: 200px; object-fit: cover;">
                                @else
                                    <div class="card-img-top img-placeholder d-flex align-items-center justify-content-center">
                                        <i class="bi bi-newspaper text-white" style="font-size:3rem; opacity:0.4;"></i>
                                    </div>
                                @endif
                                <div class="card-badge">
                                    <span class="badge badge-berita px-3 py-2 shadow-sm">Berita</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center gap-2 mb-3">
                                    <span class="badge px-2 py-1" style="background: rgba(198, 40, 40, 0.1); color: var(--imm-red); font-size:0.75rem;">
                                        {{ $berita->bidang->singkatan ?? $berita->bidang->nama }}
                                    </span>
                                    <small class="text-muted"><i class="bi bi-clock me-1"></i>{{ $berita->created_at->diffForHumans() }}</small>
                                </div>
                                <h5 class="card-title fw-bold line-clamp-2" style="color: var(--imm-dark); font-size:1.1rem;">{{ $berita->judul }}</h5>
                                <p class="card-text text-muted small line-clamp-3 mt-2">{{ $berita->ringkasan ?: Str::limit(strip_tags($berita->isi), 120) }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-0 pt-0 px-3 pb-3">
                                <span class="small fw-bold text-imm-primary">Baca selengkapnya <i class="bi bi-arrow-right ms-1"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <i class="bi bi-newspaper" style="font-size:3rem; color: var(--imm-red);"></i>
                    <p class="mt-3">Belum ada berita yang dipublikasikan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- Bidang --}}
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <p class="text-imm-primary fw-bold mb-1 small"><i class="bi bi-diagram-3 me-1"></i> ORGANISASI</p>
            <h2 class="section-title mb-2">Bidang PC IMM Sukoharjo</h2>
            <div class="section-divider mx-auto"></div>
            <p class="text-muted mt-3" style="max-width:550px; margin:auto;">Setiap bidang memiliki fokus dan program kerja yang saling mendukung untuk kemajuan bersama.</p>
        </div>
        <div class="row g-4">
            @foreach($bidangs as $index => $bidang)
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">
                    <a href="{{ route('bidang.detail', $bidang) }}" class="bidang-card d-block p-4 bg-white shadow-sm text-decoration-none">
                        <div class="d-flex align-items-start gap-3 mb-3">
                            <div class="bidang-icon flex-shrink-0" style="background: rgba(251, 192, 45, 0.15); color: var(--imm-yellow);">
                                <span style="font-size:1.5rem;">
                                    @php
                                        $icons = ['🏛️','🔬','🕌','🤝','⚖️','📢'];
                                        echo $icons[$loop->index % count($icons)];
                                    @endphp
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <span class="badge px-2 py-1 mb-1" style="background: rgba(198, 40, 40, 0.1); color: var(--imm-red); font-size:0.7rem; font-weight:700;">
                                    {{ $bidang->singkatan }}
                                </span>
                                <h5 class="fw-bold mb-0" style="color: var(--imm-dark); font-size:1rem; line-height:1.3;">{{ $bidang->nama }}</h5>
                            </div>
                        </div>
                        <p class="text-muted small mb-3 line-clamp-2">{{ $bidang->deskripsi }}</p>
                        <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                            <span class="small text-muted"><i class="bi bi-file-text me-1"></i>{{ $bidang->kontens_count }} konten</span>
                            <span class="small fw-bold text-imm-primary">Selengkapnya <i class="bi bi-arrow-right"></i></span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Kegiatan --}}
<section class="py-5 bg-imm-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div data-aos="fade-right">
                <p class="text-imm-primary fw-bold mb-1 small"><i class="bi bi-calendar-event me-1"></i> AGENDA</p>
                <h2 class="section-title mb-2">Kegiatan Mendatang</h2>
                <div class="section-divider"></div>
            </div>
            <a href="{{ route('konten', ['jenis' => 'kegiatan']) }}" class="btn btn-outline-imm btn-sm px-3" data-aos="fade-left">
                Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
            </a>
        </div>
        <div class="row g-4">
            @forelse($kegiatanTerbaru as $index => $kegiatan)
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    <a href="{{ route('konten.detail', $kegiatan->slug) }}" class="text-decoration-none">
                        <div class="card card-custom h-100">
                            <div class="card-body">
                                <div class="d-flex gap-3 mb-3">
                                    <div class="date-box flex-shrink-0 text-center p-2 rounded-3" style="min-width:65px;">
                                        <div class="fw-bold text-imm-primary" style="font-size:1.5rem; line-height: 1;">
                                            {{ $kegiatan->tanggal_mulai ? $kegiatan->tanggal_mulai->format('d') : '—' }}
                                        </div>
                                        <div class="small fw-bold mt-1" style="color: var(--imm-dark);">
                                            {{ $kegiatan->tanggal_mulai ? $kegiatan->tanggal_mulai->format('M') : '' }}
                                        </div>
                                    </div>
                                    <div>
                                        <span class="badge bg-warning text-dark px-2 py-1 mb-2 shadow-sm" style="font-size: 0.7rem;">Kegiatan</span>
                                        <h5 class="card-title fw-bold mb-1 line-clamp-2" style="color: var(--imm-dark); font-size:1rem;">{{ $kegiatan->judul }}</h5>
                                        @if($kegiatan->lokasi)
                                            <small class="text-muted"><i class="bi bi-geo-alt-fill text-imm-red me-1"></i>{{ $kegiatan->lokasi }}</small>
                                        @endif
                                    </div>
                                </div>
                                <p class="text-muted small line-clamp-2 mt-2">{{ $kegiatan->ringkasan ?: Str::limit(strip_tags($kegiatan->isi), 100) }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    <i class="bi bi-calendar-x" style="font-size:3rem; color: var(--imm-red);"></i>
                    <p class="mt-3">Belum ada kegiatan mendatang yang dijadwalkan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, var(--imm-red-dark), var(--imm-red));">
    {{-- Decorative overlay for CTA --}}
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url('data:image/svg+xml;utf8,<svg width=\'20\' height=\'20\' viewBox=\'0 0 20 20\' xmlns=\'http://www.w3.org/2000/svg\'><circle cx=\'2\' cy=\'2\' r=\'2\' fill=\'%23ffffff\' fill-opacity=\'0.05\'/></svg>'); z-index: 1;"></div>
    
    <div class="container text-center position-relative" style="z-index: 2;" data-aos="fade-up">
        <h2 class="text-white fw-bold mb-3" style="font-size:2.2rem;">Ikut Bergerak Bersama IMM</h2>
        <p class="mb-4" style="color:rgba(255,255,255,0.85); max-width:550px; margin:auto; font-size: 1.1rem;">
            Bergabunglah dengan gerakan mahasiswa Muslim yang berkomitmen untuk kemajuan umat dan bangsa.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">
            <a href="{{ route('konten') }}" class="btn px-4 py-3" style="background: var(--imm-yellow); color: var(--imm-red-dark); font-weight:700; border-radius:50px; box-shadow: 0 4px 15px rgba(251, 192, 45, 0.4); transition: transform 0.3s;">
                <i class="bi bi-newspaper me-2"></i>Baca Konten Kami
            </a>
            <a href="{{ route('bidang') }}" class="btn px-4 py-3" style="border:2px solid rgba(255,255,255,0.8); color:white; font-weight:600; border-radius:50px; transition: all 0.3s;">
                <i class="bi bi-people me-2"></i>Kenali Bidang
            </a>
        </div>
    </div>
</section>
@endsection