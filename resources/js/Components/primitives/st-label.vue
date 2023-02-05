<template>
  <div class="st-label">
    <span>{{value}}</span>
  </div>
</template>

<script>
export default {
  name: 'st-label',
  props: {
    value: String | Number,
    disabled: Boolean,
  },
  data() {
    return {
      value: this.value ? this.value : '',
      disabled: this.disabled ? this.disabled : false,
    };
  }
}
</script>

<style scoped lang="scss">
  .st-label {
    height: 2rem;
    font-size: 2rem;

    padding: $--st-offset-m;
  }
</style>
