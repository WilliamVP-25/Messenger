@extends('layouts.app')

@section('content')
<b-container>
    <b-row class="justify-content-center">
        <b-col cols="9">
            <b-card title="" class="my-3">
                <b-form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1 class="text-center text-success">Iniciar Sesión</h1>
                  <b-row class="justify-content-center">
                    <b-col cols="9">
                      <!--input correo-->
                      <b-form-group
                      :label-cols="2"
                      breakpoint="md"
                      label="Ingresa E-mail"
                      label-for="email"
                      label-class="font-weight-bold">
                        <b-form-input type="email"
                        id="email" name="email" required
                        placeholder="email@example.com">
                        </b-form-input>
                      </b-form-group>
                    </b-col>

                    <b-col cols="9">
                      <!--input contraseña-->
                      <b-form-group
                      label="Contraseña"
                      label-for="password"
                      label-class="font-weight-bold">
                          <b-form-input type="password"
                          id="password" name="password" required
                          placeholder="Ingrese Contraseña">
                          </b-form-input>
                      </b-form-group>

                      <b-form-checkbox id="check" name="remember" checked="false"
                        {{ old('remember') ? 'checked="true"' : '' }}>
                          Recordar
                      </b-form-checkbox>

                    </b-col>

                    <b-col cols="9" class="text-center">
                      <!--botones-->
                      <b-form-group>
                        @if ($errors->any())
                          <b-alert show variant="danger" class="my-2">
                            <ul class="mb-0">
                              @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                          </b-alert>
                        @endif

                           <b-button variant="success" type="submit">Ingresar</b-button><br>
                           @if (Route::has('password.request'))
                           <b-link href="{{ route('password.request') }}" class="card-link">Olvidaste tu contraseña?</b-link>
                           @endif
                     </b-form-group>
                    </b-col>
                  </b-row>


                </b-form>

            </b-card>

          </b-card>
        </b-col>
  </b-row>
</b-container>
@endsection
