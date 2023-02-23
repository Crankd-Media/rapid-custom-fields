<div x-data="FieldInputRepeater(field)"
	@editRepeaterItem.window="setup($event.detail)">
	<p class="mb-4 font-medium"
		x-text="field.title">List items</p>

	<ul class="divide-y">
		<template x-for="(item, index) in repeater.values">
			<li class="flex items-center justify-between gap-2 py-3">

				{{-- Dispaly the item --}}
				<div class="flex flex-1 items-center gap-2">
					{{-- <template x-if="item.value.image.url">
						<div class="h-12 w-12 overflow-hidden rounded bg-gray-200">
							<img :src="item.value.image.url"
								alt=""
								class="aspect-[4/4] w-full object-cover">
						</div>
					</template> --}}
					<div>
						<p class="max-w-[230px] truncate text-sm font-medium"
							x-text="item.value.title"></p>
						<template x-if="item.value.link.url">
							<a :href="item.value.link.url"
								target="_blank"
								class="max-w-[230px] truncate text-xs text-gray-500"
								x-text="item.value.link.label">test</a>
						</template>
					</div>
				</div>

				{{-- Actions --}}
				<div class="flex items-center gap-2">


					<button @click="editItem(index)"
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

					{{-- Delete Repeater Item --}}
					<button @click="removeItem(index)"
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
		</template>

	</ul>

	<div class="pt-4 text-right">
		<button class="link inline-flex items-center gap-2 text-indigo-700 hover:text-indigo-900"
			@click="addItem()">Add list item +</button>
	</div>
</div>
