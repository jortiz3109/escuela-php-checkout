<template>
    <svg
        width="200px"
        height="200px"
        display="block"
        style="background:#fff;margin:auto"
        preserveAspectRatio="xMidYMid"
        viewBox="0 0 100 100"
        xmlns="http://www.w3.org/2000/svg"
    >
        <circle
            cx="50"
            cy="50"
            r="30"
            fill="none"
            stroke="#ddd"
            stroke-width="10"
        />
        <circle
            cx="50"
            cy="50"
            r="30"
            fill="none"
            stroke="#4b5563"
            stroke-linecap="round"
            stroke-width="8"
        >
            <animateTransform
                attributeName="transform"
                dur="1s"
                keyTimes="0;0.5;1"
                repeatCount="indefinite"
                type="rotate"
                values="0 50 50;180 50 50;720 50 50"
            />
            <animate
                attributeName="stroke-dasharray"
                dur="1s"
                keyTimes="0;0.5;1"
                repeatCount="indefinite"
                values="18.84955592153876 169.64600329384882;94.2477796076938 94.24777960769377;18.84955592153876 169.64600329384882"
            />
        </circle>
    </svg>
</template>

<script>
export default {
    name: 'Loading',
}
</script>
