<script setup>
    import Pagination from '@/Components/UI/Pagination.vue';
    import MainLayout from '@/Layouts/MainLayout.vue';
    import Listing from '@/Pages/Listing/Index/Components/Listing.vue';
    import Filters from '@/Pages/Listing/Index/Components/Filters.vue';
    const props = defineProps({
        message: String,
        listings: Object
    });
</script>
<script>
    export default {
        layout: MainLayout
    }
</script>
<template>
    <Filters/>
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <Listing v-for="listing in listings.data" :key="listing.id"
        :listing="listing"/>
    </div>
    <div v-if="listings.data.length" class="w-full flex justify-center my-4">
        <Pagination :links="listings.links" />
    </div>
</template>