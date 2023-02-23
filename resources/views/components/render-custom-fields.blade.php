@php
	$fieldTypes = config('rapid-custom-fields.field_types');
	$exclude = ['repeater'];
	$childFieldTypes = collect($fieldTypes)
	    ->filter(function ($fieldType) use ($exclude) {
	        return !in_array($fieldType['type'], $exclude);
	    })
	    ->toArray();
@endphp


<div x-data="RenderCustomFields({{ json_encode($route) }}, {{ json_encode($fields) }}, {{ json_encode($fieldTypes) }})">
	<x-rapid-custom-fields::partials.field-row-header />
	<ul class="flex flex-col"
		x-ref="sortableFields">
		{{-- List Fields --}}
		<template x-for="(row, index) in fields"
			:key="$id('fields')">
			<x-rapid-custom-fields::partials.field-row />
		</template>
	</ul>
	<x-rapid-custom-fields::partials.add-field-button />
</div>


<x-rapid-custom-fields::edit-field-settings :fieldTypes="$childFieldTypes" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
