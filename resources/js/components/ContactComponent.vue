<template>
  <div>
    <b-list-group-item to="#" :variant="variant ">
      <b-row class="p-2" align-h="center">
        <b-col cols="12" md="3" class="text-center">
          <div class="img_cont">
            <b-img :src="conversation.contact_image" rounded="circle" width="60" height="60" class="m-1 has-badge rounded-circle user_img" />
            <span class="online_icon"></span>
            <status-component class="online_icon" :online="conversation.online" />
          </div>

        </b-col>

        <b-col cols="6" class="align-self-center d-none d-md-block">
          <p class="mb-1">

            <strong>{{ conversation.contact_name }}</strong>
          </p>
          <p class="text-muted small mb-1 ">{{ conversation.last_message }}</p>
        </b-col>

        <b-col cols="3" class="align-self-center d-none d-md-block">
          <p class="text-muted small"> {{ lastTime }}</p>
        </b-col>
      </b-row>
    </b-list-group-item>
  </div>
</template>

<script>
    export default {
      props: {
        conversation: Object,
        selected: Boolean
      },
      data(){
        return{
        };
      },
      mounted() {},
      computed: {
        lastTime(){
          return moment(this.conversation.last_time, 'YYYY-MM-DD hh:mm:ss')
          .locale('es').fromNow();
        },
        variant(){
          return this.selected ? 'info' : '';
        }
      }
    }
</script>
