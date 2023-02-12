<script setup>

import {useForm} from '@inertiajs/vue3';
import {ref} from "vue";
import StButton from "@/Components/primitives/st-button.vue";

const props = defineProps(['product']);
console.log(this.props)
const form = useForm({
  name: ref(props.product.name ? props.product.name : ''),
  category: ref(props.product.category ? props.product.category : -1),
  cost: ref(props.product.cost ? props.product.cost : 0),
  discount: ref(props.product.discount ? props.product.discount : 0),
  description: ref(props.product.description ? props.product.description : ''),
  img: ref(props.product.img ? props.product.img : ''),
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

    <st-button class="st-grid-row" value="Создать" type="submit" />
  </form>
</template>

<style scoped lang="scss">
.create-product-form {
  width: 60%;
  margin: $--st-offset-xs auto;

  padding: $--st-offset-xs;

  border-radius: 5px;

  background-color: $--st-white;

  display: grid;
  grid-template-columns: auto auto;
  justify-content: center;
  grid-gap: $--st-offset-xl;

  .st-grid-row {
    margin: 0 auto;
  }

}

</style>
