module.exports = {
    content: [
        "./src/**/*.{html,js}",
        "./resources/**/*.blade.php"
    ],
    theme: {
        extend: {
            fontFamily: {
                'jeem': ['"Djeem"','"Symbio"', 'sans-serif'],
                'symbio': ['"Symbio"', 'sans-serif'],
            },
            backgroundImage: theme => ({
                'p1':  "url('../../imgs/pattern1.png')",
                'p2':  "url('../../imgs/pattern2.png')",
                'p3':  "url('../../imgs/pattern3.png')",
                'p4':  "url('../../imgs/pattern4.png')",
                'p5':  "url('../../imgs/pattern5.png')",
                'p6':  "url('../../imgs/pattern6.png')",
            }),
            colors: {

                'primary-one': '#bf0072',       //pink
                'primary-two': '#f16541',       //orange
                'primary-three': '#005888',     //blue
                'primary-four': '#392068',      //purple
                'primary-five': '#1b9a96',      //light-blue
                'primary-six': '#a72d6f',       //pink2


                'bg'        : '#E0DED1',
                'pink'      : '#bf0072',
                'orange'    : '#f16541',
                'blue'      : '#392068',
                'purple'    : '#392068',

            },
        },
    },
    plugins: [],
}
