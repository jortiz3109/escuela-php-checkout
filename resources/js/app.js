require('./bootstrap');

import { createApp } from "vue";
import ProgressBar from "../components/ProgressBar";
import TestRequest from "../components/TestRequest";

const app = createApp({
    components: {
        ProgressBar,
        TestRequest
    }
});

app.mount("#app");
