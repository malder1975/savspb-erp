<template>
    <label :class="classList">
        <input
                :id="id"
                :checked="isChecked"
                :disabled="disabled"
                :required="required"
                :name="name"
                :value="value"
                @change="handleChange"
                class="switch-input form-check-input"
                type="checkbox"
                true-value="value"
                false-value="uncheckedValue"
        >
        <template v-if="label">
            <span
                :data-checked="dataOn"
                :data-unchecked="dataOff"
                class="switch-slider">
            </span>
        </template>
        <template v-else>
            <span class="switch-slider"></span>
        </template>
    </label>
</template>

<script>
    export default {
        name: "Switch",
        model: {
            prop: 'modelChecked',
            event: 'change'
        },
        data() {
            return {
                checkedData: this.isChecked ? this.value : this.ucheckedValue
            }
        },
        props: {
            id: {
                type: String,
                default() {
                    return 'switch-id-' + this._uid
                },
            },
            color: {
                type: String,
                default: 'secondary'
            },
            label: {
                type: Boolean,
                default: false
            },
            outline: {
                type: [Boolean, String],
                default: null,
                validator: value => [false, true, '', 'alt'].indexOf(value) !== -1
            },
            size: {
                type: String,
                default: null,
                validator: value => ['', 'lg', 'sm'].indexOf(value) !== -1
            }
        }

    }
</script>

<style scoped>

</style>