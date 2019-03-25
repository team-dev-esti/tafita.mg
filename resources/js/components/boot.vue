<template>
    <div>
        <ul>
            <li><router-link to="/home">Creer un concour</router-link></li>
            <li><router-link to="/home/events">Evenement en cours</router-link></li>
        </ul>
        
        <router-view></router-view>
    </div>
</template>
<script>
import router from '../routes.js'
export default {
    router
}
</script>