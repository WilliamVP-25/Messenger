<template>
	<b-container fluid style="height: calc(100vh - 90px);">
	    <b-row no-gutters>
	        <b-col cols="3">
						<b-form class="align-self-center" autocomplete="off">
							<b-form-input type="text" class="text-center"
								id="search" name="search"
								v-model="querySearch"
								placeholder="Buscar contacto...">
							</b-form-input>
						</b-form>
	          <contact-list-component
            	@conversationSelected="changeActiveConversation($event)"
							:conversations="conversationsFiltered"
							>
	           </contact-list-component>
	        </b-col>
	        <b-col cols="9">
	            <active-conversation-component
                v-if="selectedConversation"
                :contact-id="selectedConversation.contact_id"
                :contact-name="selectedConversation.contact_name"
								:contact-image="selectedConversation.contact_image"
								:my-image="myImageUrl"
								:messages="messages"
								@messageCreated="addMessage($event)">
	            </active-conversation-component>

							<b-container v-else fluid>
								<b-card
									footer-bg-variant="light"
									title="<span class='fa fa-comments text-info'></span> Messenger"
									class="h-100">
									<hr style="border: 1px solid #eee;" class="text-muted">
									<p align="center">Charla con tus amigos!!!</p>
								</b-card>
							</b-container>

	        </b-col>
	    </b-row>
	</b-container>
</template>

<script>
    export default {
      props: {
        user: Object
      },
      data(){
        return{
          selectedConversation: null,
          messages: [],
					conversations: [],
					querySearch: ''
        };
      },
      mounted() {
				this.getConversations();
				Echo.join('messenger')
      	.here((users) => {
					//console.log('online' ,users);
					users.forEach((user) => this.changeStatus(user, true));
				})
				.joining((user) => {
					//console.log('join' ,user.id);
					this.changeStatus(user, true);
				})
				.leaving((user) => {
					//console.log('leave' ,user.id);
					this.changeStatus(user, false);
				});

        Echo.private(`users.${this.user.id}`)
        .listen('MessageSent', (data) => {
          const message= data.message;
					message.written_by_me= false;
					this.soundNewMessage();
					this.addMessage(message);
				});
      },
      methods: {
				getConversations(){
					axios.get('/api/conversations')
					.then((response) => {
						this.conversations = response.data;
					});
				},
        changeActiveConversation(conversation) {
          this.selectedConversation = conversation;
          this.getMessages();
        },
        getMessages(){
          axios.get(`/api/messages?contact_id=${this.selectedConversation.contact_id}`)
            .then((response) => {
              this.messages= response.data;
          });
        },
				addMessage(message){
					const conversation= this.conversations.find((conversation) => {
						return conversation.contact_id == message.from_id ||
									conversation.contact_id == message.to_id;
					});

					const author= this.user.id === message.from_id ? 'Tú: ': '';
					conversation.last_message= `${author} ${message.content}`;
					conversation.last_time= message.created_at;

					if (this.selectedConversation.contact_id == message.from_id || this.selectedConversation.contact_id == message.to_id){
						this.messages.push(message);
					}
				},
				changeStatus(user, status){
					const index= this.conversations.findIndex((conversation) => {
						return conversation.contact_id == user.id;
					});
					if (index >= 0) {
						this.$set(this.conversations[index] , 'online', status);
					}
				},
				soundNewMessage(){
      		document.getElementById('newMessageSound').play();
				}
      },
			computed: {
				conversationsFiltered(){
					return this.conversations
						.filter((conversation) =>
							conversation.contact_name.toLowerCase()
							.includes(this.querySearch.toLowerCase())
					);
				},
				myImageUrl(){
					return `/users/${this.user.image}`;
				}

			}
    }
</script>
