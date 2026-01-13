<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Spatie\Browsershot\Browsershot;

class IdCardController extends Controller
{
    public function index()
    {
        $asesi = auth()->user();
        $qrValue = route('user.download', $asesi->id);

        return view('pages.asesi.id_card', compact('asesi', 'qrValue'));
    }

    // ⬇️ INI YANG BELUM ADA
    public function download()
    {
        $asesi = Auth::user();
        $qrValue = route('user.download', $asesi->id);

        $html = view('pages.asesi.id_card_print', compact('asesi', 'qrValue'))->render();

        $filePath = storage_path('app/idcard_' . $asesi->id . '.png');

        Browsershot::html($html)
            ->windowSize(360, 520)
            ->save($filePath);

        return response()->download($filePath)->deleteFileAfterSend();
    }
}
