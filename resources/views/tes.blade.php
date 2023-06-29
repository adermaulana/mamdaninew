<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach($hasil as $data)
    @if($data <= 78)
    <h1>Kurang Sesuai</h1>
    @elseif($data >= 79 && $data <= 89)
    <h1>Cukup Sesuai</h1>
    @else
    <h1>Sangat Sesuai</h1>
    @endif
    @endforeach
</body>
</html>