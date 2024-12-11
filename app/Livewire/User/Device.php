<?php

namespace App\Livewire\User;

use App\Models\Device as ModelsDevice;
use App\Models\User;
use Carbon\Carbon;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;

class Device extends Component
{
    #[Validate('required')]
    public $name;
    public $uuid, $createDate;
    public $succesAlert = false;

    public $qrCode;
    public $viewQr = false;

    public function mount(ModelsDevice $device)
    {
        $this->name = $device->name;
        $this->uuid = $device->id;
        $this->createDate = $device->created_at;
    }

    public function render()
    {
        return view('devices.view');
    }

    public function store()
    {
        $this->validate();


        $device = ModelsDevice::updateOrCreate(
            ["id" => $this->uuid],
            [
                "name" => $this->name,
                "user_id" => Auth::user()->id
            ]
        );

        $user = User::updateOrCreate(["id" => Auth::user()->id], ["current_device_id" => $device->id]);

        $this->uuid = $device->id;
        $this->createDate = Carbon::parse($device->created_at)->format('d/m/Y');
        return redirect()->to(route('home'));
    }

    public function viewQrCode()
    {
        $writer = new PngWriter();

        $qrCode = QrCode::create($this->uuid)->setSize(500);
        $logo = Logo::create(asset('assets/img/WaterWise/logo-white.png'))
            ->setResizeToWidth(100)->setPunchoutBackground(true);
        $result = $writer->write($qrCode, $logo);
        $this->qrCode = $result->getDataUri();

        $this->viewQr = true;
    }
}
