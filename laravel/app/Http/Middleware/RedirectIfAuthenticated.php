<?php

namespace App\Http\Middleware;

use App\Enums\Url;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * [Info] Traitement d'une demande entrante.
     * Si l'utilisateur est déjà authentifié on le redirige vers
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        /**
         * [Info] Ce cas est particulier. Seul l'administrateur peut créer un nouvel utilisateur, il est donc forcément déjà authentifié.
         * Pour éviter un problème de redirection dans ce cas précis, il faut ignorer la route d'enregistrement d'un utilisateur.
         */
        if ($request->path() === Str::substr(Url::ENREGISTREMENT->value, 1)) {
            return $next($request);
        }

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
