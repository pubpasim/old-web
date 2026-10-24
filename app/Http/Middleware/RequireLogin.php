<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Everything outside the public site needs a logged-in session ("level" is set by
 * userController@doLogin). The check fails closed: a route added later is protected
 * unless its path is listed in PUBLIC_PATHS.
 */
class RequireLogin
{
    /**
     * Paths served to anonymous visitors. Derived from the links and forms in
     * resources/views/user and the layouts; Request::is() patterns, '*' matches any suffix.
     */
    private const PUBLIC_PATHS = [
        '/',
        'login',
        'login/masuk',
        'logout',
        'up',
        'profile_video',
        'video_profil',
        'formulir_online',
        'pub_profile',
        'user_*',
        'user/mahasiswa',
        'download_formulir',
        'legalitas',
        'infaq_bulan',
        'storePertanyaan',
        'detail/org/*',
        'detail/orgppmb/*',
        'detailjadwal_ppmb_user',
        'jadwal_ppmb_user',
        'jadwal_survey_user/*',
        'jadwal_tpa_user/*',
        'jadwal_wawancara_akhir_user/*',
        'daerah_sos_ppmb_user/*',
        'sosialisasi_kesekolah/*',
        'dok_sekolah/lihat/*',
        'dok_jad_tpa/lihat/*',
        'dok_jad_survey/lihat/*',
        'dok_jad_wawancara_akhir/lihat/*',
        'fdm*',
        'materi*',
        'kegiatanPub',
        'kegiatanPub/*',
        'pembinaPub',
        'org_ikatan_alumni',
        'keg_ikatan_alumni',
        'organisasi_ppmb',
        'tampil_organisasi_ppmb',
        'tampil_organisasi_pub',
    ];

    public static function isPublic(Request $request): bool
    {
        return $request->is(self::PUBLIC_PATHS);
    }

    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->get('level') || self::isPublic($request)) {
            return $next($request);
        }

        return redirect('login')->with('alert', 'Silakan login terlebih dahulu');
    }
}
