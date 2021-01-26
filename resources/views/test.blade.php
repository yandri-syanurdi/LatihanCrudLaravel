{{$siswa->user->name}}

{{$siswa->null->name}}

{{dd($siswa->user->name)}}

{{$siswa->nama_depan}}

{{$siswa}}

{{dd($siswa)}}
null->nama_depan

<!-- harus dihapus dulu salah satu -->

@foreach($siswa as $s)
    <li>{{$s->user->name}}</li>
@endforeach

@foreach($siswa as $s)
    <li>{{$s->nama_depan}}</li>
@endforeach