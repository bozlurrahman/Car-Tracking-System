<template>
  <base-material-card :icon="resource.icon" :title="title">
    <va-list :filters="filters">
      <va-data-table :fields="fields"> </va-data-table>
    </va-list>
  </base-material-card>
</template>

<script>
export default {
  props: ["resource", "title"],
  data() {
    return {
      filters: ["title", "author", { source: "commentable", type: "boolean" }],
      fields: [
        { source: "title", sortable: true },
        { source: "author", sortable: true },
        { source: "commentable", type: "boolean" },
        { source: "price", type: "number", sortable: true },
        { source: "publication_date", type: "date", sortable: true },
      ],
    };
  },
};
</script>
