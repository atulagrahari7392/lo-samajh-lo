<?php

namespace App\Services;

use App\Models\Certificate;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CertificateService
{
    /**
     * Generate a certificate for a user based on a course or test completion.
     */
    public function generate(User $user, string $type, $referenceModel = null): Certificate
    {
        $certificateNumber = strtoupper(Str::random(10) . '-' . date('Y'));
        
        // Data for the view
        $data = [
            'user' => $user,
            'certificate_number' => $certificateNumber,
            'date' => now()->format('F j, Y'),
            'type' => $type,
        ];

        if ($type === 'course_completion' && $referenceModel) {
            $data['course'] = $referenceModel;
            $data['title'] = 'Certificate of Completion';
            $data['description'] = 'has successfully completed the course ' . $referenceModel->title;
        } elseif ($type === 'test_achievement' && $referenceModel) {
            $data['test'] = $referenceModel;
            $data['title'] = 'Certificate of Achievement';
            $data['description'] = 'has successfully passed the ' . $referenceModel->title . ' test';
        }

        // Generate PDF
        $pdf = Pdf::loadView('pdf.certificate', $data)
            ->setPaper('a4', 'landscape');

        // Save PDF to storage
        $fileName = 'certificates/' . $certificateNumber . '.pdf';
        Storage::disk('public')->put($fileName, $pdf->output());

        // Create Database Record
        return Certificate::create([
            'user_id' => $user->id,
            'course_id' => $type === 'course_completion' ? $referenceModel->id : null,
            'test_id' => $type === 'test_achievement' ? $referenceModel->id : null,
            'type' => $type,
            'certificate_number' => $certificateNumber,
            'issued_at' => now(),
            'pdf_url' => Storage::disk('public')->url($fileName),
        ]);
    }
}
