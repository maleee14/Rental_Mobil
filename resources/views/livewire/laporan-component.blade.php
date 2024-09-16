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
                <h5 class="card-title">Laporan Transaksi</h5>
                <div class="row pt-3 d-flex justify-content-center align-items-center">
                    <div class="col-md-5">
                        <input type="date" wire:model="tanggal1" class="form-control">
                    </div>
                    --
                    <div class="col-md-5">
                        <input type="date" wire:model="tanggal2" class="form-control">
                    </div>
                    <div class="col-md-1">
                        <button class="btn btn-primary" wire:click="cari">Filter</button>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Polisi</th>
                            <th>Nama Pemesan</th>
                            <th>Alamat</th>
                            <th>Lama Sewa</th>
                            <th>Tanggal Sewa</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($transaksi as $data)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $data->mobil->nopolisi }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->lama }} Hari</td>
                                <td>{{ $data->tgl_pesan }}</td>
                                <td>@rupiah($data->total)</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Data Laporan Belum Ada !!</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                {{ $transaksi->links() }}
                <button class="btn btn-primary" wire:click="exportpdf">Export PDF</button>
            </div>
        </div>
    </section>
</div>
