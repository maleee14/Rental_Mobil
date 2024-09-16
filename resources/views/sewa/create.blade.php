<div class="col-md-12 col-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <h5 class="card-title mb-3">
                    Proses Pemesanan
                </h5>
                <form class="form form-horizontal">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="nama" class="form-label">Nama Pemesan</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" wire:model="nama" placeholder="Nama"
                                            id="nama" value="{{ @old('nama') }}">
                                        @error('nama')
                                            <div class="from-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="ponsel" class="form-label">No Ponsel</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" wire:model="ponsel"
                                            placeholder="No Ponsel" id="ponsel" value="{{ @old('ponsel') }}">
                                        @error('ponsel')
                                            <div class="from-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="alamat" class="form-label">Alamat Pemesan</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" wire:model="alamat"
                                            placeholder="Alamat" id="alamat" value="{{ @old('alamat') }}">
                                        @error('alamat')
                                            <div class="from-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="lama" class="form-label">Lama Sewa / Hari</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="number" class="form-control" wire:change="hitung"
                                            wire:model="lama" placeholder="Lama Sewa" id="lama"
                                            value="{{ @old('lama') }}">
                                        @error('lama')
                                            <div class="from-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="tanggal" class="form-label">Tanggal Pemesanan</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="date" class="form-control" wire:model="tgl_pesan"
                                            placeholder="Tanggal" id="tgl_pesan" value="{{ @old('tgl_pesan') }}">
                                        @error('tgl_pesan')
                                            <div class="from-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2 mb-2">
                                Total Pembayaran : @rupiah($total)
                            </div>
                            <div class="col-12 d-flex justify-content-end">

                                <button type="button" wire:click="store"
                                    class="btn btn-primary me-1 mb-1">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
