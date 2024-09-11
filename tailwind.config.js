module.exports = {
  content: [
		'./resources/views/**/*.blade.php',
		 './resources/js/**/*.js',
		 "./vendor/robsontenorio/mary/src/View/Components/**/*.php"
	],
  theme: {
    extend: {},
  },
  plugins: [
		require("daisyui")
	],
}
