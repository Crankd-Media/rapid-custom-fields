<div x-data="RenderFieldValues({{ json_encode($values) }}, {{ json_encode($values) }})">
	<template x-for="field in fields"
		:key="$id()">

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


	{{-- Add Field --}}
	<div class="item-center my-2 flex justify-end">

		<div class="vflex items-center justify-between gap-1">

			<div class="flex items-center gap-3">

				<button class="rounded-lg bg-indigo-200 py-2 px-4 text-indigo-800 hover:bg-indigo-300"
					@click="discardChanges">
					<div class="flex items-center gap-2">
						Discard
					</div>
				</button>


				<button class="rounded-lg bg-indigo-700 py-2 px-4 text-white hover:bg-indigo-900"
					@click="save">
					<div class="flex items-center gap-2">
						<svg xmlns="http://www.w3.org/2000/svg"
							fill="none"
							viewBox="0 0 24 24"
							stroke-width="1.5"
							stroke="currentColor"
							class="h-4 w-4">
							<path stroke-linecap="round"
								stroke-linejoin="round"
								d="M12 4.5v15m7.5-7.5h-15" />
						</svg>
						<span>Save</span>
					</div>
				</button>
			</div>
		</div>


	</div>


</div>

<style>
	input[type=text],
	input[type=email],
	input[type=password],
	input[type=tel],
	input[type=url],
	textarea {
		display: block;
		width: 100%;
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		border-radius: 0.375rem !important;
		border-width: 1px !important;
		--tw-border-opacity: 1 !important;
		border-color: rgba(209, 213, 219, var(--tw-border-opacity)) !important;
		padding: 0.625rem 0.75rem !important;
		font-size: 16px !important;
		line-height: 16px !important;
	}
</style>
