<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientList extends Component
{
    public $clients;
    public function mount()
    {
        if(!auth()->guard('web')->check()){
           return redirect('login');
        }
        
        $this->clients = DB::select('SELECT p.id, p.name, p.code, p.group, p.currency, c.name AS category FROM clients p INNER JOIN client_categories c ON p.categoryId = c.id ORDER BY c.name, p.name;');
    }

    public function edit($id){
        $this->redirectRoute('edit-client', ['id' => $id]);
    }

    public function delete($id){
        $client = Client::find($id);
        $client->delete();
        toastr()->success('Client deleted successfully', 'Congrats', ['positionClass' => 'toast-top-center']);
        $this->redirect(env('APP_ROOT').'clients');
    }

    public function render()
    {
        return view('livewire.client-list')->with([
            'clients' => $this->clients,
        ]);
    }
}
