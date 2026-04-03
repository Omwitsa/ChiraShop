<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\DB;

use App\Constants\Roles;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();
        // $isInactive = DB::table('client')
        //     ->where('ClientCode', $this->form->Code)
        //     ->where('Category', 'Inactive')
        //     ->exists();
        // if($isInactive){
        //     toastr()->error('Your account is inactive, Kindly contact admin', 'Sorry', ['positionClass' => 'toast-top-center']);
        //     $this->redirect('/login', navigate: true);
        // }

        $this->form->authenticate();
        Session::regenerate();
        toastr()->success('Logged in successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'client-dashboard');
    }
}; ?>


<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 login-section text-center">
        <img src="{{env('APP_ROOT')}}assets/images/icons/logo.png" alt="roses" style="width:15%;"><br><br><br>

        {{-- <span>Welcome to...</span> --}}
        <H1>LOVE THE BEAUTY</H1><br>

        <form wire:submit="login" autocomplete="off">
            <div class="user-credential active">
                <label>UserName</label>
                <input wire:model="form.Code" name="Code" type="text" class="form-control form-control-border border-width-2" placeholder="Username" autocomplete="off" required autofocus>
                <x-input-error :messages="$errors->get('Code')" class="mt-2" />
            </div>

            <div class="user-credential">
                <label>Password</label>
                <input wire:model="form.password" name="password" type="password" class="form-control form-control-border border-width-2" placeholder="**********" autocomplete="off" required>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <a href="{{env('APP_ROOT')}}login-agent">
                    <p>I'm an agent</p>
                </a>
            </div><br><br>

            <div class="row m-t-30">
                <div class="col-md-12">
                    <x-primary-button class="btn btn-primary">
                        {{ __('Login') }}
                    </x-primary-button>
                </div>
            </div>
        </form>
    </div>

    {{-- <div class="col-sm-6">
        <img class="login-img" src="{{env('APP_ROOT')}}assets/images/login-img.png" alt="roses">
    </div> --}}
</div>