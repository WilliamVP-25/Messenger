<template>
  <div>
    <b-media :right-align="writtenByMe" vertical-align="center" class="mb-2 p-2 media-body-message">
      <b-img :src="image" rounded="circle" slot="aside" width="50" height="48" alt="placeholder" />
      <b-card
        :class="writtenByMe ? 'text-right' : 'text-left'"
        text-variant="dark">
          <slot></slot>
      </b-card>
    </b-media>
  </div>
</template>

<script>
  export default {
    props: {
      writtenByMe: Boolean,
      image: String
    },
    data(){
      return{
      };
    },
    mounted() {
    }
  }
</script>
