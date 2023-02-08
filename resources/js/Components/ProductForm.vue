<script setup>

import {useForm} from '@inertiajs/vue3';
import stInput from "@/Components/primitives/st-input.vue";
import {ref} from "vue";

const form = useForm({
  name: ref(''),
  category: ref(-1),
  cost: ref(0),
  discount: ref(0),
  description: ref(''),
  img: ref(''),
});
</script>

<template>
  <form class="create-product-form"
        @submit.prevent="form.post(route('products.store'), { onSuccess: () => form.reset() })">

    <st-input v-model:value="form.name" :label="'Название'" type="text" />
    <st-input v-model:value="form.category" :label="'Категория'" type="number" />
    <st-input v-model:value="form.cost" :label="'Цена'" type="number" />
    <st-input v-model:value="form.discount" :label="'Скидка'" type="number" />
    <st-input v-model:value="form.description" :label="'Описание'" type="text" />
    <st-input v-model:value="form.img" :label="'Ссылка на картинку'" type="text" />

    <button class="st-grid-row" type="submit">Создать</button>
  </form>
</template>

<style scoped lang="scss">
.create-product-form {
  width: 60%;
  margin: 0 auto;

  border-radius: 5px;

  background-color: $--st-white;

  display: grid;
  grid-template-columns: auto auto;
  justify-content: center;
  grid-gap: $--st-offset-xl;

}

</style>
