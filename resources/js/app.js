require('./bootstrap');

import { createApp } from "vue";
import StepsBar from "../components/StepsBar";

const app = createApp({
    components: {
        StepsBar
    }
});

app.mount("#app");
