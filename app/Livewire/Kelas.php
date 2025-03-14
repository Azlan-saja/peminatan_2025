<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kelas as ModelKelas;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportPagination\WithoutUrlPagination;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\On;

class Kelas extends Component
{
    use WithPagination;

    #[Locked]
    public $kelasID;

    #[Validate('required|min:3')]
    public $nama;

    public $updateMode = false;

    public $query;

    public function store()
    {
        $this->validate();
        try {
            ModelKelas::create([
                'nama' => $this->nama,
            ]);
            $this->refreshTable();
            LivewireAlert::text('Simpan berhasil!')->success()->show();
        } catch (\Exception $e) {
            LivewireAlert::text("Server Sibuk")->error()->show();
            return;
        }
    }

    #[On('ireset')]
    public function ireset()
    {
        $this->reset();
    }

    public function refreshTable()
    {
        $this->dispatch('close-modal', 'kelas');
        $this->reset();
    }

    public function updateId($id)
    {
        $this->resetValidation();
        $kelas = ModelKelas::findOrFail($id);

        $this->updateMode = true;

        $this->kelasID = $id;
        $this->nama = $kelas->nama;


        $this->dispatch('open-modal', 'kelas');
    }

    public function update()
    {
        $this->validate();
        try {
            $kelas = ModelKelas::where('id', $this->kelasID)->firstOrFail();
            $kelas->update([
                'nama' => $this->nama,
            ]);
            LivewireAlert::text('Perubahan Berhasil Disimpan.')->success()->show();
            $this->refreshTable();
        } catch (\Exception $e) {
            LivewireAlert::text("Server Sibuk")->error()->show();
            return;
        }
    }

    public function deleteId($id)
    {
        $this->kelasID = $id;
        LivewireAlert::title('Hapus')
            ->text('Hapus data terpilih?')
            ->question()
            ->timer(6000)
            ->withConfirmButton('Hapus')
            ->confirmButtonColor('red')
            ->withCancelButton('Tidak')
            ->onConfirm('confirmedhapus')
            ->show();
    }


    public function confirmedhapus()
    {
        try {
            ModelKelas::where('id', $this->kelasID)
                ->delete();
            $this->reset();
            LivewireAlert::text('Hapus Berhasil')->success()->show();
        } catch (\Exception $e) {
            LivewireAlert::text("Server Sibuk")->error()->show();
            return;
        }
    }

    public function search()
    {
        $this->resetPage();
    }

    public function render()
    {
        $kelass = ModelKelas::select([
            'id',
            'nama',
        ])
            ->whereAny([
                'nama',
            ], 'like', '%' . $this->query . '%')
            ->latest()
            ->paginate(5);
        return view(
            'livewire.kelas',
            [
                'datas' => $kelass,
            ],
        );
    }
}
