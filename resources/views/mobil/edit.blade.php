<div class="col-md-6 col-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <h5 class="card-title mb-3">
                    Edit Mobil
                </h5>
                <form class="form form-horizontal">
                    @csrf
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="nopolisi" class="form-label">No Polisi</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" wire:model="nopolisi"
                                            placeholder="No Polisi" id="nopolisi" value="{{ @old('nopolisi') }}">
                                        @error('nopolisi')
                                            <div class="from-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="merk" class="form-label">Merk</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" wire:model="merk" placeholder="Merk"
                                            id="nopolisi" value="{{ @old('merk') }}">
                                        @error('merk')
                                            <div class="from-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="jenis" class="form-label">Jenis</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group has-icon-left">
                                    <div class="position-relative">
                                        <select id="jenis" class="form-select" wire:model="jenis">
                                            <option value="">--Pilih--</option>
                                            <option value="Sedan">Sedan</option>
                                            <option value="MVP">MVP</option>
                                            <option value="SUV">SUV</option>
                                        </select>
                                        @error('jenis')
                                            <div class="from-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="email-horizontal-icon" class="form-label">Kapasitas</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" wire:model="kapasitas"
                                            placeholder="Kapasitas" id="kapasitas" value="{{ @old('kapasitas') }}">
                                        @error('kapasitas')
                                            <div class="from-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="email-horizontal-icon" class="form-label">Harga</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" wire:model="harga"
                                            placeholder="Harga" id="harga" value="{{ @old('harga') }}">
                                        @error('harga')
                                            <div class="from-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="email-horizontal-icon" class="form-label">Foto Mobil</label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <input type="file" class="form-control" wire:model="foto" id="foto"
                                            value="{{ @old('foto') }}">
                                        @error('foto')
                                            <div class="from-text text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="button" wire:click="update"
                                    class="btn btn-primary me-1 mb-1">Edit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
