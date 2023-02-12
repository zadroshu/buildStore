<template>
  <div>
    <button class="st st-button" :type="props.type">
      {{ props.value }}
    </button>
  </div>
</template>

<script setup>
import {ref} from "vue";

const props = defineProps({
  value: ref(''),
  type: ref('button')
})
</script>

<style scoped lang="scss">
.st-button {
  width: 16.5rem;
  height: 4.9rem;

  background-color: $--st-white;
  border-radius: 10px;
  border: 2px solid $--st-red;

  cursor: pointer;
}

.st-button:hover {
  background-color: $--st-input-bg;
  transition-delay: .2ms;
}

</style>
