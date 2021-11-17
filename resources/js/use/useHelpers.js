import useStep from './useStep'
import { reactive } from 'vue'

const state = reactive({
    payer: {
        name: undefined,
        surname: undefined,
        documentType: undefined,
        document: undefined,
        email: undefined,
        mobile: undefined,
    },
    paymentMethod: {
        category: undefined,
    },
})

const syncStatus = () => {
    const { step, firstStep } = useStep()
    const stepSaved = localStorage.getItem('step')
    if (stepSaved) step.value = parseInt(stepSaved)
    else localStorage.setItem('step', firstStep)
}

export default function useHelpers() {
    return {
        state,
        syncStatus,
    }
}
