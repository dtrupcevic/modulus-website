import Dashboard        from './dashboard/Dashboard.vue';
import Team             from './team/Team.vue';
import Applications     from './applications/Applications.vue';
import Recruitment      from './recruitment/Recruitment.vue';
import Streams          from './streams/Streams.vue';

export default [
    { path: '/admin', name: 'dashboard', default: true, component: Dashboard },
    { path: '/admin/team', name: 'team', component: Team },
    { path: '/admin/applications', name: 'applications', component: Applications },
    { path: '/admin/recruitment', name: 'recruitment', component: Recruitment },
    { path: '/admin/streams', name: 'streams', component: Streams }
]
