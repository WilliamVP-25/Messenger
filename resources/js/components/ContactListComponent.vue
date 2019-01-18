<template>
  <div>
    <b-form class="mx-2 align-self-center">
      <b-form-input type="text" class="text-center"
        id="search" name="search"
        placeholder="Buscar contacto...">
    </b-form-input>
    </b-form>
    <b-list-group>
      <contact-component variant="info">
      </contact-component>
      <contact-component variant="secondary">
      </contact-component>
      <contact-component>
      </contact-component>
    </b-list-group>
  </div>
</template>

<script>
    export default {
      mounted() {
      }
    }
</script>
