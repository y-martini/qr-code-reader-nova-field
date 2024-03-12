<template>
  <Modal
      :show="show"
      @close-via-escape="event => $emit('close', event)"
  >
    <QrcodeStream @detect="detected => $emit('detect', detected[0])" @error="setError"/>

    <p v-if="error" class="mt-2 text-center text-red-500">{{ error }}</p>

    <div class="text-center mt-2">
      <DefaultButton @click.prevent="$emit('close')">{{ __('Close') }}</DefaultButton>
    </div>
  </Modal>
</template>

<script setup>
import {QrcodeStream} from 'vue-qrcode-reader'
import {ref} from 'vue'

const props = defineProps({
  show: {type: Boolean, required: true},
})

const error = ref(null)

let setError = (e) => {
  error.value = e
}
</script>
