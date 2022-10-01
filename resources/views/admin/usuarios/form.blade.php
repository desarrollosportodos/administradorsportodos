    @csrf
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="user_names">Nombres</label>
                <input type="text" name="user_names" id="user_names" class="form-control" value="{{old('user_names', $data['user_names'] ?? '')}}">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="user_lastnames">Apellidos</label>
                <input type="text" name="user_lastnames" id="user_lastnames" class="form-control" value="{{old('user_lastnames', $data['user_lastnames'] ?? '')}}">
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="user_level">Nivel</label>
                <select name="user_level" id="user_level" class="form-control">
                    <option value="0">Seleccione...</option>
                    @foreach ($niveles as $key => $nivel)
                        <option value="{{$key}}" <?php if(isset($data['user_level']) && $key ==  $data['user_level'] ){echo "selected";} ?>>{{$nivel}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="">Correo</label>
                <input type="text" name="user_email" class="form-control" value="{{old('user_email', $data['user_email'] ?? '')}}" >
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password" name="user_password" class="form-control" value="{{old('user_password', $data['user_password'] ?? '')}}" >
            </div>
        </div>
    </div>

@section('scripts')

@endsection