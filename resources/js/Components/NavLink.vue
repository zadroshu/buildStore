<script setup>
import {computed} from 'vue';
import {Link} from '@inertiajs/vue3';

const props = defineProps(['href', 'active']);

const classes = computed(() =>
  props.active
    ? '--selected'
    : ''
);
</script>

<template>
  <Link class="st-link" :href="href" :class="classes">
    <slot/>
  </Link>
</template>

<style lang="scss">

.--selected,
.st-link:hover,
.st-link {
  text-decoration: none;
  margin-right: 1rem;
  border: 0.5px solid $--st-gray;
  border-radius: 0.5rem;
  cursor: pointer;

  padding: 1rem 2rem;
  background-color: $--st-white;
}

.st-link:hover {
  background-color: $--st-input-bg;
  cursor: pointer;
  transition: .2s;
}

.--selected {
  color: $--st-red;
}
</style>
