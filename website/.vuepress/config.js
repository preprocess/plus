module.exports = {
  title: ' ',
  description: 'Plus is a superset of PHP that makes PHP cool again',
  sidebar: true,
  themeConfig: {
    displayAllHeaders: true,
    repo: 'php-plus',
    sidebar: [
      '/prologue',
      '/get-started',
      '/handbook',
      '/contribute',
      '/funding'
    ]
  },
  plugins: [
    '@vuepress/google-analytics',
    {
      'ga': 'G-5KRDNW05T'
    }
  ]
}
