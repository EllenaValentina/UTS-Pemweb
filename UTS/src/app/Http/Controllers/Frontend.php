<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Profile;
use App\Models\Footer;

class Frontend extends Controller
{
    //
    public function home(){
        
        return view ('frontend.index');
    }

    public function Pesanan(){
        $modelfooter = New Footer;
        $datafooter = $modelfooter->get();
        
        return view ('frontend.index');
    }
    public function Reservasi(){
        
        return view ('frontend.index');
    }
}
