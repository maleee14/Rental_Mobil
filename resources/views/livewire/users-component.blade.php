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
                    Data Users
                </h5>
                <button wire:click="create" class="btn btn-primary" style="margin-left: auto;">Tambah</button>
            </div>
            @if ($addPage)
                @include('users.create')
            @endif
            @if ($editPage)
                @include('users.edit')
            @endif
            <div class="card-body table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $data)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->role }}</td>
                                <td>
                                    <button class="btn btn-success" wire:click="edit({{ $data->id }})">Edit</button>
                                    <button class="btn btn-danger"
                                        wire:click="destroy({{ $data->id }})">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $user->links() }}
            </div>
        </div>
    </section>
</div>
