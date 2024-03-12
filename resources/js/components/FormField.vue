<template>
  <div class="flex">
    <component
        :is="`form-${field.field.component}`"
        ref="field"
        :resource-id="resourceId"
        :resource-name="resourceName"
        :via-resource="viaResource"
        :via-resource-id="viaResourceId"
        :via-relationship="viaRelationship"
        :field="field.field"
        :errors="errors"
        style="border-bottom: none"
        class="flex-grow"
    />

    <div class="px-6 flex items-center">
      <DefaultButton @click.prevent="showModal = true">
        <Icon type="qrcode"/>
      </DefaultButton>
    </div>
  </div>

  <StreamModal
      :show="showModal"
      @close="closeModal"
      @detect="onDetected"
  />
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova'
import StreamModal from './StreamModal.vue'

export default {
  components: {
    StreamModal,
  },

  data() {
    return {
      showModal: false,
    }
  },

  mixins: [FormField, HandlesValidationErrors],

  props: ['resourceName', 'resourceId', 'field'],

  methods: {
    setInitialValue() {
      this.$refs.field.setInitialValue()
    },

    fill(formData) {
      this.$refs.field.fill(formData)
    },

    closeModal() {
      this.showModal = false
    },

    onDetected(detected) {
      this.closeModal()
      Nova.$emit(this.field.field.attribute + '-value', detected.rawValue)
    },
  },
}
</script>
