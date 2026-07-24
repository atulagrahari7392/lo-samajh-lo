<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - {{ $transaction->transaction_id }}</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; color: #333; line-height: 1.6; }
        .invoice-box { max-width: 800px; margin: auto; padding: 30px; border: 1px solid #eee; box-shadow: 0 0 10px rgba(0, 0, 0, .15); font-size: 16px; line-height: 24px; }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #4F46E5; padding-bottom: 20px; margin-bottom: 20px; }
        .header img { max-height: 50px; }
        .title { color: #4F46E5; font-size: 28px; font-weight: bold; }
        .info-section { display: flex; justify-content: space-between; margin-bottom: 40px; }
        .details h4 { margin: 0 0 5px 0; color: #555; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f8f9fa; color: #333; font-weight: bold; }
        .total-row td { font-weight: bold; border-top: 2px solid #333; font-size: 18px; }
        .footer { text-align: center; color: #777; font-size: 12px; margin-top: 40px; border-top: 1px solid #eee; padding-top: 20px; }
    </style>
</head>
<body>
    <div class="invoice-box">
        <div class="header">
            <div>
                <!-- Add Logo Here -->
                <h1 style="margin: 0; color: #4F46E5;">Lo Samajh Lo</h1>
            </div>
            <div style="text-align: right;">
                <div class="title">INVOICE</div>
                <div>#{{ $transaction->transaction_id }}</div>
                <div>Date: {{ $transaction->created_at->format('M d, Y') }}</div>
            </div>
        </div>
        
        <div class="info-section">
            <div class="details">
                <h4>Billed To:</h4>
                <div>{{ $transaction->user->name }}</div>
                <div>{{ $transaction->user->email }}</div>
            </div>
            <div class="details" style="text-align: right;">
                <h4>Provider:</h4>
                <div>Lo Samajh Lo EdTech</div>
                <div>support@losamajhlo.com</div>
                <div>GSTIN: 22AAAAA0000A1Z5</div>
            </div>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>Description</th>
                    <th style="text-align: center;">Quantity</th>
                    <th style="text-align: right;">Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Course Enrollment: {{ $transaction->course->title }}</td>
                    <td style="text-align: center;">1</td>
                    <td style="text-align: right;">₹{{ number_format($transaction->course->price, 2) }}</td>
                </tr>
                <tr>
                    <td>CGST (9%)</td>
                    <td style="text-align: center;">-</td>
                    <td style="text-align: right;">₹{{ number_format($transaction->course->price * 0.09, 2) }}</td>
                </tr>
                <tr>
                    <td>SGST (9%)</td>
                    <td style="text-align: center;">-</td>
                    <td style="text-align: right;">₹{{ number_format($transaction->course->price * 0.09, 2) }}</td>
                </tr>
                <tr class="total-row">
                    <td colspan="2" style="text-align: right;">Total Amount</td>
                    <td style="text-align: right; color: #4F46E5;">₹{{ number_format($transaction->amount, 2) }}</td>
                </tr>
            </tbody>
        </table>
        
        <div class="footer">
            Thank you for learning with Lo Samajh Lo. This is a computer-generated invoice and does not require a physical signature.
        </div>
    </div>
</body>
</html>
