<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Konten;

class CheckBidangAccess
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        // Super admin has access to all bidangs
        if ($user->isSuperAdmin()) {
            return $next($request);
        }

        // Check if admin_bidang is trying to access konten from other bidang
        $kontenId = $request->route('konten');
        if ($kontenId) {
            $konten = Konten::find($kontenId);
            if ($konten && $konten->bidang_id !== $user->bidang_id) {
                abort(403, 'Anda hanya dapat mengakses konten bidang Anda sendiri.');
            }
        }

        return $next($request);
    }
}
