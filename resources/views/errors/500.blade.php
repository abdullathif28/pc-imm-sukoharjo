@extends('layouts.public')
@section('title', '500 — Terjadi Kesalahan')
@section('hide_ticker')

@section('content')
<section style="min-height: 70vh; display: flex; align-items: center; padding: 5rem 0; background: var(--c-cream);">
    <div class="container text-center">
        <div data-aos="fade-up">
            <div style="font-family: var(--font-display); font-size: clamp(6rem, 20vw, 12rem); font-weight: 900; color: rgba(183,28,28,0.08); line-height: 1; margin-bottom: -1rem;">
                500
            </div>
            <div style="width: 64px; height: 64px; background: linear-gradient(135deg, var(--c-red), var(--c-red-mid)); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem;">
                <i class="bi bi-exclamation-triangle" style="font-size: 1.8rem; color: white;"></i>
            </div>
            <h1 style="font-family: var(--font-display); font-size: clamp(1.5rem, 4vw, 2.5rem); font-weight: 800; color: var(--c-text); margin-bottom: 1rem;">
                Terjadi Kesalahan Server
            </h1>
            <p style="color: var(--c-muted); font-size: 1rem; max-width: 420px; margin: 0 auto 2.5rem; line-height: 1.7;">
                Ups, ada sesuatu yang tidak beres di server kami. Tim kami sedang memperbaikinya. Silakan coba beberapa saat lagi.
            </p>
            <a href="{{ route('home') }}" class="btn-primary-imm">
                <i class="bi bi-house"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</section>
@endsection
