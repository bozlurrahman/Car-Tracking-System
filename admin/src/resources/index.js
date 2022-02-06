export default [
  {
    name: "users", icon: "mdi-account", routes: ["list"],
    permissions: [
      "manager",
      { name: "operator", actions: ["list", "show"] },
    ],
  },
  {
    name: "cars",
    icon: "mdi-car",
    label: "title",
    translatable: "description, summary",
    permissions: [
      "manager",
      { name: "operator", actions: ["list", "show"] },
    ],
  },
  {
    name: 'cities',
    icon: 'mdi-alien',
    label: 'name',
    translatable: true,
    actions: undefined
  }
];
