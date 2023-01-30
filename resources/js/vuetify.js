
import '@mdi/font/css/materialdesignicons.css'
import 'vuetify/dist/vuetify.min.css'

import { createVuetify } from 'vuetify'

export default createVuetify(
    {
        icons: {
            iconfont: 'mdi', // default - only for display purposes
          },
    }
)