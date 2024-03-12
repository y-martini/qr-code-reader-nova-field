import DetailField from './components/DetailField'
import FormField from './components/FormField'
import IndexField from './components/IndexField'

Nova.booting((app, store) => {
  app.component('detail-qr-code-reader-field', DetailField)
  app.component('form-qr-code-reader-field', FormField)
  app.component('index-qr-code-reader-field', IndexField)
})
