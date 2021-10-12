require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';
import Example from "./components/Example";

createApp({
    components: {
        Example
    }
}).mount("#app")
