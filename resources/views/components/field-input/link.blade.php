<div x-data="FieldInputLink(field)"
	class="py-6">
	<div class="flex items-center justify-between gap-8">
		<div>
			<p class="text-xl font-bold"
				x-text="field.title">Button</p>
		</div>
		<button @click="field.value.show = !field.value.show"
			x-bind:class="field.value.show ? 'bg-indigo-600' : 'bg-gray-200'"
			class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
			role="switch"
			type="button"
			tabindex="0"
			aria-checked="true"
			data-headlessui-state="checked">
			<span class="sr-only">Use setting</span>
			<span aria-hidden="true"
				x-bind:class="field.value.show ? 'translate-x-5' : 'translate-x-0'"
				class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
		</button>
	</div>

	<div x-show="field.value.show"
		class="mt-4">

		<div class="mb-4">
			<label for="name"
				class="mb-1">Label</label>
			<div class="relative flex rounded-md">
				<input maxlength="99999"
					min="0"
					max="9999"
					step="1"
					class=""
					type="text"
					autocomplete="off"
					x-model="field.value.label">
			</div>
		</div>

		<div class="mb-4">
			<label for="Link"
				class="mb-1">Url</label>
			<div class="relative flex rounded-md">
				<input maxlength="99999"
					min="0"
					max="9999"
					step="1"
					type="text"
					autocomplete="off"
					x-model="field.value.url">
			</div>
		</div>

		<div class="mt-4 flex items-center justify-between gap-8">
			<p class="text-sm text-gray-700">Open link in a new page</p>
			<button @click="field.value.new_tab = !field.value.new_tab"
				x-bind:class="field.value.new_tab ? 'bg-indigo-600' : 'bg-gray-200'"
				class="relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
				role="switch"
				type="button"
				tabindex="0"
				aria-checked="false"
				data-headlessui-state="">
				<span class="sr-only">Use setting</span>
				<span aria-hidden="true"
					x-bind:class="field.value.new_tab ? 'translate-x-5' : 'translate-x-0'"
					class="pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out"></span>
			</button>
		</div>


	</div>
</div>
