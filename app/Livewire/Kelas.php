<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Kelas as ModelKelas;
use Jantinnerezo\LivewireAlert\Enums\Position;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Features\SupportPagination\WithoutUrlPagination;

class Kelas extends Component
{
    use WithPagination, WithoutUrlPagination;

    #[Locked]
    public $kelasID;

    #[Validate('required|min:3')]
    public $nama;

    public $updateMode = false;

    public $query;

    public function updatedQuery()
    {
        // $this->reset();
        $this->resetExcept(['query']);
    }

    private function pesanOK($pesan)
    {

        LivewireAlert::title($pesan)->success()
            ->toast()->withOptions([
                'timerProgressBar' => true,
                'background' => '#22C55E',
                'color' => "#FFFFFF",
            ])->position(Position::TopEnd)->show();
    }

    public function store()
    {
        $this->validate();
        try {
            ModelKelas::create([
                'nama' => $this->nama,
            ]);
            $this->refreshTable();
            $this->pesanOK('Simpan Berhasil');
        } catch (\Exception $e) {
            LivewireAlert::text("Server Sibuk")->error()->show();
            return;
        }
    }

    #[On('ireset')]
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
            $this->pesanOK('Perubahan Berhasil Disimpan.');
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
            $this->pesanOK('Hapus Berhasil.');
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
