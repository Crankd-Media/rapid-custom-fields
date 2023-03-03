@php
	$fieldTypes = config('rapid-custom-fields.field_types');
	$exclude = config('rapid-custom-fields.repeater_exclude_fields');
	
	$childFieldTypes = collect($fieldTypes)
	    ->filter(function ($fieldType) use ($exclude) {
	        return !in_array($fieldType['type'], $exclude);
	    })
	    ->toArray();
	
@endphp

<sl-drawer x-data="EditFieldSettings({{ json_encode($childFieldTypes) }})"
	@edit-field-settings.window="setup($event.detail)"
	:label="field.title"
	class="drawer-custom-size"
	style="--size: 50vw;"
	x-ref="drawer">

	<div class="flex h-full flex-col items-stretch">
		<template x-if="field.type === 'repeater'">
			<div>
				<x-rapid-custom-fields::partials.field-row-header />
				<ul class="flex flex-col"
					x-ref="sortableFields">
					{{-- List Fields --}}
					<template x-for="(row, index) in field.fields"
						:key="$id('fields_child')">

						<x-rapid-custom-fields::partials.field-row />

					</template>
				</ul>
				<x-rapid-custom-fields::partials.add-field-button />
			</div>
		</template>
	</div>

</sl-drawer>
