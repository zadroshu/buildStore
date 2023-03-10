<template>
  <div class="st-product-list">
    <st-product-card v-for="product in products" :key="product.id" :product="product" />
  </div>
</template>

<script setup>
import StProductCard from "@/Components/primitives/st-product-card.vue";


const props = defineProps({
  products: Array,
})
</script>

<style scoped lang="scss">
.st-product-list {
  display: grid;
  grid-template-columns: repeat(3, auto);
  justify-items: center;
  justify-content: center;
  gap: 7rem 5rem;

  padding: 3rem;
}
</style>
