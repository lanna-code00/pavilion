import { createRouter, createWebHistory } from 'vue-router';
import ExampleComponent from '../components/ExampleComponent.vue'
import ViewUserComponent from '../components/ViewUserComponent'
import CreateUserProfile from '../components/CreateUserProfile'

const routes = [
    {
      path: '/',
      name: 'home',
      component: ExampleComponent,
    },
  {
    path: '/view/:id',
    name: 'view',
    component: ViewUserComponent,
  },
  {
    path: '/create',
    name: 'create',
    component: CreateUserProfile,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
