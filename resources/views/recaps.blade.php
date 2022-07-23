<table>
    <thead>
        <tr>
            <th>Fakultas</th>
            <th>Prodi</th>
            <th>Periode</th>
            <th>Mahasiswa</th>
            <th>Rasio Standar</th>
            <th>Kebutuhan</th>
            <th>Yang Ada</th>
            <th>Kelebihan</th>
            <th>Kekurangan</th>
            <th>Rasio Sekarang</th>
            <th>S2</th>
            <th>S3</th>
            <th>TP</th>
            <th>AA</th>
            <th>LR</th>
            <th>LK</th>
            <th>GB</th>
            <th>Beasiswa</th>
            <th>Blm Serdos</th>
            <th>Sdh Serdos</th>
        </tr>
    </thead>

    <tbody>
        @foreach($recaps as $recap)
        <tr>
            <td>{{ $recap->faculty->slug }}</td>
            <td>{{ $recap->name }}</td>
            <td>{{ $recap->slug }}</td>
            <td>{{ $recap->student_count }}</td>
            <td>1:{{ $recap->lecture_ratio }}</td>
            <td>{{ $recap->lecture_need }}</td>
            <td>{{ $recap->lecture_count }}</td>
            <td>{{ $recap->lecture_advg }}</td>
            <td>{{ $recap->lecture_lack }}</td>
            <td>1:{{ $recap->existing_ratio }}</td>
            <td>{{ $recap->s2_count }}</td>
            <td>{{ $recap->s3_count }}</td>
            <td>{{ $recap->position_tp }}</td>
            <td>{{ $recap->position_aa }}</td>
            <td>{{ $recap->position_lr }}</td>
            <td>{{ $recap->position_lk }}</td>
            <td>{{ $recap->position_gb }}</td>
            <td>{{ $recap->scholarship_count }}</td>
            <td>{{ $recap->uncertified_count }}</td>
            <td>{{ $recap->certified_count }}</td>
        </tr>
        @endforeach
    </tbody>
</table>