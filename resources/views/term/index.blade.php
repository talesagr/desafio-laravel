<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body>
@include('components.navbar')
<div class="container mt-5">
    <h2 class="mb-4">Procure por algum termo</h2>
    <form method="post" action="{{ route('term.store') }}" >
        @csrf
        <div class="form-group">
            <label for="term">TERMO:</label>
            <input type="text" class="form-control" id="term" name="term" required maxlength="100" value="{{ old('term') }}">
        </div>
        <button type="submit" class="btn btn-primary">Procurar</button>
    </form>
</div>
</body>
</html>
