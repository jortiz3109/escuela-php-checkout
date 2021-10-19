import { ref } from 'vue';

const step = ref(1);
const firstStep = 1;
const lastStep = 4;

function stepBack() {
	if (step.value > firstStep) {
		step.value--;
	}
}

function stepForward() {
	if (step.value < lastStep) {
		step.value++;
	}
}

function isStepEqual(value) {
	return step.value === value;
}

export default function () {
	return {
		step,
		stepBack,
		stepForward,
		isStepEqual
	};
}
