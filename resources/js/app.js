require('./bootstrap');

require('alpinejs');

import { createApp } from 'vue';

import Transaction from './components/Transaction';
import Countdown from './components/Countdown';

createApp({
	components: {
		Transaction,
		Countdown
	}
}).mount('#app');
