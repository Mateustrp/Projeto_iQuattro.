<form action="{{ route('produtos.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="codigo">Código:</label>
        <input type="text" name="codigo" id="codigo" class="form-control" maxlength="15" required>
    </div>

    <div class="form-group">
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="preco">Preço:</label>
        <input type="number" name="preco" id="preco" class="form-control" required>
    </div>
    
    <div class="form-group">
        <label for="imposto">Imposto (%):</label>
        <input type="number" name="imposto" id="imposto" class="form-control" step="0.01" required>
    </div>
    

    <button type="submit" class="btn btn-primary">Salvar Produto</button>
</form>
