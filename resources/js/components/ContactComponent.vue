<template>
  <div>
    <b-list-group-item to="#" :variant="variant">
      <b-row class="p-2" align-h="center">
        <b-col cols="12" md="3" class="text-center">
          <b-img rounded="circle" blank width="60" height="60" blank-color="#777" alt="img" class="m-1" />
        </b-col>

        <b-col cols="6" class="align-self-center d-none d-md-block">
          <p class="mb-1"><strong>{{ name }}</strong></p>
          <p class="text-muted small mb-1 ">{{ lastMessage }}</p>
        </b-col>

        <b-col cols="3" class="align-self-center d-none d-md-block">
          <p class="text-muted small">{{ lastTime }}</p>
        </b-col>
      </b-row>
    </b-list-group-item>
  </div>
</template>

<script>
    export default {
      props: [
        'variant',
      ],
      data(){
        return{
          name: 'Juan Ramos Vue',
          lastMessage: 'Tú: Hasta pronto...',
          lastTime: 'Lunes'
        };
      },
      mounted() {}
    }
</script>
