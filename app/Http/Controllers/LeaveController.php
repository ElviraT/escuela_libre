<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::all();
        return view('leave.index', compact('leaves'));
    }
    public function create()
    {
        $users = User::all();
        $leaveTypes = LeaveType::all();
        return view('leave.create', compact('users', 'leaveTypes'));
    }
    public function createLeave(Request $request)
    {
        $userId = $request->input('user_id');
        $leaveTypeId = $request->input('leave_type_id');
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $reason = $request->input('reason');

        $user = User::find($userId);
        $leaveType = LeaveType::find($leaveTypeId);

        if (!$user || !$leaveType) {
            Toastr::error('Usuario o tipo de ausencia inválido');
            return redirect()->back();
        }

        $leaveRequest = new Leave();
        $leaveRequest->user_id = $userId;
        $leaveRequest->leave_type_id = $leaveTypeId;
        $leaveRequest->start_date = $startDate;
        $leaveRequest->end_date = $endDate;
        $leaveRequest->reason = $reason;
        $leaveRequest->save();
        Toastr::success('Solicitud de ausencia', 'enviada exitosamente');
        return to_route('leaves');
    }

    public function approveLeave(Request $request, $leaveRequestId)
    {
        $leaveRequest = Leave::find($leaveRequestId);
        if (!$leaveRequest) {
            Toastr::error('Solicitud de ausencia', 'no encontrada');
            return redirect()->back();
        }

        if ($leaveRequest->status != 'pending') {
            Toastr::warning('Solicitud de ausencia', 'ya procesada');
            return redirect()->back();
        }

        $leaveRequest->status = 'approved';
        $leaveRequest->save();

        Toastr::success('Solicitud de ausencia', 'aprobada exitosamente');
        return redirect()->back();
    }

    public function rejectLeave(Request $request, $leaveRequestId)
    {
        $leaveRequest = Leave::find($leaveRequestId);
        if (!$leaveRequest) {
            Toastr::error('Solicitud de ausencia', 'no encontrada');
            return redirect()->back();
        }

        if ($leaveRequest->status != 'pending') {
            Toastr::warning('Solicitud de ausencia', 'ya procesada');
            return redirect()->back();
        }

        $leaveRequest->status = 'rejected';
        $leaveRequest->save();
        Toastr::success('Solicitud de ausencia', 'rechazada exitosamente');
        return redirect()->back();
    }
}
