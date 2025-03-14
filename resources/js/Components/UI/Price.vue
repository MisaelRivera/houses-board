<script setup>
    import { computed } from 'vue';
    const props = defineProps({
        price: [Number, String],
        currency: String,
        country: String,
        digits: {
            type: [Number, String],
            default: 2,
        }
    });

    const formattedPrice = computed(
        () => Number(props.price).toLocaleString(props.country, {
            style: 'currency',
            currency: props.currency,
            maximumFractionDigits: Number(props.digits),
        })
    );
</script>
<template>
    <span>{{ formattedPrice }}</span>
</template>