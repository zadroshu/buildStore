<template>
  <div class="st-app">
    <div class="st-app__header">
      <h1>header</h1>
    </div>

    <div class="st-app__body">
      <!--    <update-product :props="props.products.data[1]" />-->
      <div v-for="product in props.products.data" :key="product.id">
        {{ product.name }}
      </div>
    </div>

    <div class="st-app__footer">
      <st-pagination :links="props.products.links"/>
    </div>
  </div>
</template>

<script setup>
import ProductForm from "@/Components/ProductForm.vue";
import UpdateProduct from "@/Pages/Store/UpdateProduct.vue";
import StPagination from "@/Components/primitives/st-pagination.vue";

const props = defineProps({
  products: Object,
});
console.log(props.products.data)

</script>

<style lang="scss">
.st-app {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-content: stretch;

  min-height: 100%;

  &__header {
    flex: 0 0 auto;
  }

  &__body {
    flex: 1 0 auto;
  }

  &__footer {
    flex: 0 0 auto;
  }

}
</style>
