<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create new bimbel</title>
</head>
<body>
    <h1>create new bimbel</h1>
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="nama_mapel" placeholder="nama_mapel">
        <input type="text" name="materi" placeholder="materi">
        <input type="file" name="tugas" placeholder="tugas">
        <input type="submit" value="create">
    </form>
</body>
</html>
