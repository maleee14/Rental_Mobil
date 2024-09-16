<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use SebastianBergmann\Type\TrueType;

class UsersComponent extends Component
{
    use WithPagination, WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';
    protected $fillable = ['email'];
    public $id, $name, $email, $password, $role;
    public $addPage, $editPage = false;

    public function render()
    {
        $data['user'] = User::paginate(10);
        return view('livewire.users-component', $data);
    }

    public function create()
    {
        $this->addPage = true;
        $this->editPage = false;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required'
        ], [
            'name.required' => 'Nama Tidak Boleh Kosong !!',
            'email.required' => 'Email Tidak Boleh Kosong !!',
            'email.email' => 'Email Tidak Valid !!',
            'password.required' => 'Password Tidak Boleh Kosong !!',
            'role.required' => 'Role Tidak Boleh Kosong !!'
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role
        ]);

        session()->flash('success', 'User Berhasil Ditambahkan');
        $this->reset();
    }

    public function destroy($id)
    {
        $cari = User::find($id);
        $cari->delete();

        session()->flash('success', 'User Berhasil Dihapus');
        $this->reset();
    }

    public function edit($id)
    {
        $cari = User::find($id);

        $this->name = $cari->name;
        $this->email = $cari->email;
        $this->role = $cari->role;
        $this->id = $cari->id;
        $this->editPage = true;
        $this->addPage = false;
    }

    public function update()
    {
        $cari = User::find($this->id);
        if ($this->password == "") {
            $cari->update([
                'name' => $this->name,
                'email' => $this->email,
                'role' => $this->role,
            ]);
        } else {
            $cari->update([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => $this->role,
            ]);
        }
        session()->flash('success', 'Data Berhasil Diubah !');
        $this->reset();
    }
}
