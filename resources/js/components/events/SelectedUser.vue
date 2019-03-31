<template>
    <div>
        <h1 class="title">Tous les utilisateur selectionner </h1>
        <button class="button is-success" @click="notify">Envoyer un mail au admis</button>
        <a class="panel-block is" v-for="user in users" >
            <div class="columns">
                <div class="colomn is-3" style="padding:5px">
                    <img style="border-radius:28%" :src="'https://api.adorable.io/avatars/25/'+user.name+'@adorable.png'" alt="">
                </div>
                <div class="column">
                        {{ user.name }} {{ user.lastname }}
                      
                </div>
            </div>   
        </a>
       
    </div>
</template>
<script>
import axios from 'axios'
import swal from 'sweetalert';
export default {
    data() {
        return {
            currentUser: '',
            users: [],
        }
    },
    mounted() {
        let uri = '/api/event/selected/'+ this.$route.params.id
        axios.get(uri)
        .then((response) =>{
            this.users = response.data
        })
        .catch((error) => {
            // handle error
            console.log(error);
        })
    },
    methods: {
        notify(){
             
            let uri = '/api/event/notify/'
            let data = {
                'event_id': this.$route.params.id,
            }

            axios.post(uri,data)
            .then((response) => {})
            .catch((error) => {
            // handle error
                console.log(error);
            })
            swal("Notification des admins", "Les mail sont envoyer au admis", "success");
            
        }
    },
}
</script>