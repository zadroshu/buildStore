<template>
  <div class="st-input">
    <div class="st-input__body">
      <st-label v-if="label !== ''" :value="label" color="gray" />
      <div v-if="type === 'number'" class="st-input__input">
        <input type="number" min="0" v-model="input" placeholder="введите число..." @input="$emit('input', input)">
      </div>
      <div v-else-if="type === 'password'" class="st-input__input">
        <input type="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$"
               placeholder="введите пароль..." v-model="input" @input="$emit('input', input)">
      </div>
      <div v-else-if="type === 'email'" class="st-input__input">
        <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="введите email..."
               @input="$emit('input', input)">
      </div>
      <div v-else class="st-input__input">
        <input type="text" placeholder="введите текст..." @input="$emit('input', input)">
      </div>
    </div>
  </div>
</template>

<script>
import StLabel from "@/Components/primitives/st-label.vue";

export default {
  components: {StLabel},

  props: {
    label: String | Number,
    disabled: Boolean,
    type: 'number' | 'text' | 'phone' | 'email' | 'password',
  },
  data() {
    return {
      input: '',
    };
  },
}
</script>

<style scoped lang="scss">
.st-input {
  width: 36rem;
  height: 10rem;
  background-color: $--st-input-bg;
  border-radius: 5px;

  margin: $--st-offset-m;

  display: flex;
  justify-content: center;
  align-content: center;

  &__body {
    height: 4rem;
    margin: $--st-offset-l $--st-offset-xl 3.4rem $--st-offset-xl;

    .st-label {
      font-size: $--st-font-small;
    }
  }

  &__input {
    font-size: 1.6rem;
    line-height: 2rem;

    input {
      border: none;
      background-color: $--st-input-bg;
      padding: $--st-offset-xs;

      border-bottom: .2rem solid $--st-black;
    }

    input:focus {
      outline: none;
    }
  }
}
</style>
