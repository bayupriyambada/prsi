<?php

namespace App\Filament\Pages;

use Filament\Forms;
use App\Models\Setting;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;


class Settings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.settings';

    public ?string $name;
    public ?string $description;
    public ?string $logo = null;
    public ?string $address;
    public ?string $phone;
    public ?string $email;
    public ?array $social_links = [];

    // mount?

    public function mount()
    {
        // Ambil pengaturan dari database
        $setting = Setting::find(1); // Pastikan ID 1 ada dalam database

        if ($setting) {
            $this->name = $setting->name;
            $this->description = $setting->description;
            $this->logo = $setting->logo ?? null; // Ini bisa null jika tidak ada logo
            $this->address = $setting->address;
            $this->phone = $setting->phone;
            $this->email = $setting->email;
            $this->social_links = json_decode($setting->social_links, true); // Decode JSON menjadi array
        } else {
            $this->name = config('app.name');
            $this->description = null;
            $this->logo = null;
            $this->address = null;
            $this->phone = null;
            $this->email = null;
            $this->social_links = [];
        }
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label('Site Name')
                ->required()
                ->default(config('app.name')),
            Textarea::make('description')
                ->label('Site Description')
                ->rows(3),
            TextInput::make('address')
                ->label('Address'),
            TextInput::make('phone')
                ->label('Phone'),
            TextInput::make('email')
                ->label('Email'),
            Repeater::make('social_links')
                ->label('Social Links')
                ->schema([
                    Select::make('name')
                        ->options([
                            'facebook' => 'Facebook',
                            'twitter' => 'Twitter',
                            'instagram' => 'Instagram',
                            'youtube' => 'Youtube',
                            'linkedin' => 'Linkedin',
                            'pinterest' => 'Pinterest',
                            'github' => 'Github',
                            'whatsapp' => 'Whatsapp',
                            'telegram' => 'Telegram',
                        ])
                        ->required(), // Pastikan memilih sosial media
                    TextInput::make('url')
                        ->label('URL')
                        ->required(),
                ])
                ->columns(2)
                ->required(),
        ];
    }

    public function save()
    {
        // Validasi input
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'logo' => 'nullable|image|max:1024',
            'social_links.*.name' => 'required|string',
            'social_links.*.url' => 'required|url',
        ]);

        // Simpan konfigurasi ke file config
        config(['app.name' => $this->name]);
        config(['app.description' => $this->description]);

        // Jika ada logo baru, upload
        $logoPath = null;
        if ($this->logo) {
            $logoPath = $this->logo->store('logos', 'public'); // Simpan logo ke storage
        }

        // Simpan pengaturan ke database
        Setting::updateOrCreate(
            ['id' => 1], // Menggunakan ID 1 untuk contoh, pastikan ada di database
            [
                'name' => $this->name,
                'description' => $this->description,
                'logo' => $logoPath,
                'address' => $this->address,
                'phone' => $this->phone,
                'email' => $this->email,
                'social_links' => json_encode($this->social_links), // Simpan sosial links sebagai JSON
            ]
        );


        // Setelah menyimpan pengaturan
        Notification::make()
            ->title('Success')
            ->success() // Atur level notifikasi
            ->body('Settings saved successfully!')
            ->send();
    }
}
