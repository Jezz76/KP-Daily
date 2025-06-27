<table>
    <thead>
        <tr style="background-color: #4F81BD; color: white; font-weight: bold;">
            <th style="border: 1px solid #000; padding: 8px; text-align: center;">No</th>
            <th style="border: 1px solid #000; padding: 8px; text-align: center;">Tanggal</th>
            <th style="border: 1px solid #000; padding: 8px; text-align: center;">Aktivitas</th>
            <th style="border: 1px solid #000; padding: 8px; text-align: center;">Rencana Besok</th>
            <th style="border: 1px solid #000; padding: 8px; text-align: center;">Bukti Kerja</th>
        </tr>
    </thead>
    <tbody>
        @foreach($activities as $index => $activity)
            <tr style="height: {{ $activity->evidence_file && in_array(pathinfo($activity->evidence_file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png']) ? '150px' : '40px' }};">
                <td style="border: 1px solid #000; padding: 8px; text-align: center; vertical-align: top;">{{ $index + 1 }}</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center; vertical-align: top;">{{ $activity->date->format('d/m/Y') }}</td>
                <td style="border: 1px solid #000; padding: 8px; vertical-align: top; word-wrap: break-word; max-width: 300px;">{{ $activity->activity }}</td>
                <td style="border: 1px solid #000; padding: 8px; vertical-align: top; word-wrap: break-word; max-width: 250px;">{{ $activity->next_plan ?? '-' }}</td>
                <td style="border: 1px solid #000; padding: 8px; text-align: center; vertical-align: top;">
                    @if($activity->evidence_file)
                        @php
                            $extension = pathinfo($activity->evidence_file, PATHINFO_EXTENSION);
                            $filePath = storage_path('app/public/bukti-kerja/' . $activity->evidence_file);
                        @endphp
                        
                        @if(in_array($extension, ['jpg', 'jpeg', 'png']) && file_exists($filePath))
                            <img src="{{ $filePath }}" style="max-width: 120px; max-height: 120px; object-fit: contain;" alt="Bukti Kerja">
                            <br><small style="color: #666;">{{ $activity->evidence_file }}</small>
                        @else
                            <div style="padding: 20px; background-color: #f0f0f0; border: 2px dashed #ccc; text-align: center;">
                                <strong>📄 {{ strtoupper($extension) }} File</strong>
                                <br><small>{{ $activity->evidence_file }}</small>
                            </div>
                        @endif
                    @else
                        <em style="color: #999;">Tidak ada bukti</em>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
