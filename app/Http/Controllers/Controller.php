<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

abstract class Controller
{
    // Cliente HTTP ya apuntando a la API (URL_API del .env)
    protected function api()
    {
        return Http::baseUrl(config('services.api.url'))->acceptJson();
    }

    // Trae datos de la API. Si algo falla devuelve un arreglo vacío
    protected function traer(string $ruta)
    {
        $respuesta = $this->api()->get($ruta);
        return $respuesta->successful() ? $respuesta->json() : [];
    }

    // Vuelve al formulario mostrando el error que mandó la API
    protected function volverConError($respuesta)
    {
        $errores = $respuesta->json('errors') ?? [];
        $mensaje = $respuesta->json('message') ?? 'La API no pudo procesar la solicitud.';

        return back()->withInput()->withErrors($errores)->with('error', $mensaje);
    }
}
