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
    @if($data >= 43)
    <h1>Tuyul</h1>
    @elseif($data < 43)
    <h1>Drogba</h1>
    @endif
    @endforeach
</body>
</html>