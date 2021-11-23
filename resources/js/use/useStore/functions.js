import useStep from '../useStep'

export default {
    syncStatus: () => {
        const { step, firstStep } = useStep()
        const stepSaved = localStorage.getItem('step')
        if (stepSaved) step.value = parseInt(stepSaved)
        else localStorage.setItem('step', firstStep)
    },
}
