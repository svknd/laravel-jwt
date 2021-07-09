<?php

namespace Svknd\Laravel\Jwt\Models\Traits;

use Firebase\JWT\JWT as JwtBase;


trait Jwt
{
    public function generateToken()
    {
        $issuedAt = time();
        // $expirationTime = $issuedAt + config('auth.token_expiration');

        $accessToken = JwtBase::encode(array(
            'identifier' => $this->id,
            'type' => 'user',
            // "iss" => "http://example.org",
            // "aud" => "http://example.com",
            'iat' => $issuedAt,
            // 'exp' => $expirationTime
        ), config('auth.access_token_key'));

        $refreshToken = JwtBase::encode(array(
            'identifier' => $this->id,
            'iat' => $issuedAt,
        ), config('auth.refresh_token_key'));

        return $accessToken;
    }
}
