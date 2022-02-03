<template>
  <va-edit-layout>
    <cars-form :id="id" :title="title" :item="item"></cars-form>
  </va-edit-layout>
</template>

<script>
export default {
  props: ["id", "title", "item"],
};
</script>
