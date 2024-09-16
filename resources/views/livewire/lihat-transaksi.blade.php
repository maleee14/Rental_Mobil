<div class="page-heading">
    <section class="section">
        <div class="card">
            @if (session()->has('success'))
                <div class="alert alert-light-success color-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-header">
                <h5 class="card-title">
                    Data Transaksi
                </h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped" id="table1" style="font-size: 93%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Polisi</th>
                            <th>Merk</th>
                            <th>Nama</th>
                            <th>Ponsel</th>
                            <th>Alamat</th>
                            <th>Lama</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Proses</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksi as $data)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $data->mobil->nopolisi }}</td>
                                <td>{{ $data->mobil->merk }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->ponsel }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->lama }} Hari</td>
                                <td>{{ $data->tgl_pesan }}</td>
                                <td>@rupiah($data->total)</td>
                                <td>{{ $data->status }}</td>
                                <td>
                                    @switch($data->status)
                                        @case('WAIT')
                                            <button class="btn btn-success"
                                                wire:click="proses({{ $data->id }})">PROSES</button>
                                        @break

                                        @case('PROSES')
                                            <button class="btn btn-success"
                                                wire:click="selesai({{ $data->id }})">SELESAI</button>
                                        @break

                                        @default
                                            <h5 class="text-center">-</h5>
                                    @endswitch
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7">Data Mobil Belum Ada !!</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                    {{ $transaksi->links() }}
                </div>
            </div>
        </section>
    </div>
