<?php
declare(strict_types=1);

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait HtqJwtResponse
{

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'apiToken' => $token,
            'tokenType' => 'Bearer',
            'expiresIn' => Auth::factory()->getTTL()
        ], 200);
    }
}
