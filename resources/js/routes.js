import VueRouter from 'vue-router'
import CreateEvent from './components/CreateEvent'
import Events from './components/events/Events'
import EventShow from './components/events/EventShow'
import SelectedUser from './components/events/SelectedUser'
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
        {
            path: '/home/events/:id(\\d+)',
            name: 'event-show',
            component: EventShow
        },
        {
            path: '/home/events/:id(\\d+)/selected',
            name: 'selected-user',
            component: SelectedUser
        },
    ],
});

export default router