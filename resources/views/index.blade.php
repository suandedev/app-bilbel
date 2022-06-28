<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>app bimbel 1.0</title>
</head>
<body>
    <h1>app bimbel</h1>
    <a href="{{ route('create') }}">new</a>
    <table>
        <tr style="text-align: center">
            <th>#</th>
            <td>nama_mapel</td>
            <td>materi</td>
            <td>tugas</td>
            <td>aksi</td>
        </tr>
        @foreach ($bimbels as $item)
        <tr style="text-align: center">
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_mapel }}</td>
            <td>{{ $item->materi }}</td>
            <td>
            <a href="{{ route('download_tugas', $item->id) }}">
                    {{ $item->tugas }}
                </a>
            </td>
            <td>
                <a href="{{ route('edit', $item->id) }}">edit</a>
                <form action="{{ route('destroy', $item->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
