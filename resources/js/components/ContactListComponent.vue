<template>
    <b-list-group class="scrollbar-winter-neva thin" style="overflow:auto;">
      <contact-component
        v-for="conversation in conversations"
        :key="conversation.id"
        :conversation="conversation"
        :selected="selectConversationId === conversation.id"
        @click.native="selectConversation(conversation)">
      </contact-component>
    </b-list-group>
</template>

<script>
    export default {
      props: {
        conversations: Array
      },
      data(){
        return{
          selectConversationId: null
        };
      },
      mounted() {
      },
      methods:{
        selectConversation(conversation){
          this.selectConversationId= conversation.id
          this.$emit('conversationSelected', conversation);
        }
      }
    }
</script>
