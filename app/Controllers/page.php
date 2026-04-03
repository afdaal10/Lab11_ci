<?php
namespace App\Controllers;

class Page extends BaseController
{
    public function about()
    {
        return view('about', [
            'title' => 'Halaman About',
            'content' => 'Ini adalah halaman about yang menjelaskan tentang isi halaman ini.'
        ]);
    }

    public function contact()
    {
        return view('about', [
            'title' => 'Halaman Kontak',
            'content' => 'Ini adalah halaman kontak. Silakan hubungi kami di sini.'
        ]);
    }

    public function faqs()
    {
        return view('about', [
            'title' => 'Halaman FAQ',
            'content' => 'Ini adalah halaman FAQ (Frequently Asked Questions).'
        ]);
    }
    public function artikel()
    {
    return view('about', [
        'title' => 'Halaman Artikel',
        'content' => 'Ini adalah halaman artikel yang akan berisi daftar tulisan atau berita.'
    ]);
    }
    
}