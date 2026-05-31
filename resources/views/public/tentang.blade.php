@extends('layouts.public')
@section('title', 'Tentang IMM Sukoharjo')
@section('og_title', 'Tentang PC IMM Sukoharjo')
@section('og_description', 'Mengenal Pimpinan Cabang Ikatan Mahasiswa Muhammadiyah Sukoharjo — sejarah, visi misi, dan struktur kepemimpinan.')

@push('styles')
<style>
.tentang-header {
    min-height: 60vh; background: linear-gradient(150deg, var(--c-red) 0%, #5D0000 60%, #1A0000 100%);
    display: flex; align-items: center; padding: 6rem 0 4rem;
    position: relative; overflow: hidden;
}
.tentang-header::before {
    content:''; position:absolute; inset:0;
    background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'%3E%3Cg fill='%23ffffff' fill-opacity='0.025'%3E%3Cpolygon points='50,0 100,50 50,100 0,50'/%3E%3C/g%3E%3C/svg%3E");
}
.tentang-header::after {
    content:''; position:absolute; bottom:-2px; left:0; right:0; height:80px;
    background:var(--c-cream); clip-path:ellipse(55% 100% at 50% 100%);
}
[data-theme="dark"] .tentang-header::after { background:var(--c-cream); }
.tentang-header-content { position:relative; z-index:2; }
.tentang-title { font-family:var(--font-display); font-size:clamp(2.5rem,6vw,4.5rem); font-weight:900; color:white; line-height:1.05; margin-bottom:1.5rem; }
.tentang-title .highlight { color:var(--c-gold); display:block; }
.tri-badges { display:flex; gap:.75rem; margin-top:2rem; flex-wrap:wrap; }
.tri-badge { display:flex; align-items:center; gap:8px; background:rgba(255,255,255,0.08); border:1px solid rgba(249,168,37,0.3); border-radius:99px; padding:8px 16px; color:white; font-size:0.82rem; font-weight:600; }
.tri-badge .tri-icon { width:28px; height:28px; background:rgba(249,168,37,0.2); border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:0.9rem; }
.section-wrap { padding: 5rem 0; }
.section-wrap-alt { background: var(--c-surface2); }
.about-quote { border-left:4px solid var(--c-gold); padding:1.25rem 1.5rem; background:rgba(249,168,37,0.05); border-radius:0 12px 12px 0; margin:2rem 0; }
.about-quote p { font-family:var(--font-display); font-size:1.1rem; font-style:italic; color:var(--c-text); line-height:1.6; margin:0; }
.about-quote cite { font-size:0.8rem; color:var(--c-muted); font-style:normal; font-weight:600; margin-top:.5rem; display:block; }
.visi-card { background:linear-gradient(135deg,var(--c-red),#7B0000); border-radius:24px; padding:2.5rem; color:white; position:relative; overflow:hidden; height:100%; }
.visi-card::before { content:'"'; position:absolute; top:-20px; right:20px; font-family:var(--font-display); font-size:12rem; font-weight:900; color:rgba(255,255,255,0.05); line-height:1; pointer-events:none; }
.visi-label,.misi-label { font-size:.7rem; letter-spacing:3px; font-weight:700; text-transform:uppercase; margin-bottom:1rem; }
.visi-label { color:var(--c-gold); }
.misi-label { color:var(--c-red); }
.visi-text { font-family:var(--font-display); font-size:1.15rem; font-weight:700; line-height:1.5; color:white; }
.misi-card { background:var(--c-surface); border:1px solid var(--c-border); border-radius:24px; padding:2.5rem; height:100%; }
.misi-list { list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:1rem; }
.misi-list li { display:flex; gap:12px; font-size:.9rem; line-height:1.6; color:var(--c-text); }
.misi-list li::before { content:''; width:8px; height:8px; min-width:8px; background:linear-gradient(135deg,var(--c-red),var(--c-gold)); border-radius:50%; margin-top:7px; }
/* Timeline */
.timeline { position:relative; padding-left:2rem; }
.timeline::before { content:''; position:absolute; left:0; top:8px; bottom:0; width:2px; background:linear-gradient(to bottom,var(--c-red),var(--c-gold),transparent); }
.timeline-item { position:relative; padding:0 0 2.5rem 2rem; }
.timeline-item::before { content:''; position:absolute; left:-2rem; top:6px; width:12px; height:12px; background:var(--c-red); border:3px solid var(--c-gold); border-radius:50%; transform:translateX(-5px); transition:transform .3s; }
.timeline-item:hover::before { transform:translateX(-5px) scale(1.3); }
.timeline-year { font-size:.7rem; letter-spacing:2px; font-weight:700; text-transform:uppercase; color:var(--c-gold); margin-bottom:.3rem; }
.timeline-event { font-family:var(--font-display); font-size:1rem; font-weight:700; color:var(--c-text); margin-bottom:.4rem; }
.timeline-desc { font-size:.88rem; color:var(--c-muted); line-height:1.6; }
/* Kepemimpinan */
.ketua-card { background:var(--c-surface); border:1px solid var(--c-border); border-radius:28px; overflow:hidden; display:flex; align-items:stretch; }
.ketua-img-wrap { width:260px; min-width:260px; background:linear-gradient(150deg,var(--c-red),#5D0000); position:relative; overflow:hidden; display:flex; align-items:center; justify-content:center; }
.ketua-img-wrap img { width:100%; height:100%; object-fit:cover; object-position:top; }
.ketua-img-placeholder { font-size:5rem; opacity:.25; color:white; }
.ketua-body { padding:2.5rem; flex:1; display:flex; flex-direction:column; justify-content:center; }
.ketua-jabatan { font-size:.7rem; letter-spacing:3px; text-transform:uppercase; font-weight:700; color:var(--c-red); margin-bottom:.5rem; }
.ketua-nama { font-family:var(--font-display); font-size:clamp(1.5rem,3vw,2rem); font-weight:900; color:var(--c-text); line-height:1.2; margin-bottom:.5rem; }
.ketua-quote { background:rgba(183,28,28,0.05); border-left:3px solid var(--c-red); padding:1rem 1.25rem; border-radius:0 10px 10px 0; font-style:italic; font-size:.9rem; color:var(--c-muted); line-height:1.6; margin-bottom:1.5rem; }
.pengurus-card { background:var(--c-surface); border:1px solid var(--c-border); border-radius:16px; padding:1.5rem; text-align:center; transition:all .3s; }
.pengurus-card:hover { transform:translateY(-4px); box-shadow:var(--shadow-md); border-color:rgba(183,28,28,0.2); }
.pengurus-avatar { width:68px; height:68px; border-radius:50%; object-fit:cover; object-position:top; margin:0 auto 1rem; border:3px solid var(--c-border); display:block; }
.pengurus-avatar-placeholder { width:68px; height:68px; border-radius:50%; background:linear-gradient(135deg,var(--c-red),#7B0000); margin:0 auto 1rem; display:flex; align-items:center; justify-content:center; font-family:var(--font-display); font-weight:900; font-size:1.4rem; color:white; }
.pengurus-nama { font-family:var(--font-display); font-size:.95rem; font-weight:700; color:var(--c-text); margin-bottom:.25rem; }
.pengurus-jabatan { font-size:.75rem; color:var(--c-red); font-weight:600; }
.pengurus-bidang { font-size:.72rem; color:var(--c-muted); margin-top:.2rem; }
.bidang-tabs-wrap { display:flex; gap:.5rem; overflow-x:auto; padding-bottom:.5rem; margin-bottom:2rem; scrollbar-width:none; }
.bidang-tabs-wrap::-webkit-scrollbar { display:none; }
.bidang-tab { background:var(--c-surface); border:1px solid var(--c-border); border-radius:99px; padding:.4rem 1rem; font-size:.82rem; font-weight:600; color:var(--c-muted); cursor:pointer; white-space:nowrap; transition:all .2s; }
.bidang-tab.active,.bidang-tab:hover { background:var(--c-red); border-color:var(--c-red); color:white; }
.stat-box { background:var(--c-surface); border:1px solid var(--c-border); border-radius:16px; padding:1.5rem; text-align:center; transition:all .3s; }
.stat-box:hover { border-color:rgba(183,28,28,.25); transform:translateY(-4px); }
@media (max-width:767px) {
    .ketua-card { flex-direction:column; }
    .ketua-img-wrap { width:100%; min-width:unset; height:220px; }
    .tentang-title { font-size:2rem; }
    .section-wrap { padding:3.5rem 0; }
}
</style>
@endpush

@section('content')

{{-- ===== HEADER ===== --}}
<section class="tentang-header">
    <div class="container tentang-header-content">
        <div class="row">
            <div class="col-lg-8" data-aos="fade-right">
                <div class="section-label mb-2" style="color:rgba(249,168,37,.7);">Mengenal Lebih Dekat</div>
                <h1 class="tentang-title">
                    Ikatan Mahasiswa<br>
                    <span class="highlight">Muhammadiyah</span>
                    Sukoharjo
                </h1>
                <p style="color:rgba(255,255,255,.65);font-size:1rem;line-height:1.7;max-width:520px;">
                    {{ \App\Models\Setting::get('deskripsi_singkat', 'Wadah perjuangan mahasiswa Muslim yang berkomitmen pada pengembangan intelektual, penguatan spiritual, dan kepedulian sosial.') }}
                </p>
                <div class="tri-badges">
                    <div class="tri-badge"><span class="tri-icon">🕌</span> Religiusitas</div>
                    <div class="tri-badge"><span class="tri-icon">📚</span> Intelektualitas</div>
                    <div class="tri-badge"><span class="tri-icon">🤝</span> Humanitas</div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== TENTANG ===== --}}
<section class="section-wrap">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="section-label mb-2">Siapa Kami</div>
                <h2 class="section-heading mb-4">Tentang PC IMM Sukoharjo</h2>
                <p style="color:var(--c-muted);font-size:.95rem;line-height:1.8;margin-bottom:1rem;">
                    Pimpinan Cabang Ikatan Mahasiswa Muhammadiyah (PC IMM) Sukoharjo adalah organisasi mahasiswa Islam yang berada di bawah naungan Muhammadiyah, berpusat di wilayah Sukoharjo dengan basis kader terbesar di Universitas Muhammadiyah Surakarta (UMS).
                </p>
                <p style="color:var(--c-muted);font-size:.95rem;line-height:1.8;margin-bottom:1rem;">
                    Sebagai gerakan mahasiswa, IMM Sukoharjo hadir untuk membentuk kader yang memiliki kompetensi ganda: kedalaman iman dan ketajaman intelektual, yang siap berkontribusi nyata bagi persyarikatan, umat, dan bangsa.
                </p>
                <div class="about-quote">
                    <p>"Membentuk kader yang beriman, berilmu, dan beramal saleh — itulah ruh dari setiap gerak IMM."</p>
                    <cite>— Semangat Tri Kompetensi Dasar IMM</cite>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                @php
                    $statsBox = [
                        ['icon'=>'bi-diagram-3','val'=> \App\Models\Bidang::where('is_active',true)->count(),'label'=>'Bidang Aktif'],
                        ['icon'=>'bi-building',  'val'=> \App\Models\Komisariat::where('is_active',true)->count() ?: 6, 'label'=>'Komisariat'],
                        ['icon'=>'bi-people',    'val'=> \App\Models\Pengurus::where('is_active',true)->count() ?: 48, 'label'=>'Pengurus Aktif'],
                        ['icon'=>'bi-newspaper', 'val'=> \App\Models\Konten::published()->count(), 'label'=>'Konten'],
                    ];
                @endphp
                <div class="row g-3">
                    @foreach($statsBox as $s)
                    <div class="col-6">
                        <div class="stat-box">
                            <i class="bi {{ $s['icon'] }}" style="font-size:1.5rem;color:var(--c-red);display:block;margin-bottom:.5rem;"></i>
                            <div style="font-family:var(--font-display);font-size:2rem;font-weight:900;color:var(--c-text);line-height:1;" data-count="{{ $s['val'] }}">0</div>
                            <div style="font-size:.78rem;color:var(--c-muted);font-weight:600;margin-top:.25rem;">{{ $s['label'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== VISI MISI (dari DB) ===== --}}
<section class="section-wrap section-wrap-alt">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <div class="section-label mb-2 justify-content-center">Arah Gerak</div>
            <h2 class="section-heading">Visi &amp; Misi</h2>
        </div>
        <div class="row g-4" data-aos="fade-up">
            <div class="col-lg-5">
                <div class="visi-card">
                    <div class="visi-label">Visi</div>
                    <div class="visi-text">
                        {{ \App\Models\Setting::get('visi', 'Terwujudnya kader IMM Sukoharjo yang religius, intelektual, dan humanis sebagai kekuatan perubahan menuju masyarakat Islam yang berkemajuan.') }}
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="misi-card">
                    <div class="misi-label">Misi</div>
                    @php
                        $misiRaw = \App\Models\Setting::get('misi', '');
                        $misiList = array_filter(array_map('trim', explode("\n", $misiRaw)));
                    @endphp
                    <ul class="misi-list">
                        @forelse($misiList as $m)
                            <li>{{ preg_replace('/^\d+\.\s*/', '', $m) }}</li>
                        @empty
                            <li>Memperkuat nilai-nilai Islam berkemajuan di kalangan mahasiswa.</li>
                            <li>Mengembangkan tradisi intelektual dan budaya kritis melalui kajian dan literasi.</li>
                            <li>Menumbuhkan kepedulian sosial dan semangat pengabdian kepada masyarakat.</li>
                            <li>Mencetak kader pemimpin yang berkarakter, kompeten, dan berintegritas.</li>
                            <li>Membangun sinergi antar komisariat untuk gerakan kolektif yang kuat.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ===== TIMELINE (dari DB) ===== --}}
@php $timelines = \App\Models\Timeline::where('is_active', true)->orderBy('urutan')->get(); @endphp
@if($timelines->count() > 0)
<section class="section-wrap">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-4" data-aos="fade-right">
                <div class="section-label mb-2">Jejak Perjuangan</div>
                <h2 class="section-heading mb-3">Sejarah<br>IMM Sukoharjo</h2>
                <p style="color:var(--c-muted);font-size:.9rem;line-height:1.7;">
                    Perjalanan panjang PC IMM Sukoharjo dalam membentuk kader dan berkontribusi untuk umat dan bangsa.
                </p>
            </div>
            <div class="col-lg-8" data-aos="fade-left">
                <div class="timeline">
                    @foreach($timelines as $t)
                    <div class="timeline-item">
                        <div class="timeline-year">{{ $t->tahun }}</div>
                        <div class="timeline-event">{{ $t->judul }}</div>
                        @if($t->deskripsi)
                            <div class="timeline-desc">{{ $t->deskripsi }}</div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- ===== KEPEMIMPINAN (dari DB) ===== --}}
@php
    $periode   = \App\Models\Setting::get('periode_aktif', '2026');
    $ketua     = \App\Models\Pengurus::where('tipe','ketua_umum')->where('is_active',true)->orderBy('urutan')->first();
    $pengurus  = \App\Models\Pengurus::with('bidang')->where('tipe','pengurus_inti')->where('is_active',true)->orderBy('urutan')->get();
    $admBidang = \App\Models\Pengurus::with('bidang')->where('tipe','admin_bidang')->where('is_active',true)->orderBy('urutan')->get();
    $bidangs   = \App\Models\Bidang::where('is_active',true)->orderBy('urutan')->get();
@endphp

<section class="section-wrap section-wrap-alt">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <div class="section-label mb-2 justify-content-center">Kepengurusan</div>
            <h2 class="section-heading">Struktur Pimpinan</h2>
            <p style="color:var(--c-muted);max-width:480px;margin:.75rem auto 0;font-size:.9rem;">
                Periode {{ $periode }} — {{ \App\Models\Setting::get('nama_lengkap', 'PC IMM Sukoharjo') }}
            </p>
        </div>

        {{-- Ketua Umum --}}
        @if($ketua)
        <div class="ketua-card mb-5" data-aos="fade-up">
            <div class="ketua-img-wrap">
                @if($ketua->foto)
                    <img src="{{ asset('storage/'.$ketua->foto) }}" alt="{{ $ketua->nama }}">
                @else
                    <div class="ketua-img-placeholder">👤</div>
                @endif
            </div>
            <div class="ketua-body">
                <div class="ketua-jabatan">{{ $ketua->jabatan }}</div>
                <div class="ketua-nama">{{ $ketua->nama }}</div>
                <div style="font-size:.82rem;color:var(--c-muted);font-weight:600;margin-bottom:1.25rem;display:flex;align-items:center;gap:6px;">
                    <i class="bi bi-calendar2-check" style="color:var(--c-red);"></i>
                    Periode {{ $ketua->periode }}
                    @if($ketua->asal_kampus) · {{ $ketua->asal_kampus }} @endif
                </div>
                @if($ketua->quote)
                <div class="ketua-quote">"{{ $ketua->quote }}"</div>
                @endif
            </div>
        </div>
        @endif

        {{-- Pengurus Inti --}}
        @if($pengurus->count() > 0)
        <h5 class="fw-bold mb-3" style="font-family:var(--font-display);">Pengurus Inti</h5>
        <div class="row g-3 mb-5">
            @foreach($pengurus as $p)
            <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 60 }}">
                <div class="pengurus-card">
                    @if($p->foto)
                        <img src="{{ asset('storage/'.$p->foto) }}" class="pengurus-avatar" alt="{{ $p->nama }}">
                    @else
                        <div class="pengurus-avatar-placeholder">{{ strtoupper(substr($p->nama, 0, 1)) }}</div>
                    @endif
                    <div class="pengurus-nama">{{ $p->nama }}</div>
                    <div class="pengurus-jabatan">{{ $p->jabatan }}</div>
                </div>
            </div>
            @endforeach
        </div>
        @endif

        {{-- Admin per Bidang --}}
        @if($admBidang->count() > 0)
        <h5 class="fw-bold mb-3" style="font-family:var(--font-display);">Admin Bidang</h5>
        <div class="bidang-tabs-wrap" id="bidangTabs" data-aos="fade-up">
            <button class="bidang-tab active" data-target="all">Semua</button>
            @foreach($bidangs as $b)
            <button class="bidang-tab" data-target="bidang-{{ $b->id }}">{{ $b->singkatan }}</button>
            @endforeach
        </div>
        <div class="row g-3" id="pengurusGrid" data-aos="fade-up">
            @foreach($admBidang as $p)
            <div class="col-6 col-md-4 col-lg-3 pengurus-item" data-bidang="bidang-{{ $p->bidang_id }}">
                <div class="pengurus-card">
                    @if($p->foto)
                        <img src="{{ asset('storage/'.$p->foto) }}" class="pengurus-avatar" alt="{{ $p->nama }}">
                    @else
                        <div class="pengurus-avatar-placeholder">{{ strtoupper(substr($p->nama, 0, 1)) }}</div>
                    @endif
                    <div class="pengurus-nama">{{ $p->nama }}</div>
                    <div class="pengurus-jabatan">{{ $p->jabatan }}</div>
                    @if($p->bidang)
                    <div class="pengurus-bidang">{{ $p->bidang->singkatan }}</div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

