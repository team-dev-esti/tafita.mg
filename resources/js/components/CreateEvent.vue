<template>
    <div>
        <h1>Creer un concours</h1>
        <form action="#" method="post" @submit.prevent="createEvent">
            <label for="">Titre</label>
            <input type="text" name="title" v-model="myEvent.title" placeholder="Titre">
            <label for="">Description du concours</label>
            <textarea name="description" v-model="myEvent.description" id="" cols="30" rows="10"></textarea>
            <label for="">date debut du depot dossier</label>
            <input type="date" name="start_on" v-model="myEvent.start_on">
            <label for="">date fin du depot dossier</label>
            <input type="date" name="finish_on" v-model="myEvent.finish_on">
            <label for="">Les dossier</label>
            <select multiple="true" v-model="myEvent.files_id">
                <option v-for="file in files_id" :value="file.id">{{file.label}}</option>
            </select>
            <button type="submit">Envoyer</button>
        </form>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data() {
        return {
            files_id: [],
            currentUser: '',
            multiple: true,
            myEvent: {
                    title: '',
                    description: '',
                    start_on: '',
                    finish_on: '',
                    files_id: []
                }  
        }
    },
    mounted() {
       axios.get('/current')
            .then( (response) => {
            // handle success
                this.currentUser = response.data
            })
            .catch((error) => {
            // handle error
                console.log(error);
            })
        axios.get('/api/files')
            .then( (response) => {
            // handle success
                this.files_id = response.data
            })
            .catch((error) => {
            // handle error
                console.log(error);
            })
    },
    methods: {
        createEvent(){
            
            let data = {
                'user_id': this.currentUser,
                ...this.myEvent
            }
            console.log(data)
            axios.post('/api/events/create', data).then(function (response) {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            });
            console.log(this.currentUser)
        }
    },
}
</script>