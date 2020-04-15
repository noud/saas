<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;

class LoginController extends Controller
{
    const PROVIDER = 'facebook' // twitter, linkedin, google, github, gitlab or bitbucket

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        // return Socialite::driver(SELF::PROVIDER)->redirect();
        return Socialite::driver(SELF::PROVIDER)->stateless()->user();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver(SELF::PROVIDER)->user();

        // $user->token;
        $this->UserDetails($user);
    }
    
    public function UserFromOAuth2Token()
    {
        $user = Socialite::driver(SELF::PROVIDER)->userFromToken($token);
        $this->UserDetails($user);
    }

    public function UserFromOAuth1TokenAndSecret()
    {
        $user = Socialite::driver('twitter')->userFromTokenAndSecret($token, $secret);
        $this->UserDetails($user);
    }

    private function UserDetails($user)
    {
        // OAuth Two Providers
        $token = $user->token;
        $refreshToken = $user->refreshToken; // not always provided
        $expiresIn = $user->expiresIn;

        // OAuth One Providers
        $token = $user->token;
        $tokenSecret = $user->tokenSecret;

        // All Providers
        $user->getId();
        $user->getNickname();
        $user->getName();
        $user->getEmail();
        $user->getAvatar();
    }
}