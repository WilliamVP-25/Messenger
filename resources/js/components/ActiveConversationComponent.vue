<template>
  <div>
    <b-row no-gutters class="mx-2">
      <b-col cols="8">

        <b-card no-body
          footer="Card Footer"
          footer-tag="footer"
          class="h-100">
          <b-card-body class="card-body-scroll scrollbar-winter-neva thin">
            <message-conversation-component
              v-for="message in messages"
              :key="message.id"
              :written-by-me="message.written_by_me">
              {{ message.content }}
            </message-conversation-component>
          </b-card-body>

          <div slot="footer" class="m-0" style="border: 1px solid transparent;">
            <b-form inline class="align-self-center col-sm-12 m-0 p-0" @submit.prevent="postMessage" action="" method="post">

            <b-input-group class="m-0 col-sm-12 p-0" size="lg" >
              <b-form-input
                id="messageInput"
                v-model="newMessage"
                autocomplete="off"
                placeholder="Escribe un mensaje..."
                class="text-right"
                type="text"/>
              <b-input-group-append>
                <button style="height: auto;" type="submit" title="Enviar" class="btn btn-success"><span class="fa fa-paper-plane"></span></button>
              </b-input-group-append>
            </b-input-group>
            </b-form>
          </div>
        </b-card>


      </b-col>
      <b-col cols="4" class="h-100">
        <b-card
          footer-bg-variant="light"
          title=""
          class="h-100">

          <b-media vertical-align="center" class="mb-2 p-2">
            <b-img rounded="circle" slot="aside" blank blank-color="#ccc" width="60" alt="placeholder" />
            <b-card
              bg-variant=""
              text-variant="dark">
              {{ contactName }}
            </b-card>
          </b-media>
          <hr style="border: 1px solid #eee;" class="text-muted">
          <b-form-checkbox>
             Desactivar Notificaciones
          </b-form-checkbox>
        </b-card>

      </b-col>
    </b-row>
  </div>
</template>

<style media="screen">
  .card-body-scroll{
    max-height: calc(100vh - 80px);
    overflow: auto;
  }

</style>

<script>
  export default {
    props:{
      contactId: Number,
      contactName: String,
      messages: Array
    },
    data(){
      return{
        newMessage: ''
      };
    },
    mounted() {
    },
    methods:{
      postMessage(){
        const params= {
          to_id: this.contactId,
          content: this.newMessage
        }
        axios.post('/api/messages', params)
        .then((response) => {
          if(response.data.success){
            this.newMessage= '';
            const message= response.data.message;
            message.written_by_me= true;
            this.$emit('messageCreated', message);
          }
        });
      },
      scrollToBottom(){
        const el= document.querySelector('.card-body-scroll');
        el.scrollTop= el.scrollHeight;
      }
    },
    updated() {
        this.scrollToBottom();
    }
  }
</script>
