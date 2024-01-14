<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body>
@include('components.navbar')
<ul class="list-group">
    @foreach($peoples as $people)
        <li class="list-group-item">
            <strong>UUID:</strong> {{ $people->uuid }}<br>
            <strong>Apelido:</strong> {{ $people->apelido }}<br>
            <strong>Nome:</strong> {{ $people->nome }}<br>
            <strong>Nascimento:</strong> {{ $people->nascimento->format('Y-m-d') }}<br>
            <strong>Stack:</strong> {{ implode(', ',$people->stack) }}<br>
        </li>
    @endforeach
</ul>
</body>
</html>
