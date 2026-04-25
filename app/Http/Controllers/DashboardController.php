<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $baseQuery = $user->isAdmin() ? Report::query() : $user->reports();

        $totalReports = $baseQuery->count();
        $resolvedNumber = $baseQuery->where('status', 'resolved')->count();
        $pendingNumber = $baseQuery->where('status', 'pending')->count();
        $inProgressNumber = $baseQuery->where('status', 'in_progress')->count();

        $resolvedReports = $baseQuery->where('status', 'resolved')->get();
        $averageResponse = 0;
        if ($resolvedReports->count()) {
            $averageResponse = round($resolvedReports->avg(function (Report $report) {
                return $report->resolved_at?->diffInMinutes($report->created_at) ?? 0;
            }));
        }

        $recentReports = $baseQuery->latest()->take(5)->get();
        $impactScore = $totalReports ? round(($resolvedNumber / $totalReports) * 100) : 0;
        $roleLabel = $user->isAdmin() ? 'Admin' : 'User';
        $roleDescription = $user->isAdmin()
            ? 'Anda dapat melihat semua laporan, memperbarui status, dan menambah akun admin baru.'
            : 'Anda dapat membuat laporan baru, melihat laporan milik sendiri, dan memantau statusnya.';

        return view('dashboard', compact(
            'totalReports',
            'resolvedNumber',
            'pendingNumber',
            'inProgressNumber',
            'averageResponse',
            'recentReports',
            'impactScore',
            'roleLabel',
            'roleDescription'
        ));
    }
}
