<template>
    <div>
        <h1>Tous les utilisateur selectionner </h1>
        <button @click="notify">Envoyer un mail au admis</button>
        <ul>
            <li v-for="user in users">{{ user.name }}  {{ user.lastname }}</li>
        </ul>
    </div>
</template>
<script>
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
           
            
        }
    },
}
</script>