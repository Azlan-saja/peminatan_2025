<div>
    <x-slot name="judul">
        Kelas
    </x-slot>

    <x-modal name="kelas">
        <form wire:submit="{{ $updateMode ? 'update' : 'store' }}" class="m-4">

            <div class="mb-3 text-center">
                <h2 class="page-title">{{ $updateMode ? 'Ubah Data' : 'Tambah Baru'}}</h2>
            </div>
            <hr class="my-4">
            <x-validation-errors />
            <div class="mb-3">
                <input type="text" wire:model="nama" placeholder="Nama Kelas" class="w-100 rounded shadow">
                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
            </div>
            <hr class="my-4">
            <div class="mb-3">

                <button type="submit" class="btn btn-6 btn-primary active btn-pill">
                    {{ $updateMode ? 'Simpan Perubahan' : 'Simpan'}}
                </button>
            </div>
        </form>
    </x-modal>

    <div class="page-body">
        <div class="container-xl my-auto">

            <div class="row">
                <div class="col">
                    <button x-on:click.prevent="$dispatch('open-modal', 'kelas')"
                        class="btn btn-6 btn-primary active btn-pill"> Tambah Baru </button>
                </div>
                <div class="col">
                    <input wire:model.live.debounce.250ms="query" type="search"
                        class="form-control form-control-rounded mb-4 rounded shadow" placeholder="Cari...">
                </div>
            </div>

            <div class="row pb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Kelas</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-selectable card-table table-vcenter text-nowrap datatable">
                                <thead>
                                    <tr>

                                        <th class="w-1">
                                            No.
                                        </th>
                                        <th>Nama Kelas</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $key => $data )
                                    <tr wire:key="{{ $data->id }}" wire:transition>
                                        <td><span class="text-secondary">{{ $datas->firstItem() + $key }}.</span></td>
                                        <td>{{ $data->nama }}</td>
                                        <td class="text-end">
                                            <span class="dropdown">
                                                <button class="btn dropdown-toggle align-text-top"
                                                    data-bs-boundary="viewport" data-bs-toggle="dropdown">Aksi</button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <button wire:click="updateId('{{ $data->id }}')"
                                                        class="dropdown-item"> Edit </button>
                                                    <button wire:click="deleteId('{{ $data->id }}')"
                                                        class="dropdown-item"> Hapus </button>
                                                </div>
                                            </span>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3"> kosong
                                        </td>
                                    </tr>

                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer d-flex align-items-center">

                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>
</div>