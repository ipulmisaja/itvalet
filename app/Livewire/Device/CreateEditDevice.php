<?php

namespace App\Livewire\Device;

use App\Livewire\Forms\DeviceForm;
use App\Models\Device;
use App\Models\DeviceState;
use App\Models\DeviceMaintenance;
use App\Traits\HasRenderOption;
use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateEditDevice extends Component
{
    use HasRenderOption, WithFileUploads;

    #[Locked]
    public $pageTitle;

    public DeviceForm $form;

    public Device $device;

    #[Locked]
    public $routeName;

    #[Locked]
    public $procurementOption = "<option value='Pusat'>Pusat</option><option value='Daerah'>Daerah</option>";

    public bool $modal = false;

    #[Computed]
    public function brands()
    {
        return $this->renderOption(
            $this->getOptionForRender(app(Device::class), ['brand as id', 'brand'])
        );
    }

    #[Computed]
    public function types()
    {
        return $this->renderOption(
            $this->getOptionForRender(app(Device::class), ['type as id', 'type'])
        );
    }

    #[Computed]
    public function operatingSystem()
    {
        return $this->renderOption(
            $this->getOptionForRender(app(Device::class), ['operating_system as id', 'operating_system'])
        );
    }

    public function mount(Device $device)
    {
        $this->routeName = Route::currentRouteName();

        if ($this->routeName === 'device.edit') {
            // Set Title
            $this->pageTitle = "Edit Informasi Perangkat";

            // Set Form Value
            $this->device                = $device;
            $this->form->name            = $device->name;
            $this->form->serial          = $device->serial ?? null;
            $this->form->brand           = $device->brand;
            $this->form->deviceType      = $device->type;
            $this->form->os              = $device->operating_system ?? null;
            $this->form->procurementDate = $device->procurement_period->format('Y-m-d');
            $this->form->procurementType = $device->procurement_type;
            $this->form->bmn_number      = $device->bmn_number ?? null;
        } else {
            $this->pageTitle = "Perangkat Baru";
        }
    }

    public function render(): View
    {
        return view("livewire.device.create-edit-device")->title($this->pageTitle);
    }

    public function submitData()
    {
        $this->dispatch('validate');

        if ($this->routeName === 'device.edit') {
            $result = $this->form->update($this->device);

            $route = route('device-state');
        } else {
            $result = $this->form->save();

            $route = route('device');
        }

        // Send notification to redirect page.
        session()->flash('messages', $result);

        $this->redirect($route);
    }

    public function deleteItem(): void
    {
        $this->modal = true;
    }

    public function confirmDelete()
    {
        // Delete Device Maintenance
        DeviceMaintenance::where('device_id', $this->device->id)->delete();

        // Delete Device State
        DeviceState::where('device_id', $this->device->id)->delete();

        // Delete Device
        Device::where('id', $this->device->id)->delete();

        $this->modal = false;

        return $this->redirect(route('device-state'));
    }
}
