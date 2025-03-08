<?php

namespace App\Http\Controllers;
use App\Mail\AppointmentBookedNotification;
use App\Mail\SpaOwnerNotification;
use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{

    // This is for all users
    public function getAllAppointments()
    {
        $appointments = Appointment::with(['user', 'staff', 'services'])->paginate(12);
    
        if ($appointments->isEmpty()) {
            return response()->json(['message' => 'No appointments found'], 404);
        }
    
        return response()->json($appointments);
    }
    
    // This is for a single user

    public function getAppointments($userId)
{
    // Fetch paginated appointments with related services
    $appointments = Appointment::where('user_id', $userId)
        ->with('services:id,name')
        ->paginate(10)
        ->through(function ($appointment) {
            return [
                'date' => $appointment->date,
                'time' => $appointment->time,
                'services' => $appointment->services->pluck('name')
            ];
        });

    return response()->json($appointments);
}


    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
         
    

     public function store(Request $request)
{
    try {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'staff_id' => ['nullable', 'exists:staff,id'],
            'date' => 'required|date',
            'time' => 'required',
            'service_id' => 'required|array',
        ]);

        // Log request data for debugging
        \Log::info('Validated Data:', $validated);

        $user = User::findOrFail($validated['user_id']);

        $appointment = Appointment::create([
            'user_id' => $validated['user_id'],
            'staff_id' => $validated['staff_id'],
            'date' => $validated['date'],
            'time' => $validated['time'],
        ]);

        $appointment->services()->attach($validated['service_id']);

        // Debugging the email
        \Log::info('Sending email to:', ['email' => $user->email]);
        
        Mail::to($user->email)->send(new AppointmentBookedNotification($appointment));

        // Send email notification to the spa owner
         $spaOwnerEmail = "edwin.akhwale@aln.africa"; // Replace with actual spa owner email
         Mail::to($spaOwnerEmail)->send(new SpaOwnerNotification($appointment));






        return response()->json([
            'message' => 'Appointment added successfully, confirmation email sent!',
        ]);

    } catch (\Throwable $e) {
        \Log::error('Error in storing appointment: ' . $e->getMessage());
        return response()->json([
            'error' => 'Something went wrong: ' . $e->getMessage(),
        ], 500);
    }
}






    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
