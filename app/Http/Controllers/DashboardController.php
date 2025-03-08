<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Staff;
use App\Models\Appointment;

class DashboardController extends Controller
{
    public function getDashboardData()
    {
        $totalAppointments = Appointment::count();
        $totalUsers = User::count();
        $totalStaff = Staff::count();

        return response()->json([
            'status' => 'success',
            'total_appointments' => $totalAppointments,
            'total_users' => $totalUsers,
            'total_staff' => $totalStaff,
        ]);
    }
}
