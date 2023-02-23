<sl-drawer x-data="EditFieldSettings({{ json_encode($fieldTypes) }})"
	@edit-field-settings.window="setup($event.detail)"
	:label="field.title"
	class="drawer-custom-size"
	style="--size: 50vw;"
	x-ref="drawer">

	<div slot="header-actions"
		class="flex items-center">
		<sl-icon-button class="new-window"
			name="box-arrow-up-right"></sl-icon-button>
	</div>

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
