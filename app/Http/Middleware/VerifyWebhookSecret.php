<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyWebhookSecret
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $expectedSecret = config('services.production_sync.secret') ?: env('WEBHOOK_SECRET');

        if (empty($expectedSecret)) {
            return response()->json([
                'success' => false,
                'message' => 'Webhook secret is not configured on the server.',
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        // Check header X-Webhook-Secret, Authorization Bearer, or query/body parameter
        $providedSecret = $request->header('X-Webhook-Secret');

        if (! $providedSecret && $request->bearerToken()) {
            $providedSecret = $request->bearerToken();
        }

        if (! $providedSecret) {
            $providedSecret = $request->input('webhook_secret');
        }

        if (! $providedSecret || ! hash_equals((string) $expectedSecret, (string) $providedSecret)) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized: Invalid or missing webhook secret.',
            ], Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
