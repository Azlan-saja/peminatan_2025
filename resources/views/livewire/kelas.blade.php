<div>
    <x-slot name="judul">
        Kelas
    </x-slot>

    <x-modal name="kelas">
        <div class="mt-3 text-center">
            <h1 class="page-title ms-4">
                {{ $updateMode ? 'Ubah Data' : 'Tambah Baru'}}
            </h1>
        </div>
        <hr class="m-4">
        <form x-trap="show" wire:submit="{{ $updateMode ? 'update' : 'store' }}" class="m-4">
            <x-validation-errors />
            <div class="mb-3">
                <input type="text" wire:model="nama" placeholder="Nama Kelas" class="w-100 rounded shadow">
                <x-input-error :messages="$errors->get('nama')" class="mt-2" />
            </div>
            <hr class="my-4">
            <div class="mb-3">

                <button type="submit"
                    class="btn btn-6 {{ $updateMode ? 'btn-warning' : 'btn-primary'}} active btn-pill">
                    {{ $updateMode ? 'Simpan Perubahan' : 'Simpan'}}
                </button>
            </div>
        </form>
    </x-modal>

    <div class="page-body">
        <div class="container-xl my-auto">

            <div class="row mb-4">
                <div class="col">
                    <button x-on:click.prevent="$dispatch('open-modal', 'kelas')"
                        class="btn btn-6 btn-primary active btn-pill"> Tambah Baru </button>
                </div>
                <div class="col text-end">
                    <div class="input-icon">

                        <span class="input-icon-addon">
                            <svg wire:loading.remove wire:target="query" xmlns=" http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="icon icon-1">
                                <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                <path d="M21 21l-6 -6"></path>
                            </svg>
                            <div wire:loading wire:target="query" class="spinner-border spinner-border-sm text-primary"
                                role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </span>
                        <input wire:model.live.debounce.250ms="query" type="search"
                            class="form-control form-control-rounded rounded shadow" placeholder="Cari...">
                    </div>


                </div>
            </div>

            <div class="row row-cards">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kelas</th>
                                        <th class="w-1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $key => $data )
                                    <tr wire:key="{{ $key.$data->id }}">
                                        <td class="fw-bold">{{ $datas->firstItem() + $key }}.</td>
                                        <td class="text-secondary">{{ $data->nama }}</td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <button wire:click="updateId('{{ $data->id }}')"
                                                    class="btn btn-warning">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                        fill="currentColor" class="bi bi-pencil-fill"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z" />
                                                    </svg>
                                                </button>
                                                <button wire:click="deleteId('{{ $data->id }}')" class="btn btn-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                                        <path
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-danger"> kosong
                                        </td>
                                    </tr>

                                    @endforelse
                                </tbody>
                            </table>

                            <div class="card-footer ">

                                {{ $datas->onEachSide(0)->links() }}

                            </div>

                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>
</div>