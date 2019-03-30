<template>
    <div>
        <h1>{{event.title}}</h1>
        <router-link :to="'/home/events/'+event.id+'/selected'">Liste des admis</router-link>
        <p>liste etudiant inscrit</p>
        <ul>
            <li v-for="user in event.users" >
                {{ user.name }} {{ user.lastname }}  
                <button @click="findUser(user)">Voir</button>
                <button @click="updateUserStatus(user,1)">ajouter</button>
                <button @click="updateUserStatus(user,-1)">rejeter</button>
            </li>
        </ul>
        <div>
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
</template>
<script>
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