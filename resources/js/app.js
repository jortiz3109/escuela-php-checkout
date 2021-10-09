require('./bootstrap');

import { createApp } from "vue";
import ProgressBar from "../components/ProgressBar";

const app = createApp({
    components: {
        ProgressBar
    }
});

app.mount("#app");
