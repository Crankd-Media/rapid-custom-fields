<li class="p-y-3 line-item flex items-center">

	{{-- Field Order --}}
	<div class="w-8">
		<button class="drag-icon rounded-md p-2.5 text-indigo-400 hover:bg-indigo-100"
			data-ol-has-click-handler="">
			{{-- DRAG view-grid V1 --}}
			<svg xmlns="http://www.w3.org/2000/svg"
				class="h-4 w-4"
				fill="none"
				viewBox="0 0 24 24"
				stroke="currentColor"
				stroke-width="2">
				<path stroke-linecap="round"
					stroke-linejoin="round"
					d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
			</svg>
		</button>
	</div>

	{{-- Field Type --}}
	<div class="w-[160px] flex-none pr-2">
		<div class="flex items-center">


			<select class="w-full rounded-lg border border-gray-200 p-2 text-sm"
				x-model="row.type">
				<template x-for="(fieldType, fieldTypeIndex) in fieldTypes"
					:key="$id('field-type')">
					<option :value="fieldType.type"
						x-text="fieldType.label"
						:selected="row.type == fieldType.type"></option>
				</template>
			</select>

		</div>
	</div>

	{{-- Field Title / Key --}}
	<div class="flex grow items-center gap-2">
		<!-- Title -->
		<div class="grow">
			<input type="text"
				class="w-full rounded-lg border border-gray-200 p-2 text-sm"
				x-model.debounce="row.title" />
		</div>
		<!-- Key -->
		<div class="flex grow items-center gap-1">
			{{-- Copy Key --}}
			<sl-tooltip content="Copied to clipboard"
				trigger="click">
				<button @click="$clipboard(row.key)"
					class="rounded-md p-2.5 text-indigo-700 hover:bg-indigo-100"
					data-ol-has-click-handler="">

					<svg xmlns="http://www.w3.org/2000/svg"
						class="h-4 w-4"
						fill="none"
						viewBox="0 0 24 24"
						stroke="currentColor"
						stroke-width="2">
						<path stroke-linecap="round"
							stroke-linejoin="round"
							d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
					</svg>

				</button>
			</sl-tooltip>

			<input type="text"
				class="w-full rounded-lg border border-gray-200 p-2 text-sm"
				x-model="row.key"
				x-rapid-slug="row.title" />
		</div>
	</div>

	{{-- Actions --}}
	<div class="flex w-[160px] items-center justify-end gap-0.5 rounded-md p-2">

		{{-- Edit --}}
		<button @click.prevent="$dispatch('edit-field-settings', row )"
			class="rounded-md p-2.5 text-indigo-700 hover:bg-indigo-100"
			data-ol-has-click-handler="">
			<svg class="h-4 w-4"
				viewBox="0 0 24 24"
				fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<path
					d="M15.2322 5.23223L18.7677 8.76777M16.7322 3.73223C17.7085 2.75592 19.2914 2.75592 20.2677 3.73223C21.244 4.70854 21.244 6.29146 20.2677 7.26777L6.5 21.0355H3V17.4644L16.7322 3.73223Z"
					stroke="currentColor"
					stroke-width="2"
					stroke-linecap="round"
					stroke-linejoin="round"></path>
			</svg>
		</button>

		{{-- Remove --}}
		<button @click="remove(index)"
			class="rounded-md p-2.5 text-red-700 hover:bg-red-100"
			data-ol-has-click-handler="">
			<svg class="h-4 w-4"
				viewBox="0 0 24 24"
				fill="none"
				xmlns="http://www.w3.org/2000/svg">
				<path d="M6 18L18 6M6 6L18 18"
					stroke="currentColor"
					stroke-width="2"
					stroke-linecap="round"
					stroke-linejoin="round"></path>
			</svg>
		</button>
	</div>

</li>
