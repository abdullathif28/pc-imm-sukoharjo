@extends('layouts.public')
@section('title', 'Bidang')

@section('content')
<div class="page-header" style="min-height:200px;display:flex;align-items:center;">
    <div class="container text-white">
        <div data-aos="fade-right">
            <h1 class="fw-bold mb-2" style="font-weight:800; font-size: 2.5rem;">Bidang PC IMM Sukoharjo</h1>
            <p style="opacity:0.9; font-size: 1.1rem;">Struktur organisasi dan bidang kerja PC IMM Sukoharjo.</p>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row g-4">
        @foreach($bidangs as $index => $bidang)
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">
                <a href="{{ route('bidang.detail', $bidang) }}" class="text-decoration-none">
                    <div class="card card-custom h-100 p-2">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start gap-4 mb-3">
                                <div class="bidang-icon flex-shrink-0 shadow-sm" style="background: rgba(251, 192, 45, 0.15); color: var(--imm-yellow); width: 60px; height: 60px; border-radius: 15px; display: flex; align-items: center; justify-content: center;">
                                    <span style="font-size:1.8rem;">
                                        @php
                                            $icons = ['🏛️','🔬','🕌','🤝','⚖️','📢'];
                                            echo $icons[$loop->index % count($icons)];
                                        @endphp
                                    </span>
                                </div>
                                <div>
                                    <span class="badge mb-1 px-2 py-1" style="background: rgba(198, 40, 40, 0.1); color: var(--imm-red); font-weight:700; font-size: 0.75rem;">{{ $bidang->singkatan }}</span>
                                    <h4 class="fw-bold mb-1" style="color: var(--imm-dark); font-size: 1.2rem;">{{ $bidang->nama }}</h4>
                                    <span class="badge bg-light text-muted fw-normal" style="font-size: 0.75rem;"><i class="bi bi-file-text me-1"></i>{{ $bidang->kontens_count }} konten</span>
                                </div>
                            </div>
                            <p class="text-muted mb-4" style="line-height:1.7;">{{ $bidang->deskripsi }}</p>
                            <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                                <small class="text-muted">Profil Bidang</small>
                                <span class="fw-bold small text-imm-primary">Lihat Selengkapnya <i class="bi bi-arrow-right ms-1"></i></span>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
