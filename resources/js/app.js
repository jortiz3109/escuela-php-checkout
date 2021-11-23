require('./bootstrap')

import { createApp } from 'vue'

import Cleave from 'vue-cleave-component'
import { useStore } from './use'
import Countdown from './components/Countdown'
import Stepper from './components/Stepper'
import Transaction from './components/Transaction'

const app = createApp({
    components: {
        Countdown,
        Stepper,
        Transaction,
    },
    setup() {
        const { syncStatus } = useStore()
        syncStatus()
    },
})
app.use(Cleave)
app.mount('#app')
