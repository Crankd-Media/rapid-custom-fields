@php
	$fieldTypes = config('rapid-custom-fields.field_types');
	
@endphp

<div x-data="RenderCustomFields({{ json_encode($route) }}, {{ json_encode($fields) }}, {{ json_encode($fieldTypes) }})">

	{{-- Row Header --}}
	<x-rapid-custom-fields::partials.field-row-header />

	{{-- Rows --}}
	<ul class="flex flex-col"
		x-ref="sortableFields">
		<template x-if="fields.length">

			{{-- List Fields --}}
			<template x-for="(row, index) in fields"
				:key="$id('fields')">
				<x-rapid-custom-fields::partials.field-row />
			</template>
		</template>

	</ul>

	{{-- Add Field Button --}}
	<x-rapid-custom-fields::partials.add-field-button />

</div>


<x-rapid-custom-fields::edit-field-settings />
