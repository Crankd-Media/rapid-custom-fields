<div x-data="FieldInputImage(field)"
	class="py-8">

	<input type="hidden"
		x-model="image"
		x-modelable="field.value">

	<div class="mb-2 flex items-center justify-between gap-2">
		<p class="font-medium"
			x-text="field.title">Image</p>

	</div>

	<div x-show="!image.url"
		@click="uploadImage()"
		class="my-2 flex cursor-pointer flex-col items-center justify-center rounded-lg border-2 border-dashed border-gray-300 p-8 hover:border-gray-400 hover:bg-indigo-50">
		<span
			style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;">


			<svg xmlns="http://www.w3.org/2000/svg"
				fill="none"
				viewBox="0 0 24 24"
				stroke-width="1.5"
				stroke="currentColor"
				class="h-8 w-8 text-gray-600">
				<path stroke-linecap="round"
					stroke-linejoin="round"
					d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
			</svg>


		</span>
		<div class="mt-3 mb-1 flex cursor-pointer flex-col items-center justify-center">
			<label class="text-label mr-1 cursor-pointer text-indigo-600">Upload a file</label>
			<label class="text-label cursor-pointer text-gray-600">or select an existing one</label>
		</div>
		<p class="cursor-pointer text-sm text-gray-500">PNG or JPG up to 32MB</p>
	</div>

	<ul x-show="image.url"
		class="mt-2 mb-4 flex flex-wrap gap-4 divide-gray-200">
		<li class="max-w-50 min-w-50 group relative flex h-40 w-full !max-w-none overflow-hidden rounded-md border p-2">

			<span
				style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;">

				<img alt="selected picture"
					:src="image.url"
					decoding="async"
					data-nimg="fill"
					style="position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; display: block; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: cover;"><noscript></noscript>

			</span>

			{{-- Image Actions --}}
			<div
				class="backdrop-blur-xs absolute bottom-0 right-0 left-0 flex w-full justify-between gap-2 bg-white bg-opacity-90 p-2 opacity-0 transition-opacity group-hover:opacity-100">


				<button @click="removeImage()"
					class="attention sm w-full md:w-auto">

					<svg xmlns="http://www.w3.org/2000/svg"
						fill="none"
						viewBox="0 0 24 24"
						stroke-width="1.5"
						stroke="currentColor"
						class="h-4 w-4">
						<path stroke-linecap="round"
							stroke-linejoin="round"
							d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
					</svg>

				</button>
			</div>

		</li>
	</ul>


</div>
