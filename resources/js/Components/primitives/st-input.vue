<template>
  <div class="st-input">
    <div class="st-input__body">
      <st-label v-if="props.label !== ''" :value="props.label" color="gray"/>
      <div v-if="props.type === 'number'" class="st-input__input">
        <input v-model="value" type="number" min="0" placeholder="введите число..."
               @input="$emit('update:value', $event.target.value)"
        >
      </div>
      <div v-else-if="props.type === 'password'" class="st-input__input">
        <input v-model="value" type="password"
               pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,12}$"
               placeholder="введите пароль..."
               @input="$emit('update:value', $event.target.value)"
        >
      </div>
      <div v-else-if="props.type === 'email'" class="st-input__input">
        <input v-model="value" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
               placeholder="введите email..."
               @input="$emit('update:value', $event.target.value)"
        >
      </div>
      <div v-else class="st-input__input">
        <input v-model="value" type="text"
               placeholder="введите текст..."
               @input="$emit('update:value', $event.target.value)"
        >
      </div>
    </div>
  </div>
</template>

<script setup>
import StLabel from "@/Components/primitives/st-label.vue";
import {ref} from "vue";


const props = defineProps({
  label: String | Number,
  disabled: Boolean,
  type: 'number' | 'text' | 'phone' | 'email' | 'password',
});
const emit = defineEmits(['input']);

let value = ref();
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
