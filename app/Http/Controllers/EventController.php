<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
   // Method untuk menambahkan Slug dan Asset
    private function prepareEventData($event) 
    {
        // 1. Tambahkan Slug berdasarkan Judul
        $event['slug'] = Str::slug($event['title']);
        return $event;
    }

    public function index()
    {
        // Panggil prepareEventData untuk setiap item
        // $listevent = array_map([$this, 'prepareEventData'], $this->events);
        $listevent = Event::with(['creator','category'])->get()->map(function ($event) {
            return $this->prepareEventData($event);
        });
        return view('front-page.event.index', compact('listevent'), ['title' => 'List Event']);
    }

    public function show($slug) // Menerima $slug, bukan $id
    {
        // 1. Cari event berdasarkan SLUG
        // Kita harus membuat slug saat mencari, karena data asli $this->events belum memiliki slug
        $event = collect(Event::all())->first(function ($event) use ($slug) {
            return Str::slug($event['title']) === $slug;
        });

        if (!$event) {
            abort(404, 'Event tidak ditemukan.');
        }

        // 2. Tambahkan asset() dan slug ke data yang ditemukan sebelum dikirim ke view
        $event = $this->prepareEventData($event);

        return view('front-page.event.show', [
            'detail' => $event,
            'title' => 'Detail Event: ' . $event['title']
        ]);
    }
}