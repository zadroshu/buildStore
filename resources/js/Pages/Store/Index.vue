<template>
  <div class="st-index">
    <div class="st-index__toolbar">
      <div>{{getState()}}</div>
      <Multiselect
        class="st-index__multiselect"
        v-model="comboboxValue"
        :options="comboboxOptions"
      />
      <autocomplete
      :search="search"
      placeholder="Поиск..."
      aria-label="Поиск по товарам"
      :get-result-value="getResultValue"
      @submit="onSubmit"
      >
      </autocomplete>
    </div>


    <st-product-list :products="props.products.data"/>
    <st-pagination :links="props.products.links"/>
  </div>
</template>

<script setup>
import StPagination from "@/Components/primitives/st-pagination.vue";
import StProductList from "@/Components/primitives/st-product-list.vue";
import Multiselect from '@vueform/multiselect';
import Autocomplete from '@trevoreyre/autocomplete-vue/Autocomplete.vue';
import {ref} from "vue";
import {router} from "@inertiajs/vue3";

const props = defineProps({
  products: Object,
});
let comboboxValue = ref(null);
const comboboxOptions = ref([
  'Паркет',
  'Клей для паркета',
  'Шпатели',
]);

function search(input) {
  if (input.length < 1) { return []; }
  return props.products.data.filter(product => {
    return product.name.toLowerCase()
      .startsWith(input.toLowerCase());
  })
}
function getResultValue(result) {
  return result.name;
}

function onSubmit(event) {
  router.get(`product/${event.id}`);
}

function getState() {

}


</script>

<style lang="scss">
.st-index {
  &__toolbar {
    display: flex;
  }
  &__multiselect {
    max-width: 30%;
  }
}
</style>
