<form 
@if (isset($dados))
     action="/admin/produto/mudancas"
@else
    action="/admin/produto/salvar"

@endif method="post" enctype="multipart/form-data">
    @csrf
    @if (isset($dados))
        @method("put")
        <input type="hidden" name="id" value="{{$dados->id}}">
    @endif
    <div>
        <div id="imagePreview">
            <img id="preview" 
                @if (isset($dados))
                    src="{{asset($dados->linkImagem)}}"
                @endif
            alt="Pré-visualização da imagem" style="max-width: 300px;">
        </div>
        <input type="file" name="link" id="fileInput" 
        @if (!isset($dados))
            required
        @endif
        accept="image/*">
        @error('link')
            <p>{{$message}}</p>
        @enderror
    </div>
    <p>
        <input type="text" name="nome" id="" placeholder="Nome" value="{{$dados->nome ?? ''}}" >
        @error('nome')
            <p>{{ $message }}</p>
        @enderror
    </p>
    <input type="checkbox" name="disponivel"  
    @if (isset($dados)  && $dados->disponivel==1 )
        checked
    
    @endif id="">
    <p>
        <textarea name="descricao" id="" cols="30" rows="10" placeholder="Descrição" maxlength="500" >{{ $dados->descricao ?? '' }}</textarea>
        @error('descricao')
            <p>{{ $message }}</p>
        @enderror
    </p>
    <p>
        <input type="text" name="preco" id="" placeholder="Preço" value="{{$dados->preco?? ''}}" >
        @error('preco')
            <p>{{ $message }}</p>
        @enderror
    </p>
    <p>
        <select name="idCategoria" id="">
            @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{ $categoria->nome }}</option>
            @endforeach
        </select>
        @error('idCategoria')
            <p>{{ $message }}</p>
        @enderror
    </p>
    <input type="submit" value="Enviar">
</form>
<a href="/admin">voltar</a>

<script>
    document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('preview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
</script>
