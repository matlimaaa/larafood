@include('admin.includes.alerts')

<div class="form-group">
    <label for="">Nome: </label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{ $category->name ?? old('name') }}">
</div>

<div class="form-group">
    <label for="">Descrição: </label>
    <textarea name="description" id="description" cols="30" class="form-control" rows="10">
        {{ $category->description ?? old('description') }}
    </textarea>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>