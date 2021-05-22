<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:superadmin|admin|investor|partner']);
    }

    public function index()
    {
        if(\Auth::user()->hasRole('superadmin'))
        {
            return "superadmin";
        } elseif (\Auth::user()->hasRole('admin')) {
            return view('admin.dashboard');
        } elseif (\Auth::user()->hasRole('investor')) {
            return "investor";
        } elseif (\Auth::user()->hasRole('partner')) {
            return view('partner.dashboard');
        }
    }
    
    public function faq()
    {
        if(\Auth::user()->hasRole('superadmin'))
        {
            return "faq superadmin";
        } elseif (\Auth::user()->hasRole('admin')) {
            return view('admin.faq');
        } elseif (\Auth::user()->hasRole('investor')) {
            return "faq investor";
        } elseif (\Auth::user()->hasRole('partner')) {
            return view('partner.faq');
        }
    }
}
