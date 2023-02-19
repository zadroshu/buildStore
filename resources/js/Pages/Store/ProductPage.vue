<template>
  <div class="st-product-page">
    <h1>Content</h1>
    <st-label :value="props.product.id + ' ' + props.product.name" />
  </div>
</template>

<script setup>
import StLabel from "@/Components/primitives/st-label.vue";

const props = defineProps({
  product: Object,
})
</script>

<style scoped lang="scss">

</style>
