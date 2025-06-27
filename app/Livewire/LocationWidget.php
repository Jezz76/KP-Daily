<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class LocationWidget extends Component
{
    public $city = '';
    public $region = '';
    public $country = '';
    public $ip = '';

    public function mount()
    {
        // Data lokasi default untuk fallback
        $defaultLocation = [
            'city' => 'Jakarta',
            'region' => 'DKI Jakarta',
            'country' => 'Indonesia',
            'ip' => 'Localhost'
        ];
        
        try {
            // Coba beberapa API geolocation
            $apis = [
                'https://ipapi.co/json/',
                'https://api.ipify.org?format=json', // Hanya IP
                'https://httpbin.org/ip', // Hanya IP
            ];

            foreach ($apis as $api) {
                try {
                    $response = Http::timeout(5)->get($api);
                    if ($response->ok()) {
                        $data = $response->json();
                        
                        // Handle ipapi.co response
                        if (isset($data['city']) && isset($data['country_name'])) {
                            $this->city = $data['city'] ?? $defaultLocation['city'];
                            $this->region = $data['region'] ?? $defaultLocation['region'];
                            $this->country = $data['country_name'] ?? $defaultLocation['country'];
                            $this->ip = $data['ip'] ?? $defaultLocation['ip'];
                            return;
                        }
                        // Handle ipify response (hanya IP)
                        elseif (isset($data['ip'])) {
                            $this->city = $defaultLocation['city'];
                            $this->region = $defaultLocation['region'];
                            $this->country = $defaultLocation['country'];
                            $this->ip = $data['ip'];
                            return;
                        }
                        // Handle httpbin response
                        elseif (isset($data['origin'])) {
                            $this->city = $defaultLocation['city'];
                            $this->region = $defaultLocation['region'];
                            $this->country = $defaultLocation['country'];
                            $this->ip = $data['origin'];
                            return;
                        }
                    }
                } catch (\Exception $e) {
                    continue; // Coba API berikutnya
                }
            }
            
            // Jika semua API gagal, gunakan data default
            $this->city = $defaultLocation['city'];
            $this->region = $defaultLocation['region'];
            $this->country = $defaultLocation['country'];
            $this->ip = $defaultLocation['ip'];
            
        } catch (\Exception $e) {
            // Fallback final
            $this->city = $defaultLocation['city'];
            $this->region = $defaultLocation['region'];
            $this->country = $defaultLocation['country'];
            $this->ip = $defaultLocation['ip'];
        }
    }

    public function render()
    {
        return view('livewire.location-widget');
    }
}
