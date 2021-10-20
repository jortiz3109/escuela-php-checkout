require('./bootstrap');

import { createApp } from 'vue';

import Transaction from './components/Transaction';
import Stepper from './components/Stepper';
import Countdown from './components/Countdown';

createApp({
	components: {
		Transaction,
		Stepper,
		Countdown
	}
}).mount('#app');
