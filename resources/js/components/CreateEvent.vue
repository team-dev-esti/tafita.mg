<template>
    <div>
        <h3 class="title">Creer un concours</h3>
        <form action="#" method="post" @submit.prevent="createEvent">
            <div class="flield">
                <label for="">Titre</label>
                <input type="text" class="input" name="title" v-model="myEvent.title" placeholder="Titre">
            </div>
            <div class="field">
                <label for="">Description du concours</label>
                <textarea name="description" class="textarea" v-model="myEvent.description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="flied">
                <div class="columns">
                    <div class="column">
                        <label for="">date debut du depot dossier</label>
                        <input type="date" name="start_on" v-model="myEvent.start_on">
                    </div>
                    <div class="column">
                        <label for="">date fin du depot dossier</label>
                        <input type="date" name="finish_on" v-model="myEvent.finish_on">
                    </div>
                </div>
            </div>
            
            <div class="flied">
                <label for="">Les dossier</label>
                <select multiple="true" v-model="myEvent.files_id">
                    <option v-for="file in files_id" :value="file.id">{{file.label}}</option>
                </select>
            </div>
            
            <button class="button is-info" type="submit">Envoyer</button>
        </form>
    </div>
</template>
<script>
import axios from 'axios'
import swal from 'sweetalert';
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
            axios.post('/api/events/create', data).then( (response) => {
                this.myEvent.title = ''
                this.myEvent.description = ''
                this.myEvent.start_on = ''
                this.myEvent.finish_on = ''
                this.myEvent.file_id = []
                console.log("enregistrer")
                swal("Enregistrement effectuer", "Votre évèenement est publié", "success");
            })
            .catch(function (error) {
                console.log(error);
            });
            console.log(this.currentUser)
        }
    },
}
</script>