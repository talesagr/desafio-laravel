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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
