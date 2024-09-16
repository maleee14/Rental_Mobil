<?php

namespace App\Livewire;

use App\Models\Mobil;
use App\Models\Transaksi;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class TransaksiComponent extends Component
{
    use WithPagination, WithoutUrlPagination;

    protected $paginationTheme = 'bootstrap';
    public $addPage, $editPage = false;
    public $nama, $ponsel, $alamat, $lama, $tgl_pesan, $mobil_id, $harga, $total, $mobil2;

    public function render()
    {
        $data['mobil'] = Mobil::paginate(3);
        return view('livewire.transaksi-component', $data);
    }

    public function create($id, $harga)
    {
        $this->mobil_id = $id;
        $this->harga = $harga;
        $this->addPage = true;
        $this->editPage = false;
    }

    public function hitung()
    {
        $lama = $this->lama;
        $harga = $this->harga;
        $this->total = $lama * $harga;
    }

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'ponsel' => 'required',
            'alamat' => 'required',
            'lama' => 'required',
            'tgl_pesan' => 'required',
        ], [
            'nama.required' => 'Nama Tidak Boleh Kosong',
            'ponsel.required' => 'Ponsel Tidak Boleh Kosong',
            'alamat.required' => 'Alamat Tidak Boleh Kosong',
            'lama.required' => 'Waktu Sewa Tidak Boleh Kosong',
            'tgl_pesan.required' => 'Tanggal Tidak Boleh Kosong',
        ]);

        $cari = Transaksi::where('mobil_id', $this->mobil_id)
            ->where('tgl_pesan', $this->tgl_pesan)
            ->where('status', '!=', 'SELESAI')->count();

        if ($cari == 1) {
            session()->flash('error', 'Mobil Sudah Dipesan !! Silahkan Pilih Mobil Lain');
        } else {
            Transaksi::create([
                'user_id' => auth()->user()->id,
                'mobil_id' => $this->mobil_id,
                'nama' => $this->nama,
                'ponsel' => $this->ponsel,
                'alamat' => $this->alamat,
                'lama' => $this->lama,
                'tgl_pesan' => $this->tgl_pesan,
                'total' => $this->total,
                'status' => 'WAIT',

            ]);

            session()->flash('success', 'Pemesanan Berhasil Di Proses');
        }

        $this->dispatch('lihat-transaksi');
        $this->reset();
    }
}
