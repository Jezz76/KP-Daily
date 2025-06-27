<?php

namespace App\Livewire;

use Livewire\Component;
use Exception;

class MotivationWidget extends Component
{
    public $quote = '';
    public $author = '';
    public $isLoading = false;

    private $localQuotes = [
        ['quote' => 'Kesuksesan adalah hasil dari persiapan, kerja keras, dan belajar dari kegagalan.', 'author' => 'Colin Powell'],
        ['quote' => 'Jangan menunggu kesempatan, tetapi ciptakanlah kesempatan itu.', 'author' => 'George Bernard Shaw'],
        ['quote' => 'Yang terpenting bukanlah berapa lama kita hidup, tetapi bagaimana kita menggunakan waktu yang ada.', 'author' => 'Bruce Lee'],
        ['quote' => 'Kerja keras mengalahkan bakat ketika bakat tidak bekerja keras.', 'author' => 'Tim Notke'],
        ['quote' => 'Masa depan milik mereka yang percaya pada keindahan mimpi mereka.', 'author' => 'Eleanor Roosevelt'],
        ['quote' => 'Kegagalan adalah kesempatan untuk memulai lagi dengan lebih cerdas.', 'author' => 'Henry Ford'],
        ['quote' => 'Tidak ada yang mustahil, kata itu sendiri mengatakan I am possible.', 'author' => 'Audrey Hepburn'],
        ['quote' => 'Pendidikan adalah senjata paling ampuh yang bisa kamu gunakan untuk mengubah dunia.', 'author' => 'Nelson Mandela'],
        ['quote' => 'Jangan takut gagal, takutlah tidak mencoba.', 'author' => 'Unknown'],
        ['quote' => 'Setiap pencapaian besar dimulai dengan keputusan untuk mencoba.', 'author' => 'John F. Kennedy']
    ];

    public function mount()
    {
        $this->loadQuote();
    }

    public function loadQuote()
    {
        $this->isLoading = true;
        
        // Try multiple APIs
        $quote = $this->fetchFromZenQuotes() ?? 
                 $this->fetchFromQuotable() ?? 
                 $this->fetchFromQuoteGarden() ?? 
                 $this->getLocalQuote();
        
        $this->quote = $quote['quote'];
        $this->author = $quote['author'];
        $this->isLoading = false;
    }

    private function fetchFromZenQuotes()
    {
        try {
            $response = file_get_contents('https://zenquotes.io/api/today', false, stream_context_create([
                'http' => [
                    'timeout' => 5,
                    'method' => 'GET',
                    'header' => 'User-Agent: KP-DailyLog/1.0'
                ]
            ]));
            
            if ($response) {
                $data = json_decode($response, true);
                if (isset($data[0]['q']) && isset($data[0]['a'])) {
                    return [
                        'quote' => $data[0]['q'],
                        'author' => $data[0]['a']
                    ];
                }
            }
        } catch (Exception $e) {
            // Silent fail, try next API
        }
        
        return null;
    }

    private function fetchFromQuotable()
    {
        try {
            $response = file_get_contents('https://api.quotable.io/random?minLength=50&maxLength=200', false, stream_context_create([
                'http' => [
                    'timeout' => 5,
                    'method' => 'GET',
                    'header' => 'User-Agent: KP-DailyLog/1.0'
                ]
            ]));
            
            if ($response) {
                $data = json_decode($response, true);
                if (isset($data['content']) && isset($data['author'])) {
                    return [
                        'quote' => $data['content'],
                        'author' => $data['author']
                    ];
                }
            }
        } catch (Exception $e) {
            // Silent fail, try next API
        }
        
        return null;
    }

    private function fetchFromQuoteGarden()
    {
        try {
            $response = file_get_contents('https://quote-garden.herokuapp.com/api/v3/quotes/random', false, stream_context_create([
                'http' => [
                    'timeout' => 5,
                    'method' => 'GET',
                    'header' => 'User-Agent: KP-DailyLog/1.0'
                ]
            ]));
            
            if ($response) {
                $data = json_decode($response, true);
                if (isset($data['data']['quoteText']) && isset($data['data']['quoteAuthor'])) {
                    return [
                        'quote' => trim($data['data']['quoteText'], '"'),
                        'author' => $data['data']['quoteAuthor']
                    ];
                }
            }
        } catch (Exception $e) {
            // Silent fail, use local quote
        }
        
        return null;
    }

    private function getLocalQuote()
    {
        return $this->localQuotes[array_rand($this->localQuotes)];
    }

    public function refreshQuote()
    {
        $this->loadQuote();
    }

    public function render()
    {
        return view('livewire.motivation-widget');
    }
}
