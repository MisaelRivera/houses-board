<script setup>
    import { Link } from '@inertiajs/vue3';
    import ListingAddress from '@/Components/ListingAddress.vue';
    import Box from '@/Components/UI/Box.vue';
    import ListingSpace from '@/Components/ListingSpace.vue';
    import Price from '@/Components/UI/Price.vue';
    import { useMonthlyPayment } from '@/composables/useMonthlyPayment';
    const props = defineProps({
        listing: Object
    });
    const {monthlyPayment} = useMonthlyPayment(props.listing.price, 2.5, 25); 
</script>
<template>
    <Box>
            <div>
                <Link :href="route('listing.show', {listing})">
                    <div class="flex items-center gap-1">
                        <Price 
                            :price="listing.price"
                            :currency="`USD`"
                            country="en-US"
                            class="text-2xl font-bold"/>
                        <div class="text-xs text-gray-500">
                            <Price 
                                :price="monthlyPayment"/> pm
                        </div>
                    </div>
                    <ListingSpace :listing="listing" class="text-lg"/>
                    <ListingAddress :listing="listing" class="text-gray-500"/>
                </Link>
            </div>
            <div>
                <Link 
                    :href="route('listing.edit', { listing: listing.id })">
                    Editar
                </Link>
            </div>
            <div>
                <Link 
                    :href="route('listing.destroy', { listing: listing.id })" method="DELETE">
                    Delete
                </Link>
            </div>
        </Box>
</template>