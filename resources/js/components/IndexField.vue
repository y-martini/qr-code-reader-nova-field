<template>
  <component
      :is="`index-${field.field.component}`"
      :field="field.field"
  />
</template>

<script>
export default {
  props: ['field'],
}
</script>
