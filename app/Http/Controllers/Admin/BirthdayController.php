<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class BirthdayController extends Controller
{
    public function index()
    {
        // Get users with birthdate, order by nearest birthday
        // (This simple logic orders by month and day)
        $users = User::whereNotNull('birthdate')
            ->orderByRaw('MONTH(birthdate), DAY(birthdate)')
            ->get();

        return view('admin.birthdays.index', compact('users'));
    }
}