{{-- ===== CTA ===== --}}
<section style="background:linear-gradient(135deg,var(--c-dark) 0%,#3D0000 100%);padding:4rem 0;">
    <div class="container text-center" data-aos="fade-up">
        <h3 style="font-family:var(--font-display);color:white;font-size:clamp(1.5rem,4vw,2.5rem);font-weight:800;margin-bottom:1rem;">
            Bergabunglah Bersama Kami
        </h3>
        <p style="color:rgba(255,255,255,.6);max-width:460px;margin:0 auto 2rem;font-size:.95rem;line-height:1.7;">
            Jadilah bagian dari gerakan mahasiswa yang bermakna bersama PC IMM Sukoharjo.
        </p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="{{ route('komisariat') }}" class="btn-primary-imm" style="background:linear-gradient(135deg,var(--c-gold),#E65100);color:#1A0A0A;">
                <i class="bi bi-building"></i> Lihat Komisariat
            </a>
            <a href="{{ route('konten') }}" class="btn-outline-imm" style="border-color:rgba(255,255,255,.3);color:white;">
                <i class="bi bi-newspaper"></i> Baca Konten
            </a>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
document.querySelectorAll('.bidang-tab').forEach(tab => {
    tab.addEventListener('click', function() {
        document.querySelectorAll('.bidang-tab').forEach(t => t.classList.remove('active'));
        this.classList.add('active');
        const target = this.dataset.target;
        document.querySelectorAll('.pengurus-item').forEach(item => {
            item.style.display = (target === 'all' || item.dataset.bidang === target) ? '' : 'none';
        });
    });
});
</script>
@endpush
