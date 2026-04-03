<?php

namespace App\Controllers;

class Page extends BaseController
{
    public function about()
    {
        return "Halaman About";
    }

    public function contact()
    {
        return "Halaman Contact";
    }

    public function faqs()
    {
        return "Halaman FAQs";
    }

    public function tos()
    {
        return "Halaman Terms of Service";
    }
}