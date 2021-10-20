<template>
    <div class="flex flex-col w-1/5 items-center">
        <div class="flex relative justify-between w-full">
            <div class="flex flex-col items-center z-10">
                <div class="step-circle border-blue-900">1</div>
                <p class="step-text">payer data</p>
            </div>
            <div class="flex flex-col items-center z-10">
                <div class="step-circle" :class="step < 2 ? 'border-blue-100' : 'border-blue-900'">2</div>
                <p class="step-text">select method</p>
            </div>
            <div class="flex flex-col items-center z-10">
                <div class="step-circle" :class="step < 3 ? 'border-blue-100' : 'border-blue-900'">3</div>
                <p class="step-text">payment data</p>
            </div>
            <div class="absolute w-5/6 self-center left-4 top-1/4">
                <div class="bar bg-blue-100 w-full"></div>
                <div class="bar bg-blue-900 transition-bar" :class="barLength()"></div>
            </div>
        </div>
    </div>
</template>

<script>
import useStep from "../functions/useStep";

export default {
	name: 'Stepper',

    setup () {
        const { step } = useStep();

        function barLength() {
            const lengths = {
                step1: 'w-1/4',
                step2: 'w-3/4',
                step3: 'w-full'
            }

            return lengths['step'+step.value]
        }

        return { step, barLength }
    }
};
</script>

<style scoped>
    .step-circle {
        @apply flex bg-white border-4 h-10 w-10 rounded-full font-bold justify-center items-center shadow;
        transition: border-color 0.5s ease-in-out 0.1s;
    }

    .step-text {
        @apply text-center text-sm;
    }

    .bar {
        @apply absolute self-center h-1.5 rounded-full z-0 shadow;
    }

    .transition-bar {
        transition: width 0.5s ease-out;
    }
</style>
