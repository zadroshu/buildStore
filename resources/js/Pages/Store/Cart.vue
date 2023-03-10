<template>
  <div class="st-cart">
    <div v-if="props.products.length > 0" class="st-cart__grid">
      <template v-for="product in props.products" :key="product.id">
        <st-label :value="product.name"/>
        <st-label value="Количество" />
        <st-label :value="product.cost"/>
        <deleteIcon class="st-cart__delete-icon" @click/>
      </template>
    </div>

    <div v-else>
      Корзина пуста :(
    </div>
  </div>
</template>

<script setup>
import StLabel from "@/Components/primitives/st-label.vue";
import deleteIcon from '../../../images/deleteIcon.svg';
import {ref} from "vue";


const props = defineProps({
  products: [],
});

let iconColor = ref('#000000');

</script>

<style lang="scss">
.st-cart {
  &__grid {
    display: grid;
    grid-template-columns: auto auto auto min-content;
    justify-content: center;
    align-items: center;
    grid-gap: $--st-offset-xl;
  }

  &__delete-icon:hover {
    fill: $--st-red;
    transition: .2s;
  }

  &__delete-icon {
    width: $--st-offset-l;
    height: $--st-offset-l;
    cursor: pointer;
    fill: $--st-gray;
  }


}
</style>
