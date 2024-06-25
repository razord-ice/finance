<?php

namespace App\Http\Controllers\Admin;

/**
 * ErrorController
 */
class ErrorController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        return view('admin.error.index');
    }
}
