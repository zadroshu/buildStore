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

    <st-input v-model="form.name" :label="'Название'" type="text" @input="form.name = $event.data" />
    <st-input v-model="form.category" :label="'Категория'" type="number" @input="form.category = $event.data" />
    <st-input v-model="form.cost" :label="'Цена'" type="number" @input="form.cost = $event.data" />
    <st-input v-model="form.discount" :label="'Скидка'" type="number" @input="form.discount = $event.data" />
    <st-input v-model="form.description" :label="'Описание'" type="text" @input="form.description = $event.data" />
    <st-input v-model="form.img" :label="'Ссылка на картинку'" type="text" @input="form.img = $event.data" />

    <button type="submit">Создать</button>


<!--    <label>Category: </label>-->
<!--    <input v-model="form.category" type="number">-->

<!--    <span>Cost: </span>-->
<!--    <input v-model="form.cost" type="number">-->

<!--    <span>Discount: </span>-->
<!--    <input v-model="form.discount" type="number">-->

<!--    <span>description: </span>-->
<!--    <textarea v-model="form.description"></textarea>-->

<!--    <span>Image src: </span>-->
<!--    <input v-model="form.img" type="text">-->

<!--    <InputError :message="form.errors.message" class="mt-2"/>-->
<!--    <PrimaryButton class="mt-4">Chirp</PrimaryButton>-->

  </form>
</template>

<style scoped lang="scss">
.create-product-form {
  width: 60%;
  display: grid;
  grid-template-columns: auto auto;
  justify-content: center;

}

</style>
