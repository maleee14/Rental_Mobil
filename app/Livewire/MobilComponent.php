<?php

namespace App\Livewire;

use App\Models\Mobil;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class MobilComponent extends Component
{
    use WithPagination, WithoutUrlPagination, WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $addPage, $editPage = false;
    public $nopolisi, $merk, $jenis, $kapasitas, $harga, $foto, $id;

    public function render()
    {

        $data['mobil'] = Mobil::paginate(10);
        return view('livewire.mobil-component', $data);
    }

    public function create()
    {
        $this->addPage = true;
        $this->editPage = false;
    }

    public function store()
    {
        $this->validate([
            'nopolisi' => 'required',
            'merk' => 'required',
            'jenis' => 'required',
            'kapasitas' => 'required',
            'harga' => 'required',
            'foto' => 'required|image',
        ], [
            'nopolisi.required' => 'No Polisi Tidak Boleh Kosong !!',
            'merk.required' => 'Merk Tidak Boleh Kosong !!',
            'jenis.required' => 'Jenis Tidak Boleh Kosong !!',
            'kapasitas.required' => 'Kapasitas Tidak Boleh Kosong !!',
            'harga.required' => 'Harga Tidak Boleh Kosong !!',
            'foto.required' => 'Foto Tidak Boleh Kosong !!',
            'foto.image' => 'Upload Foto Dalam Bentuk Image !!',
        ]);

        $this->foto->storeAs('public/mobil', $this->foto->hashName());

        Mobil::create([
            'user_id' => auth()->user()->id,
            'nopolisi' => $this->nopolisi,
            'merk' => $this->merk,
            'jenis' => $this->jenis,
            'kapasitas' => $this->kapasitas,
            'harga' => $this->harga,
            'foto' => $this->foto->hashName(),
        ]);

        session()->flash('success', 'User Berhasil Ditambahkan');
        $this->reset();
    }

    public function destroy($id)
    {
        $cari = Mobil::find($id);
        unlink(public_path('storage/mobil/' . $cari->foto));
        $cari->delete();

        session()->flash('success', 'User Berhasil Dihapus');
        $this->reset();
    }

    public function edit($id)
    {
        $this->editPage = true;
        $this->addPage = false;

        $cari = Mobil::find($id);
        $this->id = $id;
        $this->nopolisi = $cari->nopolisi;
        $this->merk = $cari->merk;
        $this->jenis = $cari->jenis;
        $this->kapasitas = $cari->kapasitas;
        $this->harga = $cari->harga;
    }

    public function update()
    {
        $cari = Mobil::find($this->id);
        if (empty($this->foto)) {
            $cari->update([
                'user_id' => auth()->user()->id,
                'nopolisi' => $this->nopolisi,
                'merk' => $this->merk,
                'jenis' => $this->jenis,
                'kapasitas' => $this->kapasitas,
                'harga' => $this->harga,

            ]);
        } else {
            unlink(public_path('storage/mobil/' . $cari->foto));
            $this->foto->storeAs('public/mobil', $this->foto->hashName());

            $cari->update([
                'user_id' => auth()->user()->id,
                'nopolisi' => $this->nopolisi,
                'merk' => $this->merk,
                'jenis' => $this->jenis,
                'kapasitas' => $this->kapasitas,
                'harga' => $this->harga,
                'foto' => $this->foto->hashName(),
            ]);
        }
        session()->flash('success', 'Data Berhasil Diubah !');
        $this->reset();
    }
}
