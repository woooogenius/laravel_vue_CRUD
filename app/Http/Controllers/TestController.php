<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use function Termwind\render;

class TestController extends Controller
{
    Public function test() {
        return Inertia::render('Welcome');
    }
    Public function test2() {
        return Inertia::render('TestPage');
    }
}
