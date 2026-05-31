@extends('layouts.admin')
@section('title', 'Pengaturan Website')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Pengaturan Website</h4>
        <p class="text-muted mb-0">Kelola informasi kontak, sosial media, dan visi misi organisasi</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
@endif

<form action="{{ route('super-admin.settings.update') }}" method="POST">
    @csrf @method('PUT')

    @foreach($settings as $group => $items)
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-transparent border-0 pt-4 pb-0 px-4">
            <h6 class="fw-bold text-uppercase" style="letter-spacing:1px;font-size:0.8rem;color:#C62828;">
                <i class="bi bi-{{ $group == 'kontak' ? 'telephone' : ($group == 'sosmed' ? 'share' : ($group == 'organisasi' ? 'building' : 'gear')) }} me-2"></i>
                {{ ucfirst($group) }}
            </h6>
        </div>
        <div class="card-body p-4">
            <div class="row g-3">
                @foreach($items as $setting)
                <div class="{{ $setting->tipe == 'textarea' ? 'col-12' : 'col-md-6' }}">
                    <label class="form-label fw-semibold">{{ $setting->label }}</label>
                    @if($setting->tipe == 'textarea')
                        <textarea name="{{ $setting->key }}" class="form-control" rows="3">{{ $setting->value }}</textarea>
                    @else
                        <div class="input-group">
                            @if($setting->tipe == 'url')
                                <span class="input-group-text"><i class="bi bi-link-45deg"></i></span>
                            @elseif($setting->tipe == 'phone')
                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                            @elseif($setting->tipe == 'email')
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            @endif
                            <input type="text" name="{{ $setting->key }}" class="form-control" value="{{ $setting->value }}">
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach

    <div class="d-flex gap-2 mb-4">
        <button type="submit" class="btn btn-primary px-4">
            <i class="bi bi-check-lg me-1"></i> Simpan Semua Pengaturan
        </button>
    </div>
</form>
@endsection
