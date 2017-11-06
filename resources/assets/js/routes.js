import Home     from './home/Home.vue';
import Team     from './team/Team.vue';
import Apply    from './apply/Apply.vue';
import Streams  from './streams/Streams.vue';
import Login    from './login/Login.vue';

export default [
    { path: '/', name: 'home', component: Home },
    { path: '/team', name: 'team', component: Team },
    { path: '/apply', name: 'apply', component: Apply },
    { path: '/streams', name: 'streams', component: Streams },
    { path: '/login', name: 'login', component: Login }
]
