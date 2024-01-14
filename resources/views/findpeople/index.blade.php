<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body>
@include('components.navbar')
<div class="container mt-5">
    <h2 class="mb-4">Procure por UUID de Usuário</h2>
    <form method="post" action="{{ route('findpeople.store') }}" >
        @csrf
        <div class="form-group">
            <label for="uuid">UUID:</label>
            <input type="text" class="form-control" id="uuid" name="uuid" required maxlength="100">
        </div>
        <button type="submit" class="btn btn-primary">Procurar</button>
    </form>
</div>
</body>
</html>
