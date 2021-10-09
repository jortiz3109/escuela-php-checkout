<template>
    <div class="relative flex items-center w-full">
        <div class="absolute bg-blue-100 shadow h-2 w-full rounded-full" />
        <div class="p-bar absolute bg-blue-800 shadow h-2 rounded-full"
            :class="{
                'w-0': step === 1,
                'w-1/3': step === 2,
                'w-2/3': step === 3,
                'w-full': step === 4,
            }"
        />
        <div class="flex justify-between w-full z-10">
            <div class="p-step" :class="{'p-step-active': step >= 1}">1</div>
            <div class="p-step" :class="{'p-step-active': step >= 2}">2</div>
            <div class="p-step" :class="{'p-step-active': step >= 3}">3</div>
            <div class="p-step" :class="{'p-step-active': step >= 4}">4</div>
        </div>
    </div>

    <button @click="goToPrev" class="shadow rounded px-2 py-1 bg-indigo-400 text-white font-bold mt-5 mr-5">prev</button>
    <button @click="goToNext" class="shadow rounded px-2 py-1 bg-indigo-400 text-white font-bold">next</button>
</template>

<script>
import { ref } from "vue";

export default {
    name: "ProgressBar",

    setup() {
        const step = ref(1);

        const goToNext = () => step.value < 4 ? step.value++ : null;
        const goToPrev = () => step.value > 1 ? step.value-- : null;

        return { step, goToNext, goToPrev }
    }
}
</script>
