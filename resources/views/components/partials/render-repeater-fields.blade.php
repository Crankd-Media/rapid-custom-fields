<template x-for="field in field.fields" :key="$id()">

    <div class="py-6">
        <template x-if="field.type == 'text'">
            <x-rapid-custom-fields::field-input.text />
        </template>

        <template x-if="field.type == 'textarea'">
            <x-rapid-custom-fields::field-input.textarea />
        </template>

        <template x-if="field.type == 'link'">
            <x-rapid-custom-fields::field-input.link />
        </template>

        <template x-if="field.type == 'image'">
            <x-rapid-custom-fields::field-input.image />
        </template>

        <template x-if="field.type == 'repeater'">
            <x-rapid-custom-fields::field-input.repeater />
        </template>

        <template x-if="field.type == 'checkbox'">
            <x-rapid-custom-fields::field-input.checkbox />
        </template>
    </div>

</template>