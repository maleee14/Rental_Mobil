<div class="page-heading">
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Daftar Mobil
                </h5>
                <div class="card-body table-responsive">
                    <div class="row">
                        @foreach ($mobil as $data)
                            <div class="col-xl-4 col-md-4 col-sm-12">
                                <div class="card">
                                    <div class="card-content">
                                        <img src="{{ asset('storage/mobil/' . $data->foto) }}"
                                            class="card-img-top img-fluid" alt="singleminded">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $data->merk }}</h5>
                                            <ul class="list-group list-group-flush" style="font-size: 97%">
                                                <li class="list-group-item">No Polisi : {{ $data->nopolisi }}</li>
                                                <li class="list-group-item">Harga : @rupiah($data->harga)</li>
                                                <li class="list-group-item">Kapasitas : {{ $data->kapasitas }}</li>
                                            </ul>
                                            <button wire:click="create({{ $data->id }}, {{ $data->harga }})"
                                                class="btn btn-success card-link mt-2">Pesan Mobil</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $mobil->links() }}
                </div>
                @if (session()->has('success'))
                    <div class="alert alert-light-success color-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-light-danger color-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if ($addPage)
                    @include('sewa.create')
                @endif
            </div>
    </section>
</div>
