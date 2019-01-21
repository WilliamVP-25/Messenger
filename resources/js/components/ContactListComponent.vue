<template>
  <div>
    <b-form class="mx-2 align-self-center" autocomplete="off">
      <b-form-input type="text" class="text-center"
        id="search" name="search"
        placeholder="Buscar contacto...">
    </b-form-input>
    </b-form>
    <b-list-group>

      <contact-component
        v-for="conversation in conversations"
        :key="conversation.id"
        :conversation="conversation"
        @click.native="selectConversation(conversation)">
      </contact-component>
      <!--<contact-component variant="info">
      </contact-component>
      <contact-component variant="secondary">
      </contact-component>
      <contact-component>
      </contact-component>-->
    </b-list-group>
  </div>
</template>

<script>
    export default {
      props: {
        conversations: Array
      },
      data(){
        return{
        };
      },
      mounted() {
      },
      methods:{
        selectConversation(conversation){
          this.$emit('conversationSelected', conversation);
        }
      }
    }
</script>
