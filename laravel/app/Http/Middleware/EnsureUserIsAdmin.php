<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * [Info] Le « middleware » est un outil qui nous permet d'inspecter et de filtrer des requêtes HTTP.
     * Ici, on vérifie qu'un utilisateur possède le role « administrateur ».
     *
     * @see https://laravel.com/docs/middleware
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */

    /**
     * [Info] Traitement d'une demande entrante.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()->isAdmin()) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
