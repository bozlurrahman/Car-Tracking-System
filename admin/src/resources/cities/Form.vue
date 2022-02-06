<template>
  <va-form :id="id" :item="item">
    <v-row justify="center">
      <v-col sm="6">
        <base-material-card>
          <template v-slot:heading>
            <div class="display-2">
              {{ title }}
            </div>
          </template>
          <v-card-text>
            <va-text-input source="name" required></va-text-input>
            <va-boolean-input source="active"></va-boolean-input>
            <va-text-input source="description" multiline></va-text-input>
            <va-select-input
              source="operator"
              reference="users"
              required
              model="user_id"
              :filter="{ roles: ['operator'] }"
              itemText="name"
              itemValue="id"
            ></va-select-input>

            <va-select-input
              source="car"
              model="car_id"
              reference="cars"
              required
            ></va-select-input>

            <!-- <va-autocomplete-input
              source="tags"
              multiple
              taggable
            ></va-autocomplete-input> -->
            <va-file-input source="avatar" preview></va-file-input>
            <va-file-input source="images" preview multiple></va-file-input>
          </v-card-text>
          <va-save-button></va-save-button>
        </base-material-card>
      </v-col>
    </v-row>
  </va-form>
</template>

<script>
export default {
  props: ["id", "title", "item"],
};
</script>
