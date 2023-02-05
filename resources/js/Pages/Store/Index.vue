!
<template>
  <div>
    <product-form />
    <div v-for="product in products" :key="product.id">
      {{product.name}}
    </div>
  </div>
</template>

<script setup>
  import ProductForm from "@/Components/ProductForm.vue";

  defineProps(['products']);
</script>

<style scoped>

</style>
