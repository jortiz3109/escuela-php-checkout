import { ref } from 'vue';

const step = ref(1);

export default function () {
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

	function inStep(value) {
		return step.value === value;
	}

	return {
		step,
		firstStep,
		lastStep,
		stepBack,
		stepForward,
		inStep
	};
}
