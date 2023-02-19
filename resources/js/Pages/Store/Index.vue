<template>
  <div class="st-index">
    <st-product-list :products="props.products.data"/>
    <st-pagination :links="props.products.links"/>
  </div>
</template>

<script setup>
import StPagination from "@/Components/primitives/st-pagination.vue";
import StProductList from "@/Components/primitives/st-product-list.vue";

const props = defineProps({
  products: Object,
});


</script>

<style lang="scss">

</style>
