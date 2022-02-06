<template>
  <va-edit-layout>
    <cities-form :id="id" :title="title" :item="item"></cities-form>
  </va-edit-layout>
</template>

<script>
export default {
  props: ["id", "title", "item"],
};
</script>
