<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate of Completion</title>
    <!-- We inline essential styles for PDF generation compatibility -->
    <style>
        body {
            font-family: 'Georgia', serif;
            margin: 0;
            padding: 0;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .certificate-container {
            width: 800px;
            height: 600px;
            background-color: white;
            border: 20px solid #1e3a8a; /* Indigo-900 */
            position: relative;
            box-sizing: border-box;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .certificate-inner {
            border: 2px solid #fbbf24; /* Amber-400 */
            margin: 10px;
            height: calc(100% - 24px);
            padding: 40px;
            box-sizing: border-box;
            text-align: center;
            position: relative;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #1e3a8a;
            margin-bottom: 20px;
            font-family: 'Arial', sans-serif;
            text-transform: uppercase;
            letter-spacing: 2px;
        }
        .title {
            font-size: 48px;
            color: #1f2937;
            margin-bottom: 10px;
            font-weight: bold;
            letter-spacing: 4px;
        }
        .subtitle {
            font-size: 18px;
            color: #4b5563;
            margin-bottom: 40px;
            font-style: italic;
        }
        .presented-to {
            font-size: 16px;
            color: #6b7280;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .student-name {
            font-size: 42px;
            color: #111827;
            border-bottom: 2px solid #e5e7eb;
            display: inline-block;
            padding-bottom: 10px;
            margin-bottom: 30px;
            min-width: 400px;
            font-style: italic;
        }
        .course-description {
            font-size: 16px;
            color: #4b5563;
            margin-bottom: 10px;
        }
        .course-name {
            font-size: 28px;
            color: #1e40af;
            font-weight: bold;
            margin-bottom: 40px;
        }
        .footer {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
            padding: 0 50px;
        }
        .signature-section {
            text-align: center;
            width: 200px;
        }
        .signature-line {
            border-bottom: 1px solid #111827;
            margin-bottom: 10px;
            height: 40px;
        }
        .signature-text {
            font-size: 14px;
            color: #4b5563;
            font-family: 'Arial', sans-serif;
        }
        .badge {
            position: absolute;
            bottom: 40px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 80px;
            background: #fbbf24;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            border: 4px solid #fff;
        }
        .badge::after {
            content: "★";
            font-size: 36px;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <div class="certificate-inner">
            <div class="logo">Lo Samajh Lo</div>
            <div class="title">CERTIFICATE</div>
            <div class="subtitle">OF COMPLETION</div>
            
            <div class="presented-to">This is proudly presented to</div>
            <div class="student-name">{{ $studentName ?? 'Student Name' }}</div>
            
            <div class="course-description">for successfully completing the course</div>
            <div class="course-name">{{ $courseName ?? 'Course Name' }}</div>
            
            <div class="footer">
                <div class="signature-section">
                    <div class="signature-line">
                        <span style="font-family: cursive; font-size: 24px; color: #1e3a8a;">LSL Team</span>
                    </div>
                    <div class="signature-text">Instructor</div>
                </div>
                
                <div class="signature-section">
                    <div class="signature-line" style="display: flex; align-items: flex-end; justify-content: center; padding-bottom: 5px;">
                        <span style="font-size: 18px;">{{ $date ?? date('F d, Y') }}</span>
                    </div>
                    <div class="signature-text">Date</div>
                </div>
            </div>
            
            <div class="badge"></div>
        </div>
    </div>
</body>
</html>
