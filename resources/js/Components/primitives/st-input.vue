<template>
  <div class="st-input">
    <st-label :value="label" />
    <input>

  </div>
</template>

<script>
import StLabel from "@/Components/primitives/st-label.vue";
export default {
  components: {StLabel},

  props: {
    label: String | Number,
    disabled: Boolean,
  },
  data() {
    return {
      input: '',
    };
  },
}
</script>

<style scoped lang="scss">

</style>
