import { ref } from 'vue'

const step = ref(1)

const firstStep = 1
const lastStep = 4

const stepBack = () => (step.value > firstStep ? localStorage.setItem('step', (--step.value).toString()) : null)
const stepForward = () => (step.value < lastStep ? localStorage.setItem('step', (++step.value).toString()) : null)
const inStep = (value) => step.value === value

export default function () {
    return {
        step,
        firstStep,
        lastStep,
        stepBack,
        stepForward,
        inStep,
    }
}
