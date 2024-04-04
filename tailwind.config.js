
module.exports = {
  content: ["./**/*.{html,php,js}"],
 darkMode: 'class',
  theme: {
    extend: {
      
      fontFamily: {
        Inter: ['Inter'],
        Biz: ['BIZ UDGothic']
      },
      maxHeight: {
        '450': '450px',
      },
      colors: {
        grad_one: '#8347BB',
        grad_two: '#5A49DE',
        grad_one_rectangle: '#7A32D6',
        grad_two_rectangle: '#631FA7',
        btn_color: '#AA84D6',
        btn_hover: '#9C77C6',
        forms: '#925FCE',
        input_forms: '#D0ACFA',
        place_color: '#CECECE',
        p_color_forms: '#5B4475',
        h1_color: '#401B71',
        p_color: '#7D6A6A',
        colors_left: '#F2ECF8',
        F4F4FE: '#F4F4FE',
        EAE0F5: '#EAE0F5',
        D1408C: '#61408C',
        BEACD2: '#BEACD2',
        B9b8cab: '#9b8cab',
        p_cl: '#725697',
        text_color: '#765992',
        footer_color: '#362388',
        navbar: '#D9D3D3',
        active: "#745998",
        active_mes: "#DFD0F0",
        message: "#745998",
        error: "#C42D2D",
        focus: "#3B1564",
        modal: "#946CD0",
        modal_btn: "#AA84D6",
        btn_active: "#B280EC",
        m745998: "#745998"
      },
      fontSize: {
        '12px':'12px',
        '10px': '10px',
        '8px': '8px',
      },
      textDecorationThickness: {
        1.5: '1.3px'
      },
      borderRadius: {
        'border': '44px',
        'border_ret': '55px',
        'border_forms': '30px',
        'input_forms': '60px',
        'border_f' : '40px',
      },
      lineHeight: {
        'extra-loose': '56px',
      },
      container: {
        padding: '90px',
        
      },
      margin: {
        '40px': '40px',
        '5.5rem' : '5.5rem',
      },
      backgroundImage: {
        'hero-pattern': "url('./img/ret.svg')",
    },
    gridTemplateColumns: {
      'columns': '1f 3fr'
    },
    width: {
      '13rem': '13rem',
      '65px': '65px',
    },
    },
    variants: {},
    plugins: [
],
}
}


