<!DOCTYPE html>
<html lang="en">
@include('components.head')
<body>
@include('components.navbar')
<div class="container mt-5">
    <h2 class="mb-4">Cadastro de Pessoa</h2>
    <form method="post" action="{{ route('people.store') }}" >
        @csrf
        <div class="form-group">
            <label for="apelido">Apelido:</label>
            <input type="text" class="form-control" id="apelido" name="apelido" required maxlength="32" placeholder="Informe o apelido">
        </div>

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required maxlength="100" placeholder="Informe o nome">
        </div>

        <div class="form-group">
            <label for="nascimento">Nascimento:</label>
            <input type="date" class="form-control" id="nascimento" name="nascimento" required>
        </div>

        <div id="stack-container" class="mb-3">
            <label for="stack" class="d-block">Stack (opcional):</label>
                <div class="input-group">
                    <input type="text" id="stack" class="form-control" name="stack[]" maxlength="32" placeholder="Informe uma habilidade">
                </div>
                <div class="input-group-append">
                    <button type="button" class="btn btn-secondary mt-2" onclick="addStack()">Adicionar Stack</button>
                </div>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
</body>
<script>
    function removeStack(button) {
        let stackContainer = document.getElementById('stack-container');
        stackContainer.removeChild(button.parentNode);
    }
    function addStack() {
        let stackContainer = document.getElementById('stack-container');
        let stackName = document.getElementById('stack');
        let stackInputs = stackContainer.querySelectorAll('.form-group .form-control');

        let stackValues = [];
        stackInputs.forEach(function(stackInput) {
            stackValues.push(stackInput.value);
        });

        let newStackInput = document.createElement('div');
        newStackInput.className = 'form-group';

        let counter = stackInputs.length + 1;
        let inputId = 'stack' + counter;

        newStackInput.insertAdjacentHTML('beforeend', `
        <div class="form-group">
            <input type="text" id="${inputId}" name="stack[]" maxlength="32" value="${stackName.value}" readonly>
            <button type="button" class="btn btn-danger mt-2" onclick="removeStack(this)">Remover Stack</button>
        </div>
         `);

        stackContainer.appendChild(newStackInput);
    }
</script>
</html>


