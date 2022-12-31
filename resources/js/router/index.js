import {createRouter, createWebHistory} from 'vue-router';
import employees from '../vue/components/employee/employees.vue';
import userAccount from '../vue/components/account/user-account.vue';
import createUserAccount from '../vue/components/templates/FormUserAccount.vue';
import userAccounts from '../vue/components/templates/usrForm.vue';
import createEmp from '../vue/components/templates/empForm.vue';
import team from '../vue/components/team/team.vue';
import teams from '../vue/components/team/team-table.vue';
import createTeam from '../vue/components/team/team-create.vue';
import createTeamMember from '../vue/components/team/team-member.vue';
import role from '../vue/components/role/role.vue';
import roleTable from '../vue/components/role/role-table.vue';
import createRole from '../vue/components/role/create-role.vue';

const routes = [
    {
        path: '/',
        redirect:  'employee',
    },
    {
        path: '/employee',
        name: 'employees',
        component: employees,
    },
    {
    path: '/role',
    name: 'role',
    component: role,
    children: [
            {
                path: '',
                name: 'roleTable',
                component: roleTable,
                Props:true,
            },
            {
                path: 'create',
                name: 'createRole',
                component: createRole,
                Props:true,
            },
        ]
},
{
    path: '/team',
    name: 'team',
    component: team,

    children: [
        {
            path: '',
            name: 'teams',
            component: teams,
            Props:true,
        },
        {
            path: 'create',
            name: 'createTeam',
            component: createTeam,
        },
        {
            path: 'create-team-member',
            name: 'createTeamMember',
            component: createTeamMember,
        },
        
    ]
},
{
    path: '/user-account',
    name: 'userAccount',
    component: userAccount,
    children: [
        {
            path: '',
            name: 'userAccounts',
            component: userAccounts,
            Props:true,
        },
        {
            path: 'create',
            name: 'createUserAccount',
            component: createUserAccount,
        },
        {
            path: 'create-emp',
            name: 'createEmp',
            component: createEmp,
        },
        
    ]
},

];

const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;



