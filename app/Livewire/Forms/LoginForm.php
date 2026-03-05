<?php

namespace App\Livewire\Forms;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;

/**
 * Configure Auth Settings in config/auth.php (define a new provider for your Clients and a new guard that uses that provider)
 * Ensure your Client model extends Authenticatable
 * Explicitly tell Laravel to use the client guard, not unless it uses the default
 * Accessing the Authenticated User (For Agents: Auth::guard('web')->user(); or simply auth()->user();
 * For Customers: Auth::guard('client')->user();)
 */

class LoginForm extends Form
{
    // #[Validate('required|string|email')]
    #[Validate('required|string')]
    public string $Code = '';

    #[Validate('required|string')]
    public string $password = '';

    #[Validate('boolean')]
    public bool $remember = false;

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $credentials = $this->only('Code', 'password');
        if (!Auth::guard('client')->attempt($credentials)) {
            RateLimiter::hit($this->throttleKey());
            toastr()->error('Invalid username or password', 'Sorry', ['positionClass' => 'toast-top-center']);
            throw ValidationException::withMessages([
                'form.Code' => trans('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey());
    }
    /**
     * Ensure the authentication request is not rate limited.
     */
    protected function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout(request()));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'form.Code' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the authentication rate limiting throttle key.
     */
    protected function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->Code).'|'.request()->ip());
    }
}