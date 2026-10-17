<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Servicios\Apiservice;
use Illuminate\Http\Request;

class ServiciosolicitudController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->filled('estado') ? ['estado' => $request->get('estado')] : [];
        $response = Apiservice::request('sportodos/servicios-solicitudes', $params);
        $listado = is_array($response) && isset($response['data']) ? $response['data'] : (is_array($response) ? $response : []);
        $asideactual = 8;
        return view('admin.serviciosolicitud.home', compact('listado', 'asideactual'));
    }

    public function detalle($id)
    {
        $data = Apiservice::request('sportodos/servicios-solicitudes/' . $id);
        $asideactual = 8;
        return view('admin.serviciosolicitud.detalle', compact('data', 'asideactual'));
    }

    public function aprobar(Request $request, $id)
    {
        $response = Apiservice::request('sportodos/servicios-solicitudes/' . $id . '/aprobar', ['nota_revision' => $request->get('nota_revision', '')], 1);
        if (($response['estado'] ?? null) === 'aprobada') return redirect()->route('serviciosolicitud')->with('mensaje', 'Solicitud de servicios aprobada.');
        return redirect()->back()->with('error', $response['message'] ?? $response['error'] ?? 'No fue posible aprobar la solicitud.');
    }

    public function rechazar(Request $request, $id)
    {
        $response = Apiservice::request('sportodos/servicios-solicitudes/' . $id . '/rechazar', ['nota_revision' => $request->get('nota_revision', '')], 1);
        if (($response['estado'] ?? null) === 'rechazada') return redirect()->route('serviciosolicitud')->with('mensaje', 'Solicitud de servicios rechazada.');
        return redirect()->back()->with('error', $response['message'] ?? $response['error'] ?? 'No fue posible rechazar la solicitud.');
    }
}
