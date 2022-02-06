<template>
  <va-form
    :id="id"
    :item="item"
    disable-redirect
    @saved="$emit('saved')"
    v-model="model"
  >
    <va-text-input source="name"></va-text-input>
    <va-text-input source="email" type="email"></va-text-input>
    <va-password-input source="password"></va-password-input>
    <va-password-input source="password_confirmation"></va-password-input>
    <va-boolean-input source="active"></va-boolean-input>
    <va-select-input source="roles" multiple></va-select-input>
    <va-save-button></va-save-button>
  </va-form>
</template>

<script>
export default {
  props: ["id", "item"],
  data() {
    return {
      choices: ["manager", "operator"],
      model: {
        active: true,
        roles: [],
      },
    };
  },
  methods: {
    hasRole(role) {
      console.log(role);
      return (this.model.roles || []).includes(role);
    },
  },
};
</script>
