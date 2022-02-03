<template>
  <va-create-layout>
    <cars-form :title="title" :item="item"></cars-form>
  </va-create-layout>
</template>

<script>
export default {
  props: ["title", "item"],
};
</script>
