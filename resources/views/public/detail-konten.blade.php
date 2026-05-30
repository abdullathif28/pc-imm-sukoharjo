@extends('layouts.public')
@section('title', $konten->judul)

@section('content')
<div class="container py-5">
    <div class="row g-4">
        <div class="col-lg-8">
            {{-- Breadcrumb --}}
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb small">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Beranda</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('konten') }}" class="text-decoration-none">Konten</a></li>
                    <li class="breadcrumb-item active text-truncate" style="max-width:200px;">{{ $konten->judul }}</li>
                </ol>
            </nav>

            {{-- Header --}}
            <div class="mb-4">
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <span class="badge {{ $konten->jenis == 'berita' ? 'badge-berita' : ($konten->jenis == 'kegiatan' ? 'badge-kegiatan' : 'badge-proker') }} px-3 py-2 shadow-sm">
                        {{ $konten->jenis_label }}
                    </span>
                    <span class="badge px-3 py-2" style="background: rgba(198, 40, 40, 0.1); color: var(--imm-red); font-weight: 700;">
                        {{ $konten->bidang->nama }}
                    </span>
                    @if($konten->is_featured)
                        <span class="badge px-3 py-2" style="background: rgba(251, 192, 45, 0.15); color: var(--imm-yellow); font-weight: 700;">
                            <i class="bi bi-star-fill me-1"></i>Featured
                        </span>
                    @endif
                </div>
                <h1 class="fw-bold mb-3" style="font-size:2.2rem; color: var(--imm-red-dark); line-height:1.2;">{{ $konten->judul }}</h1>
                <div class="d-flex flex-wrap gap-3 text-muted small mb-4">
                    <span><i class="bi bi-person me-1"></i>{{ $konten->user->name }}</span>
                    <span><i class="bi bi-calendar me-1"></i>{{ $konten->created_at->translatedFormat('d F Y') }}</span>
                    <span><i class="bi bi-eye me-1"></i>{{ $konten->views }} views</span>
                    @if($konten->lokasi)
                        <span><i class="bi bi-geo-alt me-1"></i>{{ $konten->lokasi }}</span>
                    @endif
                    @if($konten->tanggal_mulai)
                        <span><i class="bi bi-calendar-event me-1"></i>
                            {{ $konten->tanggal_mulai->format('d M Y') }}
                            @if($konten->tanggal_selesai && $konten->tanggal_selesai != $konten->tanggal_mulai)
                                — {{ $konten->tanggal_selesai->format('d M Y') }}
                            @endif
                        </span>
                    @endif
                </div>
            </div>

            {{-- Thumbnail --}}
            @if($konten->thumbnail)
                <img src="{{ asset('storage/'.$konten->thumbnail) }}" class="img-fluid rounded-xl mb-4 w-100" style="max-height:450px;object-fit:cover;" alt="{{ $konten->judul }}">
            @endif

            {{-- Ringkasan --}}
            @if($konten->ringkasan)
                <div class="p-4 rounded-xl mb-4" style="background: rgba(251, 192, 45, 0.05); border-left: 5px solid var(--imm-yellow);">
                    <p class="mb-0 fw-bold" style="color: var(--imm-dark); font-style: italic; font-size: 1.1rem; line-height: 1.6;">{{ $konten->ringkasan }}</p>
                </div>
            @endif

            {{-- Isi --}}
            <div class="konten-body" style="font-size:1.05rem;line-height:1.85;color:#374151;">
                {!! $konten->isi !!}
            </div>

            {{-- Media Gallery --}}
            @if($konten->medias->count() > 0)
                <div class="mt-5">
                    <h4 class="fw-700 mb-3" style="font-weight:700;color:#1B2E4B;">
                        <i class="bi bi-images me-2"></i>Galeri Media
                    </h4>
                    <div class="row g-3">
                        @foreach($konten->medias as $media)
                            <div class="col-md-4 col-6">
                                @if($media->isVideo())
                                    <video class="img-fluid rounded-xl w-100" style="height:180px;object-fit:cover;" controls>
                                        <source src="{{ asset('storage/'.$media->file_path) }}" type="{{ $media->mime_type }}">
                                    </video>
                                @else
                                    <a href="{{ asset('storage/'.$media->file_path) }}" target="_blank">
                                        <img src="{{ asset('storage/'.$media->file_path) }}" class="img-fluid rounded-xl w-100" style="height:180px;object-fit:cover;" alt="{{ $media->file_name }}">
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Share --}}
            <div class="mt-4 pt-4 border-top">
                <p class="small text-muted mb-2">Bagikan konten ini:</p>
                <div class="d-flex gap-2">
                    <a href="https://wa.me/?text={{ urlencode($konten->judul . ' - ' . request()->url()) }}" target="_blank" class="btn btn-sm" style="background:#25D366;color:white;border-radius:8px;">
                        <i class="bi bi-whatsapp me-1"></i>WhatsApp
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="btn btn-sm" style="background:#1877F2;color:white;border-radius:8px;">
                        <i class="bi bi-facebook me-1"></i>Facebook
                    </a>
                    <button onclick="navigator.clipboard.writeText('{{ request()->url() }}');alert('Link disalin!')" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-link me-1"></i>Salin Link
                    </button>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="col-lg-4">
            {{-- Info Bidang --}}
            <div class="card card-custom mb-4" style="border-top: 5px solid var(--imm-red);">
                <div class="card-body p-4">
                    <h6 class="fw-bold mb-4" style="color: var(--imm-dark); text-transform: uppercase; letter-spacing: 1px;">Tentang Bidang</h6>
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <div class="shadow-sm" style="width:56px; height:56px; border-radius:14px; background: rgba(251, 192, 45, 0.15); color: var(--imm-yellow); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                            <span style="font-size:1.5rem; font-weight:800;">
                                @php
                                    $icons = ['🏛️','🔬','🕌','🤝','⚖️','📢'];
                                    // Use simple logic to pick an icon for now
                                    echo $icons[0]; 
                                @endphp
                            </span>
                        </div>
                        <div>
                            <div class="fw-bold" style="color: var(--imm-red); font-size: 1.05rem;">{{ $konten->bidang->nama }}</div>
                            <div class="text-muted small fw-bold">{{ $konten->bidang->singkatan }}</div>
                        </div>
                    </div>
                    <p class="text-muted small mb-4" style="line-height: 1.6;">{{ Str::limit($konten->bidang->deskripsi, 150) }}</p>
                    <a href="{{ route('bidang.detail', $konten->bidang) }}" class="btn btn-imm-yellow w-100 py-2">
                        <i class="bi bi-grid-fill me-2"></i>Semua Konten Bidang
                    </a>
                </div>
            </div>

            {{-- Related --}}
            @if($related->count() > 0)
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0 fw-700" style="font-weight:700;">{{ $konten->jenis_label }} Lainnya</h6>
                    </div>
                    <div class="card-body p-0">
                        @foreach($related as $r)
                            <a href="{{ route('konten.detail', $r->slug) }}" class="d-flex gap-3 p-3 border-bottom text-decoration-none" style="transition:background 0.2s;" onmouseover="this.style.background='#f8f9fa'" onmouseout="this.style.background=''">
                                <div class="flex-shrink-0" style="width:64px;height:64px;border-radius:10px;overflow:hidden;background:#f0f2f5;">
                                    @if($r->thumbnail)
                                        <img src="{{ asset('storage/'.$r->thumbnail) }}" style="width:100%;height:100%;object-fit:cover;" alt="">
                                    @else
                                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;background:{{ $r->bidang->warna }}20;">
                                            <i class="bi bi-file-text" style="color:{{ $r->bidang->warna }};font-size:1.3rem;"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-grow-1 overflow-hidden">
                                    <div class="fw-600 small line-clamp-2" style="font-weight:600;color:#1B2E4B;">{{ $r->judul }}</div>
                                    <div class="text-muted" style="font-size:0.75rem;">{{ $r->created_at->diffForHumans() }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
.konten-body { font-family: 'Inter', sans-serif; }
.konten-body h1, .konten-body h2, .konten-body h3 { color: var(--imm-red-dark); font-weight: 800; margin-top: 2rem; margin-bottom: 1rem; }
.konten-body p { margin-bottom: 1.5rem; font-size: 1.1rem; }
.konten-body img { border-radius: 16px; max-width: 100%; height: auto; margin: 1.5rem 0; box-shadow: 0 5px 20px rgba(0,0,0,0.1); }
.konten-body ul, .konten-body ol { padding-left: 1.5rem; margin-bottom: 1.5rem; }
.konten-body li { margin-bottom: 0.8rem; font-size: 1.1rem; }
.konten-body blockquote { border-left: 5px solid var(--imm-yellow); padding: 1rem 1.5rem; background: #fdfdfd; border-radius: 0 12px 12px 0; font-style: italic; color: #555; margin: 2rem 0; }
</style>
@endsection
