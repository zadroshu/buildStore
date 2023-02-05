<script setup>

import {useForm} from '@inertiajs/vue3';
import stInput from "@/Components/primitives/st-input.vue";

const form = useForm({
  name: '',
  category: -1,
  cost: 0,
  discount: 0,
  description: '',
  img: '',
});
</script>

<template>
  <form class="create-product-form"
        @submit.prevent="form.post(route('products.store'), { onSuccess: () => form.reset() })">

    <st-input :label="'Name:'" :disabled="false"/>

    <label>Category: </label>
    <input v-model="form.category" type="number">

    <span>Cost: </span>
    <input v-model="form.cost" type="number">

    <span>Discount: </span>
    <input v-model="form.discount" type="number">

    <span>description: </span>
    <textarea v-model="form.description"></textarea>

    <span>Image src: </span>
    <input v-model="form.img" type="text">

    <InputError :message="form.errors.message" class="mt-2"/>
    <PrimaryButton class="mt-4">Chirp</PrimaryButton>

  </form>
</template>

<style scoped lang="scss">
.create-product-form {
  display: grid;

}

</style>
