<template>
  <div>
    <b-row no-gutters class="mx-2">
      <b-col cols="8">

        <b-card
          style="overflow: auto;"
          footer-bg-variant="light"
          title=""
          class="h-100 thin scrollbar-info ">

          <message-conversation-component
            v-for="message in messages"
            :key="message.id"
            :written-by-me="message.written_by_me"
            >
            {{ message.content }}
          </message-conversation-component>
        </b-card>
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
                <b-btn size="sm" type="submit" text="Enviar" variant="success">Enviar</b-btn>
              </b-input-group-append>
            </b-input-group>

            </b-form>
          </div>

      </b-col>
      <b-col cols="4" class="h-100">
        <b-card
          style="overflow: auto;"
          footer-bg-variant="light"
          title=""
          class="h-100">
          <b-img rounded="circle" blank width="80" height="80" blank-color="#777" alt="img" class="m-1" />
          <p>Usuario seleccionado</p>
          <hr style="border: 1px solid #eee;" class="text-muted">
          <b-form-checkbox>
             Desactivar Notificaciones
          </b-form-checkbox>
        </b-card>
      </b-col>
    </b-row>
  </div>
</template>

<script>
  export default {
    data(){
      return{
        messages: [],
        newMessage: '',
        contactId: 2
      };
    },
    mounted() {
      this.getMessages();
    },
    methods:{
      getMessages(){
        axios.get(`/api/messages?contact_id=${this.contactId}`).then((response) => {
          this.messages= response.data;
        });
      },
      postMessage(){
        const params= {
          to_id: this.contactId,
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
