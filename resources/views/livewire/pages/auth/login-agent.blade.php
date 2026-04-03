<?php

use App\Livewire\Forms\LoginAgentForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Illuminate\Support\Facades\DB;

use App\Constants\Roles;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginAgentForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();
        // $isInactive = DB::table('client')
        //     ->where('ClientCode', $this->form->usercode)
        //     ->where('Category', 'Inactive')
        //     ->exists();

        // if($isInactive){
        //     toastr()->error('Your account is inactive, Kindly contact admin', 'Sorry', ['positionClass' => 'toast-top-center']);
        //     $this->redirect('/login', navigate: true);
        // }
        
        $this->form->authenticate();
        Session::regenerate();
        toastr()->success('Logged in successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'dashboard');
    }
}; ?>


<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6 text-center">
        <img src="{{env('APP_ROOT')}}assets/images/icons/logo.png" alt="roses" style="width:15%;"><br><br><br>
        <div class="card">
            <div class="card-body login-card-body">
                <H1 class="login-box-msg">LOVE THE BEAUTY</H1>
                <form wire:submit="login" autocomplete="off">
                    <div class="input-group mb-3">
                        <input wire:model="form.usercode" name="usercode" type="text" class="form-control" placeholder="Username" autocomplete="off" required autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                        <x-input-error :messages="$errors->get('usercode')" class="mt-2" />
                    </div>

                    <div class="input-group mb-3">
                        <input wire:model="form.password" name="password" type="password" class="form-control" placeholder="Password" autocomplete="off" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    
                    <div class="row m-t-30">
                        <div class="col-md-12">
                            <x-primary-button class="btn btn-primary">
                                {{ __('Login') }}
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="col-sm-6">
        <img class="login-img" src="{{env('APP_ROOT')}}assets/images/login-img.png" alt="roses">
    </div> --}}
</div>