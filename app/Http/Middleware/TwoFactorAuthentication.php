<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class TwoFactorAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $status = 'enabled')
    {
        if (! in_array($status, ['enabled', 'disabled'])) {
            abort(404);
        }

        // If the backend does not require 2FA than continue
        if ($status === 'enabled' && $request->is('admin*') && ! config('quickstart.access.user.admin_requires_2fa')) {
            return $next($request);
        }

        // Page requires 2fa, but user is not enabled or page does not require 2fa, but it is enabled
        if (
            ($status === 'enabled' && ! $request->user()->hasEnabledTwoFactorAuthentication()) ||
            ($status === 'disabled' && $request->user()->hasEnabledTwoFactorAuthentication())
        ) {
            return redirect()->route('frontend.user.two_factor.index')->withFlashError(__('Two-factor Authentication must be :status to view this page.', ['status' => $status]));
        }


        return $next($request);
    }
}
