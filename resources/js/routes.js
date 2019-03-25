import VueRouter from 'vue-router'
import CreateEvent from './components/CreateEvent'
import Events from './components/events/Events'
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/home',
            name: 'create-event',
            component: CreateEvent
        },
        {
            path: '/home/events',
            name: 'event-home',
            component: Events
        },
    ],
});

export default router