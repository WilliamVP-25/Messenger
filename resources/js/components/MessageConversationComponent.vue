<template>
  <div>
    <b-media :right-align="writtenByMe" vertical-align="center" class="mb-2 p-2">
      <b-img rounded="circle" slot="aside" blank blank-color="#ccc" width="50" alt="placeholder" />
      <b-card
        bg-variant=""
        text-variant="dark">
          <slot></slot>
      </b-card>
    </b-media>
  </div>
</template>

<script>
  export default {
    props: {
      writtenByMe: Boolean
    },
    data(){
      return{

      };
    },
    mounted() {
      //console.log(this.writtenByMe);
    }
  }
</script>
