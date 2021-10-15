require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';

import Example from "./components/Example";
import Transaction from "./components/Transaction";
import Stepper from "./components/Stepper";

createApp({
    components: {
        Example,
        Transaction,
        Stepper
    }
}).mount("#app")
