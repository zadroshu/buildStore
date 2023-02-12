<template>
  <div>
    {{props.product.id}}
  </div>
</template>

<script setup>
const props = defineProps({
  product: Object,
});

console.log(this.props)
</script>

<style scoped>

</style>
