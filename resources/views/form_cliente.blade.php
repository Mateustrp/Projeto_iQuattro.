<div class="form-group">
    <label for="codigo">Código</label>
    <input type="text" name="codigo" class="form-control" id="codigo"  maxlength="6" required>
</div>

<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" name="nome" class="form-control" id="nome"  maxlength="60" required>
</div>

<div class="form-group">
    <label for="pessoa">Tipo de Pessoa</label>
    <select name="pessoa" class="form-control" id="pessoa" required>
        <option value="J">Jurídica</option>
        <option value="F">Física</option>
        <option value="O">Outros</option>
    </select>
</div>

<div class="form-group">
    <label for="cnpj">CPF/CNPJ</label>
    <input type="text" name="cnpj" class="form-control" id="cnpj" required maxlength="14" minlength="14">
</div>

<div class="form-group">
    <label for="estado">Estado</label>
    <input type="text" name="estado" class="form-control" id="estado" required maxlength="2">
</div>

<div class="form-group">
    <label for="data_nascimento">Data de Nascimento</label>
    <input type="date" name="data_nascimento" class="form-control" id="data_nascimento" required>
</div>
