<template>
    <div>
        <h3 class="title">{{event.title}}</h3>
        <router-link :to="'/home/events/'+event.id+'/selected'">Liste des admis</router-link>
        <p>liste etudiant inscrit</p>
        <div class="columns">
            <div class="column is-5" style="height : 600px;overflow:auto;">
                <a class="panel-block is" v-for="user in event.users" >
                    <div class="columns">
                        <div class="colomn is-3" style="padding:5px">
                            <img style="border-radius:28%" :src="'https://api.adorable.io/avatars/25/'+user.name+'@adorable.png'" alt="">
                        </div>
                        <div class="column">
                             {{ user.name }} {{ user.lastname }}
                             <button class="button is-small is-info" @click="findUser(user)">Voir</button>
                            <button class="button is-small is-success is-outlined" @click="updateUserStatus(user,1)">ajouter</button>
                            <button class="button is-small is-danger is-outlined" @click="updateUserStatus(user,-1)">rejeter</button>
                        </div>
                    </div>   
                </a>
            </div>
            <div class="column is-7 box">
                <p>Nom: {{showUser.name}}</p>
                <p>Prenom: {{showUser.lastname}}</p>
                <p>Prenom: {{showUser.lastname}}</p>
                <p>Email: {{showUser.email}}</p>
                <p>Née le: {{showUser.birth}}</p>
                <p>sexe: {{showUser.gender}}</p>
                <ul>
                    <li v-for="userfile in showUser.files"><a target="_blank" :href="'/home/file/download/'+userfile.pivot.user_id+'/'+userfile.pivot.file_id">{{userfile.label}}</a></li>
                </ul>
            </div>
        </div> 
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data() {
        return {
            currentUser: '',
            event:[],
            showUser: []
        }
    },
   mounted() {
       axios.get('/current')
            .then( (response) => {
            // handle success
                this.currentUser = response.data
                let uri = '/api/events/'+this.currentUser+'/'+this.$route.params.id
                axios.get(uri)
                .then( (response) => {
                // handle success
                    this.event = response.data
                    console.log(this.event)
                })
                .catch((error) => {
            // handle error
                console.log(error);
                })
            })
            .catch((error) => {
            // handle error
                console.log(error);
            })
        
            
   },
   methods: {
       findUser(user){
           let uri = '/api/users/'+user.id
                axios.get(uri)
                .then( (response) => {
                // handle success
                    this.showUser = response.data
                    console.log(this.event)
                })
                .catch((error) => {
            // handle error
                console.log(error);
                })
       },
       updateUserStatus(user,status){
           let uri = '/api/events/update'
           let data = {
               'user_id':user.id,
               'event_id':this.event.id,
               'status':status
               }
              
               
           axios.put(uri,data)
                .then((response) => {
                // handle success
                    
                })
                .catch((error) => {
            // handle error
                console.log(error);
                })
       }
   },
}
</script>