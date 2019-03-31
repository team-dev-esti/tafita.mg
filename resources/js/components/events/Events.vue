<template>
    <div>
        <h2 class="title">Liste des concour organiser</h2>
        <ul>
            <li v-for="event in events"><router-link :to="'/home/events/' + event.id">{{ event.title }}</router-link></li>
        </ul>
    </div>
</template>
<script>
import axios from 'axios'
export default {
    data() {
        return {
            currentUser: '',
            events: [],
            event: []
        }
    },
    mounted() {
        console.log('Hellloooooo')
       axios.get('/current')
            .then( (response) => {
            // handle success
                this.currentUser = response.data
                let uri = '/api/events/'+this.currentUser
                axios.get(uri)
                .then( (response) => {
                // handle success
                    this.events = response.data
                    console.log(this.events)
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
        showEvent(event){
            let uri = '/api/events/'+this.currentUser+'/'+event
            axios.get(uri)
                .then( (response) => {
                // handle success
                    this.event = response.data[0]
                    console.log(this.event)
                })
                .catch((error) => {
            // handle error
                console.log(error);
                })
        }
    },
    
}
</script>