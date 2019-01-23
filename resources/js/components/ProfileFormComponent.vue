<template>
  <b-container fluid class="col-md-6 col-xs-12">

    <div class="card">
    <h5 class="card-header info-color white-text text-center py-4">
      <strong>Editar Perfil</strong>
    </h5>
    <!--Card content-->
      <div class="card-body px-lg-5 pt-0">
        <!-- Form -->
        <form class="text-center" style="color: #757575;" action="" method="post" enctype="multipart/form-data">
          <!-- Email -->
          <input type="hidden" name="_token" v-model="csrfToken">

          <div class="md-form">
            <input disabled type="email" v-model="user.email" id="email" name="email" class="form-control">
            <!--<label for="email">Correo Electronico</label>-->
          </div>

          <div class="md-form">
            <input type="text" id="name" v-model="user.name" name="name" class="form-control" placeholder="Ingresa tu nombre">
            <!--<label for="name">Nombre</label>-->
          </div>

          <div class="md-form">
            <input type="password" id="materialLoginFormPassword" name="password" class="form-control">
            <label for="materialLoginFormPassword">Nueva Contraseña</label>
          </div>


          <label>Cambiar foto de perfil</label>
          <b-img :src="image" rounded="circle" width="80" height="80" class="m-2" />
          <div class="clearfix"></div>
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Subir foto de perfil</span>
            </div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="image" name="image">
              <label class="custom-file-label" for="image">Seleccione...</label>
            </div>
          </div>

          <!-- Sign in button -->
          <button class="btn btn-info btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit">Guardar Cambios</button>

        </form>
      </div>
    </div>
  </b-container>
</template>

<script>
export default {
  props: {
    user: Object,
    csrfToken: String
  },
  data(){
    return{
    };
  },
  mounted() {

  },
  computed:{
    image(){
      return `/users/${this.user.image}`;
    }
  }
}
</script>

<style lang="css">
</style>
