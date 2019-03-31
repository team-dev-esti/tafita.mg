<template>
    <div class="columns">
            <div class="column is-2" style="margin:10px;" >
                <figure class="image is-128x128" style="margin-bottom: 50px; height: 128px;">
                    <img class="is-rounded" src="https://bulma.io/images/placeholders/128x128.png ">
                </figure>

                <aside class="menu ">
                    <ul class="menu-list">
                        <li><router-link to="/home">Creer un concour</router-link></li>
                        <li><router-link to="/home/events">Evenement en cours</router-link></li>
                    </ul>                            
                </aside>
            </div>
        <div class="column is-10" >
            <router-view></router-view>
         </div>
    </div>
</template>
<script>
import router from '../routes.js'
export default {
    router
}
</script>