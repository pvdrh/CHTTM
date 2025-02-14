import JobSearch from '../views/JobSearch.vue'
import JobSettings from '../views/JobSettings.vue';
export const JobRoutes = [
    {
        path: "/jobs",
        name: "job",
        component: JobSearch,
    },
    {
        path: "/jobs/settings",
        name: "job-setting",
        component: JobSettings,
    },
];