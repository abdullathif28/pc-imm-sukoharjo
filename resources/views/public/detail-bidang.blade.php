@extends('layouts.public')
@section('title', $bidang->nama)

@section('content')
<div class="page-header" style="min-height:220px;display:flex;align-items:center;">
    <div class="container text-white">
        <div class="d-flex align-items-center gap-4" data-aos="fade-right">
            <div class="shadow-sm" style="width:80px;height:80px;border-radius:20px;background:var(--imm-yellow);display:flex;align-items:center;justify-content:center;font-size:1.8rem;font-weight:900;color:var(--imm-red-dark);">
                @php
                    $icons = ['🏛️','🔬','🕌','🤝','⚖️','📢'];
                    echo $icons[0]; // Simplified for now
                @endphp
            </div>
            <div>
                <div class="badge mb-1 px-3 py-1 shadow-sm" style="background:rgba(255,255,255,0.2); font-weight: 700; letter-spacing: 1px;">{{ $bidang->singkatan }}</div>
                <h1 class="fw-bold mb-1" style="font-weight:800; font-size: 2.2rem;">{{ $bidang->nama }}</h1>
                <p style="opacity:0.9;" class="mb-0 fs-5">{{ $bidang->deskripsi }}</p>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    {{-- Kegiatan --}}
    @if($kegiatan->count() > 0)
    <section class="mb-5" data-aos="fade-up">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h3 class="section-title mb-2" style="font-size: 1.5rem;">Kegiatan Bidang</h3>
                <div class="section-divider"></div>
            </div>
            <a href="{{ route('konten', ['bidang_id' => $bidang->id, 'jenis' => 'kegiatan']) }}" class="btn btn-outline-imm btn-sm px-3">Lihat Semua</a>
        </div>
        <div class="row g-3">
            @foreach($kegiatan as $k)
                <div class="col-md-4">
                    <a href="{{ route('konten.detail', $k->slug) }}" class="text-decoration-none">
                        <div class="card card-custom h-100">
                            <div class="card-body p-4">
                                <span class="badge badge-kegiatan mb-3 px-2 py-1">Kegiatan</span>
                                <h6 class="fw-bold line-clamp-2 mb-2" style="color: var(--imm-dark); font-size: 1rem;">{{ $k->judul }}</h6>
                                <p class="text-muted small line-clamp-2 mb-3">{{ $k->ringkasan }}</p>
                                @if($k->tanggal_mulai)
                                    <small class="text-muted"><i class="bi bi-calendar-event me-1 text-imm-red"></i>{{ $k->tanggal_mulai->format('d M Y') }}</small>
                                @endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Program Kerja --}}
    @if($proker->count() > 0)
    <section class="mb-5" data-aos="fade-up">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <div>
                <h3 class="section-title mb-2" style="font-size: 1.5rem;">Program Kerja</h3>
                <div class="section-divider"></div>
            </div>
            <a href="{{ route('konten', ['bidang_id' => $bidang->id, 'jenis' => 'program_kerja']) }}" class="btn btn-outline-imm btn-sm px-3">Lihat Semua</a>
        </div>
        <div class="row g-3">
            @foreach($proker as $p)
                <div class="col-md-4">
                    <a href="{{ route('konten.detail', $p->slug) }}" class="text-decoration-none">
                        <div class="card card-custom h-100" style="border-left: 5px solid var(--imm-yellow);">
                            <div class="card-body p-4">
                                <span class="badge bg-warning text-dark mb-3 px-2 py-1 shadow-sm" style="font-size: 0.7rem;">Program Kerja</span>
                                <h6 class="fw-bold line-clamp-2 mb-2" style="color: var(--imm-dark); font-size: 1rem;">{{ $p->judul }}</h6>
                                <p class="text-muted small line-clamp-2">{{ $p->ringkasan }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Berita --}}
    <section data-aos="fade-up">
        <div class="mb-4">
            <h3 class="section-title mb-2" style="font-size: 1.5rem;">Berita Terkait</h3>
            <div class="section-divider"></div>
        </div>
        @if($berita->count() > 0)
            <div class="row g-4">
                @foreach($berita as $b)
                    <div class="col-md-6 col-lg-4">
                        <a href="{{ route('konten.detail', $b->slug) }}" class="text-decoration-none">
                            <div class="card card-custom h-100">
                                <div class="position-relative">
                                    @if($b->thumbnail)
                                        <img src="{{ asset('storage/'.$b->thumbnail) }}" class="card-img-top" alt="{{ $b->judul }}" style="height: 180px; object-fit: cover;">
                                    @else
                                        <div class="card-img-top img-placeholder d-flex align-items-center justify-content-center" style="height: 180px;">
                                            <i class="bi bi-newspaper text-white" style="font-size:2.5rem; opacity:0.4;"></i>
                                        </div>
                                    @endif
                                    <div class="card-badge">
                                        <span class="badge badge-berita px-3 py-2 shadow-sm">Berita</span>
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    <h6 class="fw-bold line-clamp-2 mb-3" style="color: var(--imm-dark); font-size: 1rem; line-height: 1.4;">{{ $b->judul }}</h6>
                                    <p class="text-muted small line-clamp-2 mb-3">{{ $b->ringkasan }}</p>
                                    <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                        <small class="text-muted"><i class="bi bi-clock me-1"></i>{{ $b->created_at->diffForHumans() }}</small>
                                        <span class="text-imm-primary fw-bold small">Baca <i class="bi bi-arrow-right ms-1"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="mt-4">{{ $berita->links('pagination::bootstrap-5') }}</div>
        @else
            <div class="text-center text-muted py-4">
                <i class="bi bi-newspaper" style="font-size:3rem;"></i>
                <p class="mt-2">Belum ada berita dari bidang ini.</p>
            </div>
        @endif
    </section>
</div>
@endsection
