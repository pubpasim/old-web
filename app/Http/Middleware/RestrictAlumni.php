<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

/**
 * An alumnus (level "alumni") may use only their own area, served by alumni_adminController,
 * and only for their own data. Other levels are not restricted here.
 *
 * Fails closed: a route that is not in RULES is forbidden for an alumnus.
 *
 * Rule keys are "METHOD uri" exactly as registered in routes/web.php. Each rule may hold:
 *   mhs    sources of an id_mahasiswa the request names ("route:x" = URL placeholder {x},
 *          "input:idmhs" = form field). Every one that is present must be the alumnus' own id.
 *   record [table, key column, source]: the row it names must belong to the alumnus.
 *   user   form field naming a tb_user.id_user, which must be the alumnus' own account.
 */
class RestrictAlumni
{
    private const RULES = [
        'GET admin/alumni/{x}' => ['mhs' => ['route:x']],
        'POST alumni_admin/index/{x}' => ['mhs' => ['route:x']],
        'GET admin/alumni/akun/{x}' => ['mhs' => ['route:x']],
        'GET admin/alumni/profile/{x}' => ['mhs' => ['route:x']],
        'GET admin/alumni/aktivitas/{x}' => ['mhs' => ['route:x']],
        'GET admin/aktivitas/{x}' => ['mhs' => ['route:x']],
        'GET editProfil/{x}' => ['mhs' => ['route:x']],
        'POST simpanProfil/edit/{x}' => ['mhs' => ['route:x', 'input:idmhs']],
        'POST akunEdit/{x}' => ['mhs' => ['route:x'], 'user' => 'id_usr'],
        'POST tambahFoto' => ['mhs' => ['input:id_mhs']],
        'POST tambahFoto/aktivitas' => ['mhs' => ['input:id_mhs']],
        'GET tambahPend/{x}' => ['mhs' => ['route:x']],
        'POST simpanPend' => ['mhs' => ['input:idmhs']],
        'GET editPendidikan/{x}/{y}' => ['mhs' => ['route:x'], 'record' => ['tb_detpendidikan', 'id_detpendidikan', 'route:y']],
        'POST editPendidikan' => ['mhs' => ['input:idmhs'], 'record' => ['tb_detpendidikan', 'id_detpendidikan', 'input:idpnd']],
        'GET tambahPeng/{x}' => ['mhs' => ['route:x']],
        'POST tambah/pengalaman' => ['mhs' => ['input:id']],
        'GET editPengalaman/{x}/{y}' => ['mhs' => ['route:x'], 'record' => ['tb_detpengalaman', 'id_detpengalaman', 'route:y']],
        'POST updatePengalaman' => ['mhs' => ['input:id'], 'record' => ['tb_detpengalaman', 'id_detpengalaman', 'input:idpeng']],
        'GET edit/aktivitas/{x}/{y}' => ['mhs' => ['route:x'], 'record' => ['tb_alumni_dok', 'id_alumnidok', 'route:y']],
        'POST simpan/aktivitasEdit' => ['mhs' => ['input:id_mhs'], 'record' => ['tb_alumni_dok', 'id_alumnidok', 'input:id_dok']],
        'DELETE hapusAktivitas/{x}/{y}' => ['mhs' => ['route:x'], 'record' => ['tb_alumni_dok', 'id_alumnidok', 'route:y']],
    ];

    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->get('level') !== 'alumni' || RequireLogin::isPublic($request)) {
            return $next($request);
        }

        $own = $request->session()->get('id_mahasiswa');
        if ($own === null) {
            // session created before ids were remembered
            return redirect('login')->with('alert', 'Silakan login kembali');
        }

        $route = $request->route();
        $rule = $route ? (self::RULES[$request->method().' '.$route->uri()] ?? null) : null;
        if ($rule === null) {
            abort(403);
        }

        foreach ($rule['mhs'] ?? [] as $source) {
            $value = $this->read($request, $source);
            if ($value !== null && (string) $value !== (string) $own) {
                abort(403);
            }
        }

        if (isset($rule['record'])) {
            [$table, $key, $source] = $rule['record'];
            $id = $this->read($request, $source);
            if ($id !== null) {
                $owner = DB::table($table)->where($key, $id)->value('id_mahasiswa');
                if ($owner !== null && (string) $owner !== (string) $own) {
                    abort(403);
                }
            }
        }

        if (isset($rule['user'])) {
            $user = $request->input($rule['user']);
            if ($user !== null && (string) $user !== (string) $request->session()->get('id_user')) {
                abort(403);
            }
        }

        return $next($request);
    }

    private function read(Request $request, string $source): mixed
    {
        [$kind, $name] = explode(':', $source, 2);

        return $kind === 'route' ? $request->route($name) : $request->input($name);
    }
}
