<div class="page-heading">
    <section class="section">
        <div class="card">
            @if (session()->has('success'))
                <div class="alert alert-light-success color-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                <h5 class="card-title">
                    Data Mobil
                </h5>
                <button wire:click="create" class="btn btn-primary" style="margin-left: auto;">Tambah</button>
            </div>
            @if ($addPage)
                @include('mobil.create')
            @endif
            @if ($editPage)
                @include('mobil.edit')
            @endif
            <div class="card-body table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Polisi</th>
                            <th>Merk</th>
                            <th>Jenis</th>
                            <th>Kapasitas</th>
                            <th>Harga</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mobil as $data)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $data->nopolisi }}</td>
                                <td>{{ $data->merk }}</td>
                                <td>{{ $data->jenis }}</td>
                                <td>{{ $data->kapasitas }}</td>
                                <td>@rupiah($data->harga)</td>
                                <td>
                                    <img src="{{ asset('storage/mobil/' . $data->foto) }}" alt="{{ $data->merk }}"
                                        style="width: 100px">
                                </td>
                                <td>
                                    <button class="btn btn-success" wire:click="edit({{ $data->id }})">Edit</button>
                                    <button class="btn btn-danger"
                                        wire:click="destroy({{ $data->id }})">Delete</button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Data Mobil Belum Ada !!</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
                {{ $mobil->links() }}
            </div>
        </div>
    </section>
</div>
