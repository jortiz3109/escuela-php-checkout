require('./bootstrap')

import { createApp } from 'vue'

import { useHelpers } from './use'
import Countdown from './components/Countdown'
import Stepper from './components/Stepper'
import Transaction from './components/Transaction'

createApp({
    components: {
        Countdown,
        Stepper,
        Transaction,
    },
    setup() {
        const { syncStatus } = useHelpers()
        syncStatus()
    },
}).mount('#app')
