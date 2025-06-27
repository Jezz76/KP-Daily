<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class WeatherWidget extends Component
{
    public $weather;
    public $description;
    public $icon;
    public $temp;
    public $city = 'Jakarta'; // default city

    public function mount()
    {
        $apiKey = config('services.openweather.key') ?? env('OPENWEATHER_API_KEY');
        if (!$apiKey) {
            $this->weather = 'Clear';
            $this->description = 'cerah';
            $this->icon = '01d';
            $this->temp = 28;
            return;
        }
        // Coba dengan timeout dan headers yang lebih eksplisit
        $response = \Illuminate\Support\Facades\Http::timeout(30)
            ->withHeaders([
                'User-Agent' => 'KP-DailyLog/1.0'
            ])
            ->get("https://api.openweathermap.org/data/2.5/weather", [
                'q' => $this->city,
                'appid' => $apiKey,
                'units' => 'metric',
                'lang' => 'id',
            ]);
        if ($response->ok()) {
            $data = $response->json();
            $this->weather = $data['weather'][0]['main'] ?? '-';
            $this->description = $data['weather'][0]['description'] ?? '-';
            $this->icon = $data['weather'][0]['icon'] ?? null;
            $this->temp = $data['main']['temp'] ?? null;
        } else {
            // Jika API gagal, gunakan data mock sementara
            $this->weather = 'Clear';
            $this->description = 'cerah';
            $this->icon = '01d';
            $this->temp = 28;
        }
    }

    public function render()
    {
        return view('livewire.weather-widget');
    }
}
