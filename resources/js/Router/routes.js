import VehiclesList from '../components/VehiclesIndex.vue';
import TripsPlot from '../components/TripsPlot.vue';

const routes = [
    {
        path: '/',
        component: VehiclesList,
        name: 'vehicles_list'
    },
    {
        path: '/vehicles',
        component: VehiclesList,
        name: 'vehicles_list'
    },
    {
        path: '/vehicles/:id/trips-plot',
        component: TripsPlot,
        name: 'trips_plot'
    }
];

export default routes;
