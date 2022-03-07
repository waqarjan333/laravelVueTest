import CardIndex from './components/cards/index.vue';
import CardCreate from './components/cards/create.vue';
import CardEdit from './components/cards/edit.vue';

export const routes = [{
        path: '/cards',
        component: CardIndex,
        name: "CardIndex"
    },
    {
        path: '/cards/new',
        component: CardCreate,
        name: "CardCreate"
    },
    {
        path: '/cards/edit/:id',
        component: CardEdit,
        name: "CardEdit"
    }
];