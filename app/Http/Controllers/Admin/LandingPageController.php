<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Servicios\Apiservice;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $response = Apiservice::request('landing-pages');
        $listado = is_array($response) && array_is_list($response) ? $response : [];
        $error = is_array($response) ? ($response['error'] ?? $response['message'] ?? null) : null;
        return view('admin.landing-pages.home', compact('listado', 'error'));
    }

    public function crear(Request $request)
    {
        $data = $request->all();
        $data['modules'] = $request->input('modules', []);
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $data['logo'] = curl_file_create($file->getRealPath(), $file->getMimeType(), $file->getClientOriginalName());
        }
        if ($request->hasFile('auth_background')) {
            $file = $request->file('auth_background');
            $data['auth_background'] = curl_file_create($file->getRealPath(), $file->getMimeType(), $file->getClientOriginalName());
        }
        unset($data['logo_url']);
        $response = Apiservice::request('landing-pages', $data, 1);
        if (isset($response['error']) || isset($response['message']) && !isset($response['id'])) {
            return redirect()->route('landing-pages')->with('error', $response['error'] ?? $response['message']);
        }
        return redirect()->route('landing-pages')->with('mensaje', 'La landing page fue creada correctamente.');
    }

    public function actualizar(Request $request, $id)
    {
        $data = $request->all();
        $data['modules'] = $request->input('modules', []);
        $hasLogo = $request->hasFile('logo');
        if ($hasLogo) {
            $file = $request->file('logo');
            $data['logo'] = curl_file_create($file->getRealPath(), $file->getMimeType(), $file->getClientOriginalName());
            $data['_method'] = 'PUT';
        }
        $hasAuthBackground = $request->hasFile('auth_background');
        if ($hasAuthBackground) {
            $file = $request->file('auth_background');
            $data['auth_background'] = curl_file_create($file->getRealPath(), $file->getMimeType(), $file->getClientOriginalName());
            $data['_method'] = 'PUT';
        }
        unset($data['logo_url']);
        $response = Apiservice::request('landing-pages/'.$id, $data, ($hasLogo || $hasAuthBackground) ? 1 : 3);
        if (isset($response['error']) || isset($response['message']) && !isset($response['id'])) {
            return redirect()->route('landing-pages')->with('error', $response['error'] ?? $response['message']);
        }
        return redirect()->route('landing-pages')->with('mensaje', 'La landing page fue actualizada correctamente.');
    }

    public function eliminar($id)
    {
        $response = Apiservice::request('landing-pages/'.$id, [], 2);
        if (isset($response['error']) || isset($response['message'])) {
            return redirect()->route('landing-pages')->with('error', $response['error'] ?? $response['message']);
        }
        return redirect()->route('landing-pages')->with('mensaje', 'La landing page fue eliminada.');
    }
}
