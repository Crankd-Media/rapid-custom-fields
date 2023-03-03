<sl-drawer x-data="EditRepeaterItem()"
	@open-edit-repeater-item.window="setup($event.detail)"
	:label="field.title"
	class="drawer-custom-size"
	style="--size: 50vw;"
	x-ref="drawer">


	{{-- Body --}}
	<div class="flex h-full flex-col items-stretch">
		<x-rapid-custom-fields::partials.render-repeater-fields />
	</div>

	{{-- Footer --}}
	<div slot="footer"
		class="flex items-center justify-end gap-3">
		<button class="rounded-lg bg-indigo-200 py-2 px-4 text-indigo-800 hover:bg-indigo-300"
			@click="$refs.drawer.hide()">
			<div class="flex items-center gap-2">
				Discard
			</div>
		</button>

		<button class="rounded-lg bg-indigo-700 py-2 px-4 text-white hover:bg-indigo-900"
			@click="updateRepeaterValue(); $refs.drawer.hide();">
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
				<span>Add Item</span>
			</div>
		</button>
	</div>

</sl-drawer>
