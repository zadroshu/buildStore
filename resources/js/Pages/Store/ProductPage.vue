<template>
  <div class="st-product-page">
    <div class="st-product-page__header">
      <st-label :value="props.product.name" />
    </div>
    <div class="st-product-page__grid">
      <div class="st-product-page__grid-left">
        <img :src="props.product.img ?? 'https://via.placeholder.com/250x310/09f/fff.png'">
      </div>
      <div class="st-product-page__grid-right">
        <st-label :value="'Категория: ' + props.product.category" />
        <div v-if="props.product.discount > 0" class="st-product-page__cost">
          <st-label :value="'Цена: '" />
          <st-label :value="props.product.cost" class="st-product-page__cost-line-throuthed" />
          <st-label :value="props.product.cost - props.product.discount" />
        </div>
        <st-label v-else :value="'Цена: ' + props.product.cost" />
        <st-label :value="'В наличии: ' + props.product.in_stock" />
        <st-label :value="'Описание: '" />
        <st-label :value="props.product.description" />
      </div>
    </div>
  </div>
</template>

<script setup>
import StLabel from "@/Components/primitives/st-label.vue";
import {onMounted} from "vue";

const props = defineProps({
  product: Object,
})

onMounted(()=> {
  console.log(props.product)
})
</script>

<style scoped lang="scss">
.st-product-page {
  &__header {
    margin: $--st-offset-xs;
    font-size: $--st-font-large;
  }
  &__grid {
    display: grid;
    grid-template-columns: 1fr 2fr;
    gap: $--st-offset-xs;
  }
  &__cost {
    display: grid;
    grid-template-columns: repeat(3, min-content);
    gap: $--st-offset-xs;
  }
  &__cost-line-throuthed {
    text-decoration: line-through;
  }
  &__grid-right {
    display: grid;
    grid-template-columns: auto;
    gap: $--st-offset-xs;
  }
}
</style>
