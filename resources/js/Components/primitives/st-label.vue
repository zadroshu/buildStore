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
    height: 1.4rem;
    width: 100%;

    margin: $--st-offset-xs 0;
  }
  [color = 'gray'].st-label {
    color: $--st-gray;
  }
  [color = 'black'].st-label {
    color: $--st-black;
  }
</style>
