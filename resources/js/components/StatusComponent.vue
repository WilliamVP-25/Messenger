<template>
  <b-img rounded="circle" blank width="10" height="10"
  :title="online ? 'Conectado' : 'Desconectado' "
  :class="online ? 'online_icon' : 'online_icon offline'"/>
</template>

<script>
export default {
  props: {
    online: Boolean
  },
  data(){
    return{
    };
  },
  mounted(){

  }
}
</script>
