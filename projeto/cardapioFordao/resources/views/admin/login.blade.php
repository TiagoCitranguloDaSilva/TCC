<form action="/admin/validar" method="post" autocomplete="off">
  @csrf
  <input type="text" name="name" id="usuario">
  @error('name')
      <p>{{ $message }}</p>
  @enderror
  <input type="password" name="password" id="password">
  @error('password')
      <p>{{ $message }}</p>
  @enderror
  @error('failedLogin')
      <p>{{ $message }}</p>
  @enderror
  <input type="submit" value="Enviar">
</form>