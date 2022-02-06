<template>
  <va-create-layout>
    <cities-form :title="title" :item="item"></cities-form>
  </va-create-layout>
</template>

<script>
export default {
  props: ["title", "item"],
};
</script>
