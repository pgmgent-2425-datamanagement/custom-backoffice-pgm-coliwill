module.exports = {
  proxy: "https://backoffice-sharedepot.ddev.site", // Replace with your ddev site URL
  files: ["./public/css/*.css", "./views/**/*.php", "./public/**/*.html"],
  notify: false,
  open: false,
};
