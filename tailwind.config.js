const theme = require('./theme.json');
const tailpress = require('@jeffreyvr/tailwindcss-tailpress');
const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './*.php',
    './**/*.php',
    './resources/css/*.css',
    './resources/js/*.js',
    './safelist.txt',
  ],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        md: '1.5rem',
        xl: '2rem',
      },
    },
    extend: {
      colors: {
        brand: {
          red: '#E2001A',
          reddark: '#BF2031',
          blue: '#1068F0',
          bluedark: '#002F56',
          bluesky: '#00BBF0',
          orange: '#F8810A',
          yellow: '#FFCB00',
          purple: '#6852ED',
          gray: '#545454',
          graylight: '#949494',
          graylighter: '#DADDE4',
          beigelight: '#F3F1EF',
        },
        'tkw-red': '#E2001A',
        'tkw-red-dark': '#BF2031',
        'tkw-black': '#191919',
        'tkw-white': '#FFFFFF',
        'tkw-grey-dark': '#545454',
        'tkw-grey': '#949494',
        'tkw-grey-light': '#DADDE4',
        'tkw-grey-lightest': '#F3F1EF',
        'tkw-blue': '#0004EB',
        'tkw-blue-dark': '#02327E',
        'tkw-alert-error-bg': '#FEEBEB',
        'tkw-alert-error-text': '#BF2031',
        'tkw-alert-success-bg': '#E5F2FF',
        'tkw-alert-success-text': '#002F56',
        'tkw-alert-notice-bg': '#FEF2EB',
        'tkw-alert-notice-text': '#D84910',
      },
      fontFamily: {
        sans: ['Poppins', ...defaultTheme.fontFamily.sans],
        nunito: ['Nunito', ...defaultTheme.fontFamily.sans],
      },
      typography: {
        DEFAULT: {
          css: {
            color: '#454545',
            a: {
              color: '#EA3325',
              '&:hover': {
                color: '#BF2031',
              },
            },
            h1: {
              fontWeight: '300',
            },
            h2: {
              fontWeight: '600',
            },
            h3: {
              fontWeight: '600',
            },
            h4: {
              fontWeight: '600',
            },
            h5: {
              fontWeight: '400',
            },
            h6: {
              fontWeight: '900',
            },
          },
        },
      },
    },
    screens: {
      // sm: '640px',
      // md: '768px',
      // lg: '1024px',
      // xl: '1140px',
      // '2xl': '1400px',
      xs: '480px',
      sm: '600px',
      md: '782px',
      lg: '1024px',
      xl: '1280px',
      '2xl': '1440px',
      '3xl': '1536px',
      '4xl': '1760px',
    },
  },
  corePlugins: {
    aspectRatio: false,
  },
  plugins: [
    tailpress.tailwind,
    require('daisyui'),
    require('@tailwindcss/typography'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/line-clamp'),
    require('@tailwindcss/aspect-ratio'),
  ],
  daisyui: {
    styled: true,
    themes: true,
    base: true,
    utils: true,
    logs: true,
    rtl: false,
    prefix: '',
    darkTheme: false,
  },
};
