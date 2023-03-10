<template>
  <div class="st-product-card">
    <div class="st-product-card__img-wrapper">
      <Link :href="$route('product.show', props.product.id)" >
        <img class="st-product-card__img-wrapper-img" src="https://via.placeholder.com/250x310/09f/fff.png">
      </Link>
      <Link :href="$route('product.to_cart', props.product.id)" preserve-scroll class="st-product-card__img-add-to-cart">
        <img
          src="../../../images/add-to-cart.svg"
          :class="{'st-product-card--hover': isHover}"
          @mouseenter="isHover = true"
          @mouseleave="isHover = false"
        />
      </Link>
    </div>

    <st-label :value="props.product.name" color='white'/>
    <st-label :value="props.product.cost"/>
  </div>
</template>

<script setup>
import StLabel from "@/Components/primitives/st-label.vue";
import {ref} from "vue";
import {Link, router} from '@inertiajs/vue3';

const props = defineProps({
  product: Object,
})
let isHover = ref(false);

</script>

<style scoped lang="scss">

.st-product-card {
  //width: 28rem;
  //height: 41rem;

  &--hover {
    transition: background-color .5s;
    background-color: red;
    border-radius: 50%;
  }

  &__img-wrapper {
    position: relative;

    border-radius: 1rem;
  }

  &__img-wrapper-img {
    border-radius: 1rem;
  }

  &__img-add-to-cart {
    position: absolute;

    right: 0;
    top: 0;

    padding: $--st-offset-xs;
  }
}


</style>
