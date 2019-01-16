@extends('layouts.app')

@section('content')
<b-container>
    <b-row class="justify-content-center">
        <b-col cols="9">
            <b-card title="" class="my-3">
                <b-form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h2 class="text-center text-success">Registrarse en Messenger</h2>
                    <b-row class="justify-content-center">
                      <b-col cols="9">
                        <!--input name-->
                        <b-form-group id="fieldsetHorizontal"
                        :label-cols="2"
                        breakpoint="md"
                        label="Ingresa tu nombre"
                        label-for="name"
                        label-class="font-weight-bold">
                          <b-form-input type="text"
                          id="name" name="name" required
                          placeholder="Tu nombre">
                          </b-form-input>
                        </b-form-group>
                      </b-col>

                      <b-col cols="9">
                        <!--input correo-->
                        <b-form-group id="fieldsetHorizontal"
                        :label-cols="2"
                        breakpoint="md"
                        label="Ingresa tu E-mail"
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
                            placeholder="Ingresa tu Contraseña">
                            </b-form-input>
                        </b-form-group>
                      </b-col>

                      <b-col cols="9">
                        <!--input confirnmar contraseña-->
                        <b-form-group
                        label="Confirma tu Contraseña"
                        label-for="password-confirm"
                        label-class="font-weight-bold">
                            <b-form-input type="password"
                            id="password-confirm" name="password_confirmation" required
                            placeholder="Ingrese Contraseña">
                            </b-form-input>
                        </b-form-group>
                      </b-col>

                      <b-col cols="9" class="text-center">

                        @if ($errors->any())
                          <b-alert show variant="danger" class="my-2">
                            <ul class="mb-0">
                              @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                              @endforeach
                            </ul>
                          </b-alert>
                        @endif

                        <!--botones-->
                        <b-form-group>
                             <b-button variant="success" type="submit">Registrarse</b-button><br>
                       </b-form-group>
                      </b-col>

                    </b-row>
                </b-form>
            </b-card>
        </b-col>
    </b-row>
</b-container>
@endsection
