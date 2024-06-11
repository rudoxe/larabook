<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $name, $password;

    protected $rules = [
        'name' => ['string', 'min:4'],
        'password' => ['string', 'min:4'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
{
    $credentials = $this->validate();

    if (Auth::attempt(['name' => $this->name, 'password' => $this->password])) {
        // Authentication successful
        \Log::info('Login successful for user: ' . $this->name);
        return redirect()->route('home')->with('msg', ['success', 'Login success!']);
    } else {
        // Authentication failed
        \Log::warning('Login failed for user: ' . $this->name);
        session()->flash('message', 'Wrong Username or Password!');
    }
}


    public function render()
    {
        return view('livewire.login');
    }
}
