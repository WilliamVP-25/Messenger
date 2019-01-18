<template>
  <div>
    <b-row>
      <b-col cols="8">

        <b-card
          footer-bg-variant="light"
          title="Conversacion Activa"
          class="h-100">

          <message-conversation-component
            v-for="message in messages"
            :key="message.id"
            :written-by-me="message.written_by_me"
            >
            {{ message.content }}
          </message-conversation-component>

          <div slot="footer">
            <b-form inline class="align-self-center mb-0" @submit.prevent="postMessage" action="" method="post">

            <b-input-group class="m-0 col-sm-12">
              <b-form-input
                id="messageInput"
                v-model="newMessage"
                autocomplete="off"
                placeholder="Escribe un mensaje..."
                class="text-right"
                type="text"/>
              <b-input-group-append>
                <b-btn size="sm" type="submit" text="Enviar" variant="success">Enviar</b-btn>
              </b-input-group-append>
            </b-input-group>

            </b-form>
          </div>
        </b-card>

      </b-col>
      <b-col cols="4">
        <b-img rounded="circle" blank width="80" height="80" blank-color="#777" alt="img" class="m-1" />
        <p>usuario seleccionado</p>
        <hr style="border: 1px solid #eee;" class="text-muted">
        <b-form-checkbox>
           Desactivar Notificaciones
        </b-form-checkbox>
      </b-col>
    </b-row>
  </div>
</template>

<script>
  export default {
    data(){
      return{
        messages: [],
        newMessage: ''
      };
    },
    mounted() {
      this.getMessages();
    },
    methods:{
      getMessages(){
        axios.get('/api/messages').then((response) => {
          this.messages= response.data;
        });
      },
      postMessage(){
        const params= {
          to_id: 2,
          content: this.newMessage
        }
        axios.post('/api/messages', params)
        .then((response) => {
          if(response.data.success){
            this.newMessage= '';
            this.getMessages();
          }

        });
      }
    }
  }
</script>
