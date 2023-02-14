<template>
  <div class="st st-pagination" v-if="props.links.length > 3">
    <div class=" st-pagination__wrapper">
      <template v-for="(link, p) in props.links" :key="p">
        <div v-if="link.url === null" class="st-link"
             v-html="link.label" />
        <NavLink v-else
                      :class="{ '--selected': link.active }" :href="link.url" v-html="link.label" />
      </template>
    </div>
  </div>
</template>

<script setup>
import NavLink from "@/Components/st-pagination-nav-link.vue";

const props = defineProps({
  links: [],
});
</script>

<style scoped lang="scss">
.st-pagination {

  &__wrapper {
    display: flex;
    flex-wrap: wrap;
    align-content: center;
    justify-content: center;

    margin-bottom: $--st-offset-xs;
  }
}
</style>
