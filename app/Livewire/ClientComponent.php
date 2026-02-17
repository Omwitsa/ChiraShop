<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;

class ClientComponent extends Component
{
    public $clients;
    public function mount()
    {
        $this->clients = Client::all();
    }

    public function edit($id){
        $this->redirectRoute('edit-client', ['id' => $id]);
    }

    public function delete($id){
        $region = Client::find($id);
        $region->delete();
        toastr()->success('Client deleted successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'clients');
    }

    public function render()
    {
        return view('livewire.client')->with([
            'clients' => $this->clients,
        ]);
    }
}
