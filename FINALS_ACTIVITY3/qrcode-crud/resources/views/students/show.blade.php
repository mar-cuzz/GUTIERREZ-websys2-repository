@extends('layouts.app')

@section('content')
    <h2>{{ $student->stud_id }}</h2>
    <p><strong>Name:</strong> {{ $student->name }}</p>
    <p><strong>Birth date:</strong> {{ $student->bdate }}</p>
    <p><strong>Course:</strong> {{ $student->course }}</p>

    <h4>QR Code</h4>
    <div id="qr-section">
        {!! $qr !!}
    </div>

    <button onclick="printQR()" class="btn btn-outline-primary mt-3">🖨️ Print QR</button>
    <a href="{{ route('students.index') }}" class="btn btn-secondary mt-3">← Back</a>

    <script>
        function printQR() {
            var qrContent = document.getElementById('qr-section').innerHTML;
            var printWindow = window.open('', '', 'height=400,width=400');
            printWindow.document.write('<html><head><title>Print QR Code</title></head><body style="text-align:center;">');
            printWindow.document.write(qrContent);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.focus();
            printWindow.print();
            printWindow.close();
        }
    </script>
@endsection