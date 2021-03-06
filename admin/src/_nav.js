/* eslint-disable no-unused-vars */

export default (i18n, admin) => {
  console.log("aaaadmin", admin);
  return [
    {
      icon: "mdi-view-dashboard",
      text: i18n.t("menu.dashboard"),
      link: "/",
    },
    { divider: true },
    admin.can(["manager"]) && admin.getResourceLink("users"),
    admin.getResourceLink("cars"),
    admin.getResourceLink("cities"),
  ];
};
