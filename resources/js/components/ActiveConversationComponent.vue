<template>
  <div>
    <b-row class="mx-2">
      <b-col cols="8">

        <b-card no-body
          class="h-100">
          <div slot="header">
            <b-media vertical-align="center">
              <b-img :src="contactImage" rounded="circle" slot="aside" width="50" height="50" alt="placeholder" />
                <div>
                  {{ contactName }}
                </div>
            </b-media>
          </div>
          <b-card-body class="card-body-scroll scrollbar-winter-neva thin">
            <message-conversation-component
              v-for="message in messages"
              :key="message.id"
              :written-by-me="message.written_by_me"
              :image= "message.written_by_me ? myImage : contactImage">
              {{ message.content }}
              <p class="small text-muted p-0 m-0">
                {{ message_time(message.created_at) }}
              </p>
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
                <button style="height: auto;" type="submit" title="Enviar" class="btn btn-success"><span class="fa fa-location-arrow"></span></button>
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
            <b-img :src="contactImage" rounded="circle" slot="aside" width="50" height="50" alt="placeholder" />
            <b-card
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
      contactImage: String,
      messages: Array,
      myImage: String
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
      },
      message_time(date){
        return moment(date, 'YYYY-MM-DD hh:mm:ss').locale('es').calendar();
      }
    },
    updated() {
        this.scrollToBottom();
    }
  }
</script>
