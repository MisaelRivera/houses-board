<script setup>
    import { useForm } from '@inertiajs/vue3';
    import MainLayout from '@/Layouts/MainLayout.vue';
    const formState = useForm({
        beds: null,
        baths: null,
        area: null,
        city: null,
        code: null,
        street: null,
        street_nr: null,
        price: null,
    });

    const handleCreateList = () => {
        formState.post('/listing');
    };
</script>
<template>
    <MainLayout>
            <form @submit.prevent="handleCreateList">
                <div class="grid grid-cols-6 gap-4">
                    <div class="col-span-2">
                        <label for="beds" class="label">Beds</label>
                        <input 
                            type="number"
                            id="beds"
                            class="input"
                            v-model="formState.beds">
                        <p v-if="formState.errors['beds']"
                            class="input-error">
                            {{ formState.errors['beds'] }}
                        </p>
                    </div>
                    <div class="col-span-2">
                        <label for="baths" class="label">Baths</label>
                        <input 
                            type="number"
                            id="baths"
                            class="input"
                            v-model="formState.baths">
                            <p 
                                v-if="formState.errors['baths']"
                                class="input-error">
                                {{ formState.errors['baths'] }}
                            </p>
                    </div>
                    <div class="col-span-2">
                        <label for="area" class="label">Area</label>
                        <input 
                            type="number"
                            id="area"
                            class="input"
                            v-model="formState.area">
                        <p v-if="formState.errors['area']"
                            class="input-error">
                            {{ formState.errors['area'] }}
                        </p>
                    </div>
                    <div class="col-span-4">
                        <label for="city" class="label">City</label>
                        <input 
                            type="text"
                            id="city"
                            class="input"
                            v-model="formState.city">
                        <p 
                            v-if="formState.errors['city']"
                            class="input-error">
                            {{ formState.errors['city'] }}
                        </p>
                    </div>
                    <div class="col-span-2">
                        <label for="code" class="label">Post code</label>
                        <input 
                            type="text"
                            id="code"
                            class="input"
                            v-model="formState.code">
                        <p v-if="formState.errors['code']"
                            class="input-error">
                            {{ formState.errors['code'] }}
                        </p>
                    </div>
                    <div class="col-span-4">
                        <label for="street" class="label">Street</label>
                        <input 
                            type="text"
                            id="street"
                            class="input"
                            v-model="formState.street">
                        <p v-if="formState.errors['street']"
                            class="input-error">
                            {{ formState.errors['street'] }}
                        </p>
                    </div>
                    <div class="col-span-2">
                        <label for="street_nr" class="label">Street Nr</label>
                        <input 
                            type="text"
                            id="street_nr"
                            class="input"
                            v-model="formState.street_nr">
                        <p v-if="formState.errors['street_nr']"
                            class="input-error">
                            {{ formState.errors['street_nr'] }}
                        </p>
                    </div>
                    <div class="col-span-6">
                        <label for="price" class="label">Price</label>
                        <input 
                            type="text"
                            id="price"
                            class="input"
                            v-model="formState.price">
                        <p v-if="formState.errors['price']"
                            class="input-error">
                            {{ formState.errors['price'] }}
                        </p>
                    </div>
                    <input 
                        type="submit" 
                        value="Create" 
                        class="btn-primary">
                </div>
            </form>
    </MainLayout>
</template>