<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit imbel</title>
</head>
<body>
    <h1>edit bimbel</h1>
    <form action="{{ route('update', $bimbel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="text" name="nama_mapel" placeholder="nama_mapel" value="{{ $bimbel->nama_mapel }}">
        <input type="text" name="materi" placeholder="materi" value="{{ $bimbel->materi }}">
        <input type="file" name="tugas" placeholder="tugas">
        <p>{{ $bimbel->tugas }}</p>
        <input type="submit" value="create">
    </form>
</body>
</html>
