<template>
  <base-material-card :icon="resource.icon" :title="title">
    <va-list :filters="filters" :include="['media']">
      <va-data-table :fields="fields"> </va-data-table>
    </va-list>
  </base-material-card>
</template>

<script>
export default {
  props: ["resource", "title"],
  data() {
    return {
      filters: ["name", { source: "active", type: "boolean" }],
      fields: [
        { source: "name", sortable: true },
        { source: "active", type: "boolean" },
        { source: "created_at", type: "date", sortable: true },
        { source: "updated_at", type: "date", sortable: true },
      ],
    };
  },
};
</script>
