@extends('layouts.public')
@section('title', 'Komisariat PC IMM Sukoharjo')
@section('og_title', 'Komisariat — Jaringan Kader PC IMM Sukoharjo')
@section('og_description', 'Daftar komisariat di bawah naungan PC IMM Sukoharjo.')

@push('styles')
<style>
.kom-header { background:linear-gradient(150deg,#1A0A0A 0%,var(--c-red) 50%,#7B0000 100%); padding:5rem 0 8rem; position:relative; overflow:hidden; }
.kom-header::before { content:''; position:absolute; inset:0; background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='60' viewBox='0 0 60 60'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M30 0L60 30L30 60L0 30z'/%3E%3C/g%3E%3C/svg%3E"); }
.kom-header::after { content:''; position:absolute; bottom:-2px; left:0; right:0; height:100px; background:var(--c-cream); clip-path:ellipse(60% 100% at 50% 100%); }
[data-theme="dark"] .kom-header::after { background:var(--c-cream); }
.kom-header-content { position:relative; z-index:2; }
.kom-header-title { font-family:var(--font-display); font-size:clamp(2.5rem,6vw,4rem); font-weight:900; color:white; line-height:1.05; margin-bottom:1rem; }
.kom-header-title .gold { color:var(--c-gold); }
.kom-section { padding:5rem 0; }
.kom-card { background:var(--c-surface); border:1px solid var(--c-border); border-radius:24px; overflow:hidden; transition:all .35s cubic-bezier(.4,0,.2,1); height:100%; text-decoration:none; color:var(--c-text); display:block; position:relative; }
.kom-card:hover { transform:translateY(-8px); box-shadow:0 24px 48px rgba(183,28,28,.12); border-color:rgba(183,28,28,.25); color:var(--c-text); }
.kom-card-banner { height:90px; position:relative; display:flex; align-items:flex-end; padding:0 1.5rem 0; overflow:hidden; }
.kom-card-banner::after { content:''; position:absolute; inset:0; background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 40 40'%3E%3Cg fill='%23ffffff' fill-opacity='0.07'%3E%3Cpath d='M20 0L40 20L20 40L0 20z'/%3E%3C/g%3E%3C/svg%3E"); }
.kom-avatar { width:56px; height:56px; border-radius:14px; border:3px solid var(--c-surface); background:var(--c-surface); display:flex; align-items:center; justify-content:center; font-size:1.5rem; transform:translateY(50%); position:relative; z-index:2; flex-shrink:0; box-shadow:var(--shadow-sm); }
.kom-avatar img { width:100%; height:100%; object-fit:cover; border-radius:11px; }
.kom-card-body { padding:2rem 1.5rem 1.5rem; }
.kom-status { display:inline-flex; align-items:center; gap:4px; font-size:.68rem; font-weight:700; padding:3px 10px; border-radius:99px; margin-bottom:.75rem; }
.kom-status.aktif { background:rgba(46,125,50,.1); color:#2E7D32; }
.kom-status.aktif::before { content:''; width:6px; height:6px; background:#2E7D32; border-radius:50%; display:inline-block; }
.kom-name { font-family:var(--font-display); font-size:1.05rem; font-weight:800; color:var(--c-text); margin-bottom:.25rem; line-height:1.3; }
.kom-kampus { font-size:.82rem; color:var(--c-muted); font-weight:600; display:flex; align-items:center; gap:5px; margin-bottom:1rem; }
.kom-desc { font-size:.85rem; color:var(--c-muted); line-height:1.6; margin-bottom:1.25rem; display:-webkit-box; -webkit-line-clamp:3; -webkit-box-orient:vertical; overflow:hidden; }
.kom-meta-row { display:flex; gap:1rem; padding-top:1rem; border-top:1px solid var(--c-border); }
.kom-meta-item { display:flex; align-items:center; gap:5px; font-size:.78rem; color:var(--c-muted); font-weight:600; }
.kom-meta-item i { color:var(--c-red); }
.kom-arrow { position:absolute; top:1rem; right:1rem; width:32px; height:32px; background:rgba(183,28,28,.08); border-radius:8px; display:flex; align-items:center; justify-content:center; color:var(--c-red); font-size:.85rem; opacity:0; transform:translate(-4px,4px); transition:all .3s; }
.kom-card:hover .kom-arrow { opacity:1; transform:translate(0,0); }
.filter-tabs { display:flex; gap:.5rem; margin-bottom:2rem; flex-wrap:wrap; }
.filter-tab { background:var(--c-surface); border:1px solid var(--c-border); border-radius:99px; padding:.45rem 1.1rem; font-size:.82rem; font-weight:600; color:var(--c-muted); cursor:pointer; transition:all .2s; }
.filter-tab.active,.filter-tab:hover { background:var(--c-red); border-color:var(--c-red); color:white; }
.step-icon { width:44px; height:44px; min-width:44px; background:linear-gradient(135deg,var(--c-red),var(--c-red-mid)); border-radius:12px; display:flex; align-items:center; justify-content:center; color:white; font-size:1rem; }
@media (max-width:767px) { .kom-header { padding:4rem 0 6rem; } .kom-section { padding:3.5rem 0; } }
</style>
@endpush

@section('content')

{{-- ===== HEADER ===== --}}
<section class="kom-header">
    <div class="container kom-header-content">
        <div class="row" data-aos="fade-right">
            <div class="col-lg-7">
                <div class="section-label mb-2" style="color:rgba(249,168,37,.7);">Jaringan Kader</div>
                <h1 class="kom-header-title">
                    Komisariat<br>
                    <span class="gold">PC IMM Sukoharjo</span>
                </h1>
                <p style="color:rgba(255,255,255,.65);font-size:1rem;line-height:1.7;max-width:480px;margin-bottom:2rem;">
                    Basis kaderisasi yang tersebar di berbagai kampus dan pesantren di wilayah Sukoharjo.
                </p>
                <div class="d-flex gap-4 flex-wrap">
                    <div>
                        <div style="font-family:var(--font-display);font-size:2rem;font-weight:900;color:white;line-height:1;"
                             data-count="{{ $komisariats->count() }}">0</div>
                        <div style="font-size:.72rem;color:rgba(255,255,255,.5);letter-spacing:1px;font-weight:600;text-transform:uppercase;">Komisariat</div>
                    </div>
                    <div>
                        <div style="font-family:var(--font-display);font-size:2rem;font-weight:900;color:white;line-height:1;"
                             data-count="{{ $komisariats->sum('jumlah_kader') }}" data-suffix="+">0</div>
                        <div style="font-size:.72rem;color:rgba(255,255,255,.5);letter-spacing:1px;font-weight:600;text-transform:uppercase;">Total Kader</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== GRID KOMISARIAT ===== --}}
<section class="kom-section">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end mb-4 flex-wrap gap-3" data-aos="fade-up">
            <div>
                <div class="section-label mb-2">Daftar</div>
                <h2 class="section-heading" style="font-size:clamp(1.6rem,3vw,2.2rem);">Semua Komisariat</h2>
            </div>
            <div class="filter-tabs" style="margin-bottom:0;">
                <button class="filter-tab active" data-filter="all">Semua</button>
                @if($komisariats->where('basis','ums')->count() > 0)
                <button class="filter-tab" data-filter="ums">Berbasis UMS</button>
                @endif
                @if($komisariats->where('basis','pesantren')->count() > 0)
                <button class="filter-tab" data-filter="pesantren">Berbasis Pesantren</button>
                @endif
                @if($komisariats->where('basis','lainnya')->count() > 0)
                <button class="filter-tab" data-filter="lainnya">Lainnya</button>
                @endif
            </div>
        </div>

        @if($komisariats->count() > 0)
        <div class="row g-4">
            @foreach($komisariats as $index => $k)
            <div class="col-md-6 col-lg-4 kom-item" data-basis="{{ $k->basis }}" data-aos="fade-up" data-aos-delay="{{ ($index % 3) * 80 }}">
                <div class="kom-card">
                    <div class="kom-card-banner" style="background:{{ $k->warna_gradient ?? 'linear-gradient(135deg,#1565C0,#0D47A1)' }};">
                        <div class="kom-avatar">
                            @if($k->logo)
                                <img src="{{ asset('storage/'.$k->logo) }}" alt="{{ $k->nama }}">
                            @else
                                {{ $k->emoji ?? '🏛️' }}
                            @endif
                        </div>
                    </div>
                    <div class="kom-arrow"><i class="bi bi-arrow-up-right"></i></div>
                    <div class="kom-card-body">
                        <div class="kom-status aktif">Aktif</div>
                        <div class="kom-name">{{ $k->nama }}</div>
                        <div class="kom-kampus">
                            <i class="bi bi-building" style="color:var(--c-red);"></i>
                            {{ $k->kampus }}
                        </div>
                        @if($k->deskripsi)
                        <div class="kom-desc">{{ $k->deskripsi }}</div>
                        @endif
                        <div class="kom-meta-row">
                            <div class="kom-meta-item">
                                <i class="bi bi-people-fill"></i>
                                {{ $k->jumlah_kader }}+ Kader
                            </div>
                            <div class="kom-meta-item">
                                <i class="bi bi-list-check"></i>
                                {{ $k->jumlah_proker }} Proker
                            </div>
                        </div>
                        @if($k->kontak_wa || $k->instagram)
                        <div class="d-flex gap-2 mt-3">
                            @if($k->kontak_wa)
                            <a href="https://wa.me/{{ $k->kontak_wa }}" target="_blank"
                               style="font-size:.78rem;font-weight:700;color:#25D366;text-decoration:none;">
                                <i class="bi bi-whatsapp me-1"></i>WA
                            </a>
                            @endif
                            @if($k->instagram)
                            <a href="https://instagram.com/{{ $k->instagram }}" target="_blank"
                               style="font-size:.78rem;font-weight:700;color:#E1306C;text-decoration:none;">
                                <i class="bi bi-instagram me-1"></i>@{{ $k->instagram }}
                            </a>
                            @endif
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center py-5" style="color:var(--c-muted);">
            <i class="bi bi-building" style="font-size:3rem;opacity:.2;display:block;margin-bottom:1rem;"></i>
            Data komisariat belum tersedia.
        </div>
        @endif
    </div>
</section>

{{-- ===== CARA BERGABUNG ===== --}}
<section style="padding:5rem 0;background:var(--c-surface2);">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="section-label mb-2">Kaderisasi</div>
                <h2 class="section-heading mb-3">Bagaimana Cara<br>Bergabung?</h2>
                <p style="color:var(--c-muted);font-size:.95rem;line-height:1.7;margin-bottom:2rem;">
                    Bergabung dengan IMM dimulai dari komisariat di kampus atau pesantrenmu. Ikuti proses Darul Arqam Dasar (DAD) sebagai pintu masuk resmi menjadi kader IMM.
                </p>
                <div class="d-flex flex-column gap-3">
                    @foreach([
                        ['icon'=>'bi-search',       'title'=>'Temukan Komisariat',   'desc'=>'Cari komisariat IMM di kampus atau pesantrenmu.'],
                        ['icon'=>'bi-person-plus',  'title'=>'Ikuti Pra-DAD',        'desc'=>'Perkenalan awal dengan IMM sebelum pengkaderan formal.'],
                        ['icon'=>'bi-mortarboard',  'title'=>'Darul Arqam Dasar',    'desc'=>'Pengkaderan formal tingkat dasar selama 3 hari 2 malam.'],
                        ['icon'=>'bi-patch-check',  'title'=>'Resmi Menjadi Kader',  'desc'=>'Kamu resmi menjadi bagian dari keluarga besar IMM.'],
                    ] as $step)
                    <div class="d-flex gap-3 align-items-flex-start">
                        <div class="step-icon flex-shrink-0"><i class="bi {{ $step['icon'] }}"></i></div>
                        <div>
                            <div style="font-family:var(--font-display);font-size:.95rem;font-weight:700;color:var(--c-text);margin-bottom:2px;">{{ $step['title'] }}</div>
                            <div style="font-size:.85rem;color:var(--c-muted);">{{ $step['desc'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div style="background:var(--c-surface);border:1px solid var(--c-border);border-radius:24px;padding:2.5rem;">
                    <div class="section-label mb-3">Kontak</div>
                    <h3 style="font-family:var(--font-display);font-size:1.4rem;font-weight:800;color:var(--c-text);margin-bottom:1.5rem;">
                        Hubungi PC IMM Sukoharjo
                    </h3>
                    <div class="d-flex flex-column gap-3" style="font-size:.9rem;color:var(--c-muted);">
                        @php
                            $wa     = \App\Models\Setting::get('telepon');
                            $email  = \App\Models\Setting::get('email','pcimm.sukoharjo@gmail.com');
                            $alamat = \App\Models\Setting::get('alamat','Universitas Muhammadiyah Surakarta, Sukoharjo');
                        @endphp
                        @if($wa)
                        <div class="d-flex align-items-center gap-3">
                            <div style="width:40px;height:40px;background:rgba(37,211,102,.1);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                                <i class="bi bi-whatsapp" style="color:#25D366;font-size:1.1rem;"></i>
                            </div>
                            <div>
                                <div style="font-weight:600;color:var(--c-text);">WhatsApp</div>
                                <div>{{ $wa }}</div>
                            </div>
                        </div>
                        @endif
                        <div class="d-flex align-items-center gap-3">
                            <div style="width:40px;height:40px;background:rgba(183,28,28,.08);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                                <i class="bi bi-envelope" style="color:var(--c-red);font-size:1.1rem;"></i>
                            </div>
                            <div>
                                <div style="font-weight:600;color:var(--c-text);">Email</div>
                                <div>{{ $email }}</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div style="width:40px;height:40px;background:rgba(249,168,37,.1);border-radius:10px;display:flex;align-items:center;justify-content:center;">
                                <i class="bi bi-geo-alt" style="color:var(--c-gold);font-size:1.1rem;"></i>
                            </div>
                            <div>
                                <div style="font-weight:600;color:var(--c-text);">Sekretariat</div>
                                <div>{{ $alamat }}</div>
                            </div>
                        </div>
                    </div>
                    @if($wa)
                    <div style="margin-top:1.5rem;">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$wa) }}" target="_blank" class="btn-primary-imm" style="width:100%;justify-content:center;">
                            <i class="bi bi-whatsapp"></i> Chat Sekarang
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.querySelectorAll('.filter-tab').forEach(tab => {
    tab.addEventListener('click', function() {
        document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
        this.classList.add('active');
        const filter = this.dataset.filter;
        document.querySelectorAll('.kom-item').forEach(item => {
            item.style.display = (filter === 'all' || item.dataset.basis === filter) ? '' : 'none';
        });
    });
});
</script>
@endpush
