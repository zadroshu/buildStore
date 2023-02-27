<template>
  <div class="st-product-card">
    <div class="st-product-card__img-wrapper">
      <Link :href="route('product.show', {id: props.product.id})" >
        <img class="st-product-card__img-wrapper-img" src="https://via.placeholder.com/250x310/09f/fff.png">
      </Link>
      <div class="st-product-card__img-add-to-cart">
        <img
          src="../../../images/add-to-cart.svg"
          :class="{'st-product-card--hover': isHover}"
          @mouseenter="isHover = true"
          @mouseleave="isHover = false"
          @click="addToCart"
        />
      </div>
    </div>

    <st-label :value="props.product.name" color='white'/>
    <st-label :value="props.product.cost"/>
  </div>
</template>

<script setup>
import StLabel from "@/Components/primitives/st-label.vue";
import {ref} from "vue";
import {Link} from '@inertiajs/vue3';
import axios from "axios";

const props = defineProps({
  product: Object,
})
let isHover = ref(false);

function addToCart() {
  console.log(props.product);
}
function goto() {
  // console.log(props.product.id);
  axios.get(route('product.show', { 'id': props.product.id } ));
  // router.visit(`product/${props.product.id}`, { method: 'post', data: props.product.id })

}

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
