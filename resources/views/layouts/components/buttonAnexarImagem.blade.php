<div class="input-group-img">
    <label for="imagem" id="buttonImagem">Anexar imagem <span id="filename"></span></label>
    <input type="file" name="imagem" id="imagem">
    <div class="erro">
        {{ $errors->has('imagem') ? $errors->first('imagem') : ''}}
    </div>
</div>
